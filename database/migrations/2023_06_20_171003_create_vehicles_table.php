<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vehicles');

        Schema::create('vehicles', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->integer('country_id');
            $table->string('region', 150);
            $table->string('emission', 150);
            $table->float('e0', 8, 2)->nullable();
            $table->float('e10', 8, 2)->nullable();
            $table->float('e15', 8, 2)->nullable();
            $table->float('e20', 8, 2)->nullable();
            $table->float('e25', 8, 2)->nullable();
            $table->float('e30', 8, 2)->nullable();
            $table->timestamps();  
        });

        DB::table('vehicles')->insert([
            ['country_id' => '1', 'region' => 'south-america', 'emission' => 'co', 'e0' => '0', 'e10' => '5432', 'e15' => '7682', 'e20' => '9958', 'e25' => '11711', 'e30' => '13601'],
            ['country_id' => '1', 'region' => 'south-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '10111', 'e15' => '11467', 'e20' => '12733', 'e25' => '14128', 'e30' => '15604'],
            ['country_id' => '1', 'region' => 'south-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '3014', 'e15' => '3500', 'e20' => '3750', 'e25' => '5058', 'e30' => '5982'],
            ['country_id' => '1', 'region' => 'south-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '1685', 'e15' => '2329', 'e20' => '2647', 'e25' => '2961', 'e30' => '3528'],
            ['country_id' => '1', 'region' => 'south-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '7554', 'e15' => '10995', 'e20' => '14420', 'e25' => '18055', 'e30' => '21845'],
            ['country_id' => '1', 'region' => 'south-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '4670', 'e15' => '6534', 'e20' => '8387', 'e25' => '9804', 'e30' => '11721'],
            ['country_id' => '2', 'region' => 'south-america', 'emission' => 'co', 'e0' => '0', 'e10' => '171', 'e15' => '223', 'e20' => '267', 'e25' => '299', 'e30' => '345'],
            ['country_id' => '2', 'region' => 'south-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '688', 'e15' => '780', 'e20' => '866', 'e25' => '961', 'e30' => '1061'],
            ['country_id' => '2', 'region' => 'south-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '205', 'e15' => '238', 'e20' => '255', 'e25' => '344', 'e30' => '407'],
            ['country_id' => '2', 'region' => 'south-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '115', 'e15' => '158', 'e20' => '180', 'e25' => '200', 'e30' => '239'],
            ['country_id' => '2', 'region' => 'south-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '514', 'e15' => '748', 'e20' => '981', 'e25' => '1228', 'e30' => '1486'],
            ['country_id' => '2', 'region' => 'south-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '140', 'e15' => '176', 'e20' => '203', 'e25' => '221', 'e30' => '255'],
            ['country_id' => '3', 'region' => 'south-america', 'emission' => 'co', 'e0' => '0', 'e10' => '174', 'e15' => '299', 'e20' => '413', 'e25' => '436', 'e30' => '558'],
            ['country_id' => '3', 'region' => 'south-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '386', 'e15' => '330', 'e20' => '360', 'e25' => '397', 'e30' => '409'],
            ['country_id' => '3', 'region' => 'south-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '69', 'e15' => '83', 'e20' => '77', 'e25' => '63', 'e30' => '69'],
            ['country_id' => '3', 'region' => 'south-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '246', 'e15' => '454', 'e20' => '648', 'e25' => '1140', 'e30' => '1343'],
            ['country_id' => '3', 'region' => 'south-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '-4', 'e15' => '-271', 'e20' => '-23', 'e25' => '580', 'e30' => '771'],
            ['country_id' => '3', 'region' => 'south-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '37', 'e15' => '19', 'e20' => '-25', 'e25' => '-53', 'e30' => '-80'],
            ['country_id' => '4', 'region' => 'south-america', 'emission' => 'co', 'e0' => '0', 'e10' => '119', 'e15' => '158', 'e20' => '192', 'e25' => '217', 'e30' => '251'],
            ['country_id' => '4', 'region' => 'south-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '432', 'e15' => '490', 'e20' => '544', 'e25' => '603', 'e30' => '666'],
            ['country_id' => '4', 'region' => 'south-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '129', 'e15' => '149', 'e20' => '160', 'e25' => '216', 'e30' => '255'],
            ['country_id' => '4', 'region' => 'south-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '72', 'e15' => '99', 'e20' => '113', 'e25' => '126', 'e30' => '150'],
            ['country_id' => '4', 'region' => 'south-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '322', 'e15' => '469', 'e20' => '616', 'e25' => '771', 'e30' => '933'],
            ['country_id' => '4', 'region' => 'south-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '104', 'e15' => '135', 'e20' => '161', 'e25' => '180', 'e30' => '210'],
            ['country_id' => '5', 'region' => 'central-america', 'emission' => 'co', 'e0' => '0', 'e10' => '133', 'e15' => '177', 'e20' => '216', 'e25' => '245', 'e30' => '284'],
            ['country_id' => '5', 'region' => 'central-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '473', 'e15' => '536', 'e20' => '595', 'e25' => '660', 'e30' => '729'],
            ['country_id' => '5', 'region' => 'central-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '141', 'e15' => '164', 'e20' => '175', 'e25' => '236', 'e30' => '280'],
            ['country_id' => '5', 'region' => 'central-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '79', 'e15' => '109', 'e20' => '124', 'e25' => '138', 'e30' => '165'],
            ['country_id' => '5', 'region' => 'central-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '353', 'e15' => '514', 'e20' => '674', 'e25' => '844', 'e30' => '1021'],
            ['country_id' => '5', 'region' => 'central-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '113', 'e15' => '147', 'e20' => '176', 'e25' => '196', 'e30' => '229'],
            ['country_id' => '15', 'region' => 'caribbean', 'emission' => 'co', 'e0' => '0', 'e10' => '991', 'e15' => '1419', 'e20' => '1859', 'e25' => '2200', 'e30' => '2555'],
            ['country_id' => '15', 'region' => 'caribbean', 'emission' => 'nox', 'e0' => '0', 'e10' => '1511', 'e15' => '1714', 'e20' => '1903', 'e25' => '2112', 'e30' => '2332'],
            ['country_id' => '15', 'region' => 'caribbean', 'emission' => 'btx', 'e0' => '0', 'e10' => '450', 'e15' => '523', 'e20' => '561', 'e25' => '756', 'e30' => '894'],
            ['country_id' => '15', 'region' => 'caribbean', 'emission' => 'co2', 'e0' => '0', 'e10' => '252', 'e15' => '348', 'e20' => '396', 'e25' => '439', 'e30' => '524'],
            ['country_id' => '15', 'region' => 'caribbean', 'emission' => 'pm', 'e0' => '0', 'e10' => '1129', 'e15' => '1643', 'e20' => '2155', 'e25' => '2699', 'e30' => '3265'],
            ['country_id' => '15', 'region' => 'caribbean', 'emission' => 'thc', 'e0' => '0', 'e10' => '824', 'e15' => '1167', 'e20' => '1514', 'e25' => '1782', 'e30' => '2136'],
            ['country_id' => '6', 'region' => 'south-america', 'emission' => 'co', 'e0' => '0', 'e10' => '314', 'e15' => '430', 'e20' => '540', 'e25' => '624', 'e30' => '724'],
            ['country_id' => '6', 'region' => 'south-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '867', 'e15' => '984', 'e20' => '1092', 'e25' => '1212', 'e30' => '1338'],
            ['country_id' => '6', 'region' => 'south-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '259', 'e15' => '300', 'e20' => '322', 'e25' => '434', 'e30' => '513'],
            ['country_id' => '6', 'region' => 'south-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '145', 'e15' => '200', 'e20' => '227', 'e25' => '253', 'e30' => '302'],
            ['country_id' => '6', 'region' => 'south-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '648', 'e15' => '943', 'e20' => '1237', 'e25' => '1549', 'e30' => '1874'],
            ['country_id' => '6', 'region' => 'south-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '282', 'e15' => '382', 'e20' => '475', 'e25' => '544', 'e30' => '645'],
            ['country_id' => '7', 'region' => 'central-america', 'emission' => 'co', 'e0' => '0', 'e10' => '183', 'e15' => '255', 'e20' => '326', 'e25' => '381', 'e30' => '442'],
            ['country_id' => '7', 'region' => 'central-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '412', 'e15' => '467', 'e20' => '519', 'e25' => '575', 'e30' => '636'],
            ['country_id' => '7', 'region' => 'central-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '123', 'e15' => '143', 'e20' => '153', 'e25' => '206', 'e30' => '244'],
            ['country_id' => '7', 'region' => 'central-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '69', 'e15' => '95', 'e20' => '108', 'e25' => '120', 'e30' => '143'],
            ['country_id' => '7', 'region' => 'central-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '308', 'e15' => '448', 'e20' => '587', 'e25' => '735', 'e30' => '890'],
            ['country_id' => '7', 'region' => 'central-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '168', 'e15' => '232', 'e20' => '295', 'e25' => '343', 'e30' => '409'],
            ['country_id' => '8', 'region' => 'central-america', 'emission' => 'co', 'e0' => '0', 'e10' => '594', 'e15' => '820', 'e20' => '1040', 'e25' => '1207', 'e30' => '1426'],
            ['country_id' => '8', 'region' => 'central-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '1498', 'e15' => '1699', 'e20' => '1887', 'e25' => '2094', 'e30' => '2312'],
            ['country_id' => '8', 'region' => 'central-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '447', 'e15' => '519', 'e20' => '556', 'e25' => '749', 'e30' => '886'],
            ['country_id' => '8', 'region' => 'central-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '250', 'e15' => '345', 'e20' => '392', 'e25' => '437', 'e30' => '521'],
            ['country_id' => '8', 'region' => 'central-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '1119', 'e15' => '1629', 'e20' => '2137', 'e25' => '2675', 'e30' => '3237'],
            ['country_id' => '8', 'region' => 'central-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '361', 'e15' => '470', 'e20' => '560', 'e25' => '625', 'e30' => '730'],
            ['country_id' => '9', 'region' => 'central-america', 'emission' => 'co', 'e0' => '0', 'e10' => '220', 'e15' => '299', 'e20' => '373', 'e25' => '429', 'e30' => '496'],
            ['country_id' => '9', 'region' => 'central-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '653', 'e15' => '741', 'e20' => '822', 'e25' => '912', 'e30' => '1008'],
            ['country_id' => '9', 'region' => 'central-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '195', 'e15' => '226', 'e20' => '242', 'e25' => '327', 'e30' => '386'],
            ['country_id' => '9', 'region' => 'central-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '109', 'e15' => '150', 'e20' => '171', 'e25' => '190', 'e30' => '226'],
            ['country_id' => '9', 'region' => 'central-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '488', 'e15' => '710', 'e20' => '931', 'e25' => '1166', 'e30' => '1411'],
            ['country_id' => '9', 'region' => 'central-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '207', 'e15' => '279', 'e20' => '346', 'e25' => '396', 'e30' => '469'],
            ['country_id' => '10', 'region' => 'caribbean', 'emission' => 'co', 'e0' => '0', 'e10' => '34', 'e15' => '43', 'e20' => '51', 'e25' => '55', 'e30' => '64'],
            ['country_id' => '10', 'region' => 'caribbean', 'emission' => 'nox', 'e0' => '0', 'e10' => '162', 'e15' => '184', 'e20' => '205', 'e25' => '227', 'e30' => '251'],
            ['country_id' => '10', 'region' => 'caribbean', 'emission' => 'btx', 'e0' => '0', 'e10' => '48', 'e15' => '56', 'e20' => '60', 'e25' => '81', 'e30' => '96'],
            ['country_id' => '10', 'region' => 'caribbean', 'emission' => 'co2', 'e0' => '0', 'e10' => '27', 'e15' => '37', 'e20' => '43', 'e25' => '47', 'e30' => '56'],
            ['country_id' => '10', 'region' => 'caribbean', 'emission' => 'pm', 'e0' => '0', 'e10' => '121', 'e15' => '177', 'e20' => '232', 'e25' => '290', 'e30' => '351'],
            ['country_id' => '10', 'region' => 'caribbean', 'emission' => 'thc', 'e0' => '0', 'e10' => '22', 'e15' => '25', 'e20' => '25', 'e25' => '24', 'e30' => '26'],
            ['country_id' => '11', 'region' => 'north-america', 'emission' => 'co', 'e0' => '0', 'e10' => '3322', 'e15' => '4412', 'e20' => '5384', 'e25' => '6094', 'e30' => '7170'],
            ['country_id' => '11', 'region' => 'north-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '11913', 'e15' => '13511', 'e20' => '15002', 'e25' => '16646', 'e30' => '18385'],
            ['country_id' => '11', 'region' => 'north-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '3551', 'e15' => '4123', 'e20' => '4419', 'e25' => '5959', 'e30' => '7048'],
            ['country_id' => '11', 'region' => 'north-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '1985', 'e15' => '2744', 'e20' => '3119', 'e25' => '3483', 'e30' => '4151'],
            ['country_id' => '11', 'region' => 'north-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '8900', 'e15' => '12955', 'e20' => '16990', 'e25' => '21273', 'e30' => '25739'],
            ['country_id' => '11', 'region' => 'north-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '1961', 'e15' => '2361', 'e20' => '2577', 'e25' => '2686', 'e30' => '3031'],
            ['country_id' => '12', 'region' => 'central-america', 'emission' => 'co', 'e0' => '0', 'e10' => '79', 'e15' => '102', 'e20' => '120', 'e25' => '133', 'e30' => '153'],
            ['country_id' => '12', 'region' => 'central-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '345', 'e15' => '391', 'e20' => '434', 'e25' => '482', 'e30' => '532'],
            ['country_id' => '12', 'region' => 'central-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '103', 'e15' => '119', 'e20' => '128', 'e25' => '173', 'e30' => '204'],
            ['country_id' => '12', 'region' => 'central-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '57', 'e15' => '79', 'e20' => '90', 'e25' => '100', 'e30' => '120'],
            ['country_id' => '12', 'region' => 'central-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '258', 'e15' => '375', 'e20' => '492', 'e25' => '616', 'e30' => '745'],
            ['country_id' => '12', 'region' => 'central-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '60', 'e15' => '73', 'e20' => '80', 'e25' => '85', 'e30' => '96'],
            ['country_id' => '13', 'region' => 'central-america', 'emission' => 'co', 'e0' => '0', 'e10' => '73', 'e15' => '93', 'e20' => '109', 'e25' => '120', 'e30' => '139'],
            ['country_id' => '13', 'region' => 'central-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '328', 'e15' => '372', 'e20' => '413', 'e25' => '459', 'e30' => '507'],
            ['country_id' => '13', 'region' => 'central-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '98', 'e15' => '114', 'e20' => '122', 'e25' => '164', 'e30' => '194'],
            ['country_id' => '13', 'region' => 'central-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '55', 'e15' => '76', 'e20' => '86', 'e25' => '96', 'e30' => '115'],
            ['country_id' => '13', 'region' => 'central-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '245', 'e15' => '357', 'e20' => '468', 'e25' => '586', 'e30' => '709'],
            ['country_id' => '13', 'region' => 'central-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '43', 'e15' => '49', 'e20' => '48', 'e25' => '47', 'e30' => '50'],
            ['country_id' => '14', 'region' => 'south-america', 'emission' => 'co', 'e0' => '0', 'e10' => '721', 'e15' => '1030', 'e20' => '1347', 'e25' => '1593', 'e30' => '1884'],
            ['country_id' => '14', 'region' => 'south-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '1139', 'e15' => '1292', 'e20' => '1435', 'e25' => '1592', 'e30' => '1758'],
            ['country_id' => '14', 'region' => 'south-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '340', 'e15' => '394', 'e20' => '423', 'e25' => '570', 'e30' => '674'],
            ['country_id' => '14', 'region' => 'south-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '190', 'e15' => '262', 'e20' => '298', 'e25' => '332', 'e30' => '396'],
            ['country_id' => '14', 'region' => 'south-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '851', 'e15' => '1239', 'e20' => '1625', 'e25' => '2035', 'e30' => '2462'],
            ['country_id' => '14', 'region' => 'south-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '451', 'e15' => '623', 'e20' => '790', 'e25' => '917', 'e30' => '1092'],
            ['country_id' => '16', 'region' => 'south-america', 'emission' => 'co', 'e0' => '0', 'e10' => '119', 'e15' => '158', 'e20' => '192', 'e25' => '217', 'e30' => '251'],
            ['country_id' => '16', 'region' => 'south-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '432', 'e15' => '490', 'e20' => '544', 'e25' => '603', 'e30' => '666'],
            ['country_id' => '16', 'region' => 'south-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '129', 'e15' => '149', 'e20' => '160', 'e25' => '216', 'e30' => '255'],
            ['country_id' => '16', 'region' => 'south-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '72', 'e15' => '99', 'e20' => '113', 'e25' => '126', 'e30' => '150'],
            ['country_id' => '16', 'region' => 'south-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '322', 'e15' => '469', 'e20' => '616', 'e25' => '771', 'e30' => '933'],
            ['country_id' => '16', 'region' => 'south-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '104', 'e15' => '135', 'e20' => '161', 'e25' => '180', 'e30' => '210'],
            ['country_id' => '19', 'region' => 'south-america', 'emission' => 'co', 'e0' => '0', 'e10' => '7050', 'e15' => '9980', 'e20' => '12910', 'e25' => '15097', 'e30' => '17615'],
            ['country_id' => '19', 'region' => 'south-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '14054', 'e15' => '15832', 'e20' => '17573', 'e25' => '19496', 'e30' => '21504'],
            ['country_id' => '19', 'region' => 'south-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '4143', 'e15' => '4814', 'e20' => '5147', 'e25' => '6901', 'e30' => '8156'],
            ['country_id' => '19', 'region' => 'south-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '2524', 'e15' => '3602', 'e20' => '4227', 'e25' => '5137', 'e30' => '6107'],
            ['country_id' => '19', 'region' => 'south-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '10208', 'e15' => '14593', 'e20' => '19471', 'e25' => '24988', 'e30' => '30302'],
            ['country_id' => '19', 'region' => 'south-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '5788', 'e15' => '8004', 'e20' => '10153', 'e25' => '11793', 'e30' => '14053'],
            ['country_id' => '18', 'region' => 'central-america', 'emission' => 'co', 'e0' => '0', 'e10' => '1281', 'e15' => '1746', 'e20' => '2185', 'e25' => '2515', 'e30' => '2940'],
            ['country_id' => '18', 'region' => 'central-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '3709', 'e15' => '4207', 'e20' => '4671', 'e25' => '5183', 'e30' => '5724'],
            ['country_id' => '18', 'region' => 'central-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '1106', 'e15' => '1284', 'e20' => '1376', 'e25' => '1855', 'e30' => '2194'],
            ['country_id' => '18', 'region' => 'central-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '618', 'e15' => '854', 'e20' => '971', 'e25' => '1082', 'e30' => '1290'],
            ['country_id' => '18', 'region' => 'central-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '2771', 'e15' => '4033', 'e20' => '5290', 'e25' => '6623', 'e30' => '8013'],
            ['country_id' => '18', 'region' => 'central-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '952', 'e15' => '1249', 'e20' => '1506', 'e25' => '1691', 'e30' => '1982'],
            ['country_id' => '17', 'region' => 'caribbean', 'emission' => 'co', 'e0' => '0', 'e10' => '1026', 'e15' => '1462', 'e20' => '1909', 'e25' => '2255', 'e30' => '2619'],
            ['country_id' => '17', 'region' => 'caribbean', 'emission' => 'nox', 'e0' => '0', 'e10' => '1674', 'e15' => '1898', 'e20' => '2108', 'e25' => '2339', 'e30' => '2583'],
            ['country_id' => '17', 'region' => 'caribbean', 'emission' => 'btx', 'e0' => '0', 'e10' => '499', 'e15' => '579', 'e20' => '621', 'e25' => '837', 'e30' => '990'],
            ['country_id' => '17', 'region' => 'caribbean', 'emission' => 'co2', 'e0' => '0', 'e10' => '279', 'e15' => '385', 'e20' => '438', 'e25' => '487', 'e30' => '580'],
            ['country_id' => '17', 'region' => 'caribbean', 'emission' => 'pm', 'e0' => '0', 'e10' => '1250', 'e15' => '1820', 'e20' => '2387', 'e25' => '2989', 'e30' => '3616'],
            ['country_id' => '17', 'region' => 'caribbean', 'emission' => 'thc', 'e0' => '0', 'e10' => '846', 'e15' => '1192', 'e20' => '1539', 'e25' => '1806', 'e30' => '2163'],
            ['country_id' => '25', 'region' => 'latin-america', 'emission' => 'co', 'e0' => '0', 'e10' => '12680', 'e15' => '17600', 'e20' => '22389', 'e25' => '25961', 'e30' => '30343'],
            ['country_id' => '25', 'region' => 'latin-america', 'emission' => 'nox', 'e0' => '0', 'e10' => '31349', 'e15' => '35447', 'e20' => '39354', 'e25' => '43664', 'e30' => '48196'],
            ['country_id' => '25', 'region' => 'latin-america', 'emission' => 'btx', 'e0' => '0', 'e10' => '9299', 'e15' => '10801', 'e20' => '11562', 'e25' => '15552', 'e30' => '18389'],
            ['country_id' => '25', 'region' => 'latin-america', 'emission' => 'co2', 'e0' => '0', 'e10' => '5407', 'e15' => '7586', 'e20' => '8755', 'e25' => '10189', 'e30' => '12128'],
            ['country_id' => '25', 'region' => 'latin-america', 'emission' => 'pm', 'e0' => '0', 'e10' => '23130', 'e15' => '33402', 'e20' => '44137', 'e25' => '55873', 'e30' => '67670'],
            ['country_id' => '25', 'region' => 'latin-america', 'emission' => 'thc', 'e0' => '0', 'e10' => '9548', 'e15' => '12806', 'e20' => '15775', 'e25' => '17976', 'e30' => '21229'],            
        ]);
    }
}
