<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Reaplica la carga de datos de agosto 2026 (commit 0db44b7).
 *
 * Contexto: el commit 0db44b7 reescribio 14 migraciones ya existentes en lugar
 * de crear archivos nuevos. Como sus nombres seguian registrados en la tabla
 * `migrations`, `php artisan migrate` reporto "Nothing to migrate." y los datos
 * nunca llegaron a produccion.
 *
 * Esta migracion vuelve a ejecutar el up() de esas 14 migraciones respetando su
 * orden cronologico original, limpiando antes los rangos que se insertan sin
 * guarda de idempotencia (Europa 27..54 y Asia 55+).
 */
class ReapplyAugust2026DataLoad extends Migration
{
    /** Migraciones a reaplicar, en orden cronologico original. */
    private const SOURCE_MIGRATIONS = [
        '2025_09_30_164702_latam_dynamic_tool_text',
        '2025_09_30_173102_latam_gasoline_components',
        '2025_09_30_181844_latam_emissions',
        '2025_09_30_181915_latam_ghg',
        '2025_10_02_011832_latam_vehicles',
        '2025_10_09_021550_europe_emissions',
        '2025_10_09_021616_europe_vehicles',
        '2025_10_09_022855_europe_gasoline_components',
        '2025_10_09_023440_europe_ghg',
        '2025_10_17_020037_asia_dynamic_tool_text',
        '2025_10_17_021235_asia_gasoline_components',
        '2025_10_17_021733_asia_emissions',
        '2025_10_17_022135_asia_ghg',
        '2025_10_17_115555_asia_vehicles',
    ];

    /**
     * Tablas donde Europa y Asia se insertan sin guarda de idempotencia.
     * Las migraciones base de 2023 solo llegan hasta country_id 25, asi que
     * borrar por encima de 26 no elimina datos que nadie vuelva a insertar.
     */
    private const REINSERTED_TABLES = [
        'dynamic_tools_texts',
        'emissions',
        'vehicles',
        'gasoline_components',
    ];

    /**
     * Nigeria (country_id 61) se conserva en `emissions` y `vehicles`.
     *
     * El commit 0db44b7 dejo de insertarla en esas dos tablas, pero la mantuvo
     * en `dynamic_tools_texts` y `gasoline_components`, y su pagina sigue
     * publicada. Borrarla sin reinsertarla la dejaria sin datos de emisiones,
     * asi que se excluye del limpiado para no introducir una regresion.
     */
    private const PRESERVED_COUNTRY_ID = '61';

    private const PRESERVE_IN_TABLES = [
        'emissions',
        'vehicles',
    ];

    public function up()
    {
        $this->loadSourceMigrations();

        // life_cycle_ghgs se recrea con DROP + CREATE. En MySQL el DDL provoca
        // commit implicito, asi que va fuera de la transaccion. LatamGhg deja la
        // tabla limpia con solo datos LATAM; Europa y Asia se agregan despues.
        (new LatamGhg())->up();

        DB::transaction(function () {
            foreach (self::REINSERTED_TABLES as $table) {
                $stale = DB::table($table)->where('country_id', '>', 26);

                if (in_array($table, self::PRESERVE_IN_TABLES, true)) {
                    $stale->where('country_id', '<>', self::PRESERVED_COUNTRY_ID);
                }

                $stale->delete();
            }

            // LATAM: UPDATE fila por fila, idempotentes. LatamDynamicToolText
            // ademas reinserta los textos de Europa (country_id 27..54).
            (new LatamDynamicToolText())->up();
            (new LatamGasolineComponents())->up();
            (new LatamEmissions())->up();
            (new LatamVehicles())->up();

            // Europa (country_id 27..54)
            (new EuropeEmissions())->up();
            (new EuropeVehicles())->up();
            (new EuropeGasolineComponents())->up();
            (new EuropeGhg())->up();

            // Asia (country_id 55+)
            (new AsiaDynamicToolText())->up();
            (new AsiaGasolineComponents())->up();
            (new AsiaEmissions())->up();
            (new AsiaGhg())->up();
            (new AsiaVehicles())->up();
        });
    }

    /**
     * Las migraciones ya corrieron, asi que el Migrator no vuelve a incluir sus
     * archivos. Se cargan a mano para poder instanciar sus clases.
     */
    private function loadSourceMigrations()
    {
        foreach (self::SOURCE_MIGRATIONS as $migration) {
            require_once database_path('migrations/' . $migration . '.php');
        }
    }

    /**
     * Sin reversa: revertir significaria restaurar la carga de datos anterior,
     * que ya no existe en el repositorio. Para volver atras, restaurar backup.
     */
    public function down()
    {
        //
    }
}
