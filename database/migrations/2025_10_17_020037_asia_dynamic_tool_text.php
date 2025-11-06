<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AsiaDynamicToolText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('dynamic_tools_texts')->insert([
            ['locale_id' => '2', 'country_id' => '59', 'key' => 'gasoline_demand', 'content' => 'In 2024, gasoline consumption in Japan was 43,826 million liters (11,578 million gallons) and growth rate was  -2.5%. Gasoline production and net imports were 42,543 and 1,283 million liters (11,239 and 339 million gallons) correspondingly. Japan complies with the JIS standards and offers two main grades: RON 89 and RON 96) with an average octane of 89.7 RON.'],
            ['locale_id' => '2', 'country_id' => '56', 'key' => 'gasoline_demand', 'content' => 'In 2024, gasoline consumption in Malaysia was 16,784 million liters (4,434 million gallons) and growth rate was  -1.2%. Gasoline production and net imports were 5,436 and 11,348 million liters (1,436 and 2,998 million gallons) correspondingly. Malaysia offers two main grades: RON 95 and RON 97) with an average octane of 95.2 RON.	'],
            ['locale_id' => '2', 'country_id' => '60', 'key' => 'gasoline_demand', 'content' => 'In 2024, gasoline consumption in South Korea was 14,841 million liters (3,920 million gallons) and growth rate was  2.4%. Gasoline production and net imports were 30,840 and -16,000 million liters (8,147 and -4,227 million gallons) correspondingly. South Korea offers two main grades: RON 91 and RON 94) with an average octane of 91.1 RON.	'],
            ['locale_id' => '2', 'country_id' => '58', 'key' => 'gasoline_demand', 'content' => 'In 2024, gasoline consumption in Taiwan was 8,761 million liters (2,314 million gallons) and growth rate was -0.4%. Gasoline production and net imports were 12,450 and -3,689 million liters (3,289 and -975 million gallons) correspondingly. Taiwan offers three main grades: RON 92, RON 95 and RON 98) with an average octane of 94.5 RON.'],
            ['locale_id' => '2', 'country_id' => '57', 'key' => 'gasoline_demand', 'content' => 'In 2024, gasoline consumption in Thailand was 11,452 million liters (3,025 million gallons) and growth rate was  -0.5%. Gasoline production and net imports were 13,337 and -1,885 million liters (3,523 and -498 million gallons) correspondingly. Thailand offers two main grades: RON 91 (E10) and RON 95 (E10 and E20) with an average octane of 94.1 RON.'],
            ['locale_id' => '2', 'country_id' => '55', 'key' => 'gasoline_demand', 'content' => 'In 2024, gasoline consumption in Vietnam was 9,384 million liters (2,479 million gallons) and growth rate was  1.0%. Gasoline production and net imports were 7,870 and 1,514 million liters (2,079 and 400 million gallons) correspondingly. Vietnam complies offers three grades: RON 92, RON 95 and RON 98 with an average octane of 94.8 RON.	'],
            ['locale_id' => '2', 'country_id' => '59', 'key' => 'ethanol_text', 'content' => 'Japan currently allows E3. Last year’s consumption was 830 million liters (219 million gallons) equivalent to 1.9%, primarily as the component ethyl tert-butyl ether (ETBE).  There is no local production. Ethanol is imported as a blendstock for ETBE production and as ETBE. The Ministry of Economy, Trade and Industry (METI) aiming for E10 (10% ethanol) by 2030 and E20 (20% ethanol) by 2040. This initiative requires infrastructure improvements, as most existing gas stations are only equipped for the E3 blend. '],
            ['locale_id' => '2', 'country_id' => '56', 'key' => 'ethanol_text', 'content' => 'Government support for biofuels has so far targeted biodiesel. The Biofuel Industry Act of 2007 excluded ethanol as the source of alternative fuels under the National Biofuels Policy of 2006. As there is no policy support for ethanol, there is no production of fuel ethanol and minimal consumption. In 2024, ethanol consumption in Malaysia was 16 million liters (4 million gallons) representing  0.1% of gasoline demand. '],
            ['locale_id' => '2', 'country_id' => '60', 'key' => 'ethanol_text', 'content' => 'Ethanol is blended in South Korea to offer non mandated E3-E10 gasoline. Ethanol consumption in South Korea last year was 175 million liters (46 million gallons) representing  1.2% of gasoline demand. Due to a lack of domestic production, South Korea is dependent on imports for its bioethanol supply. The government plans to increase the blending ratio, aiming for a 4% bioethanol-gasoline blend by 2025 and 8% by 2030 under the Renewable Fuel Standard (RFS). '],
            ['locale_id' => '2', 'country_id' => '58', 'key' => 'ethanol_text', 'content' => 'Taiwan has policies to promote bioethanol in transportation to reduce imported fuel dependency and lower carbon emissions, using it as an oxygenate additive. While there was a limited trial of E3 gasohol in the mid-2000s, the lack of domestic production and insufficient incentives led to its discontinuation. Only a few gas stations offer it. Ethanol is supplied by imports and corresponds to an average content of 0.2%. Future bioethanol use depends on developing profitable cellulosic ethanol production from non-food waste like rice straw and food waste, rather than imported feedstocks. '],
            ['locale_id' => '2', 'country_id' => '57', 'key' => 'ethanol_text', 'content' => 'Thailand\'s bioethanol production primarily uses sugarcane and cassava as feedstocks, with approximately 30 facilities producing over 1 billion liters annually. The promotion of bio-based products like ethanol is part of Thailand\'s bioeconomy policy, supporting both the energy sector and domestic economic growth. In 2024, ethanol consumption supplied by local production in Thailand was 1,289 million liters (341 million gallons) representing  11.3% of gasoline demand. '],
            ['locale_id' => '2', 'country_id' => '55', 'key' => 'ethanol_text', 'content' => 'Vietnam\'s bioethanol demand is growing rapidly, driven by government policies like a planned nationwide E10 gasoline mandate set to begin in 2026. Ethanol consumption in Vietnam was 236 million liters (62 million gallons) representing  2.5% of gasoline demand. Ethanol production and Net Imports were 200 and  36 million liters (62  and 9 million gallons) correspondingly. '],


        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('dynamic_tools_texts')->where('country_id', '>', 54)->delete();
    }
}
