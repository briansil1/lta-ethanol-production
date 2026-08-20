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
            ['locale_id' => '2', 'country_id' => '59', 'key' => 'gasoline_demand', 'content' => 'In 2025, gasoline consumption in Japan was 43,581 million liters ( 11,513 million gallons) and growth rate was  -1.9%. Gasoline production and net imports were 42,543 and 877 million liters (11,107 and 231 million gallons) correspondingly. Japan complies with the JIS standards and offers two main grades: RON 89 and RON 96) with an average octane of 89.7 RON.'],
            ['locale_id' => '2', 'country_id' => '56', 'key' => 'gasoline_demand', 'content' => 'In 2025, gasoline consumption in Malaysia was 17,472 million liters (4,616 million gallons) and growth rate was  2.4%. Gasoline production and net imports were 6,864 and 10,608 million liters (1,814 and 2,803 million gallons) correspondingly. Malaysia offers two main grades: RON 95 and RON 97) with an average octane of 95.3 RON.	'],
            ['locale_id' => '2', 'country_id' => '61', 'key' => 'gasoline_demand', 'content' => 'In 2024, gasoline consumption in Nigeria was 21,894 million liters (5,784 million gallons) and growth rate was  2.3%. Gasoline production and net imports were 9,242 and 12,652 million liters (2,441 and 3,342 million gallons) correspondingly. Nigeria offers one main grade: RON 91. Production and supply of a 95 RON grade will be commercially available in the short term.'],
            ['locale_id' => '2', 'country_id' => '60', 'key' => 'gasoline_demand', 'content' => 'In 2025, gasoline consumption in South Korea was 15,425 million liters (4,071 million gallons) and growth rate was  2.3%. Gasoline production and net imports were 32,383 and -17,715 million liters (8,555 and -4,680 million gallons) correspondingly. South Korea offers two main grades: RON 91 and RON 94) with an average octane of 91.1 RON.'],
            ['locale_id' => '2', 'country_id' => '58', 'key' => 'gasoline_demand', 'content' => 'In 2025, gasoline consumption in Taiwan was 9,262 million liters (2,447 million gallons) and growth rate was -0.5%. Gasoline production and net imports were 13,152 and -4,064 million liters (3,475 and -1074 million gallons) correspondingly. Taiwan offers three main grades: RON 92, RON 95 and RON 98) with an average octane of 94.5 RON.'],
            ['locale_id' => '2', 'country_id' => '57', 'key' => 'gasoline_demand', 'content' => 'In 2025, gasoline consumption in Thailand was 11,576 million liters (3,448 million gallons) and growth rate was  3.0%. Gasoline production and net imports were 13,051 and -1,312 million liters (3,448 and -347 million gallons) correspondingly. Thailand offers two main grades: RON 91 (E10) and RON 95 (E10 and E20) with an average octane of 94.2 RON.'],
            ['locale_id' => '2', 'country_id' => '55', 'key' => 'gasoline_demand', 'content' => 'In 2025, gasoline consumption in Vietnam was 11,373 million liters (3,005 million gallons) and growth rate was  3.3%. Gasoline production and net imports were 7,949 and 3,423 million liters (2,100 and 904 million gallons) correspondingly. Vietnam complies offers three grades: RON 92 and RON 95  with an average octane of 94.7 RON.	'],
            ['locale_id' => '2', 'country_id' => '59', 'key' => 'ethanol_text', 'content' => 'Japan currently allows E3. Last year’s consumption was 745 million liters (197 million gallons) equivalent to 1.7%, primarily as the component ethyl tert-butyl ether (ETBE).  There is no local production. Ethanol is imported as a blendstock for ETBE production and as ETBE. The Ministry of Economy, Trade and Industry (METI) aiming for E10 (10% ethanol) by 2030 and E20 (20% ethanol) by 2040. This initiative requires infrastructure improvements, as most existing gas stations are only equipped for the E3 blend. '],
            ['locale_id' => '2', 'country_id' => '56', 'key' => 'ethanol_text', 'content' => 'Government support for biofuels has so far targeted biodiesel. The Biofuel Industry Act of 2007 excluded ethanol as the source of alternative fuels under the National Biofuels Policy of 2006. As there is no policy support for ethanol and there is no production of fuel ethanol and minimal consumption. In 2025, ethanol consumption in Malaysia was 16 million liters (4 million gallons) representing  0.1% of gasoline demand. '],
            ['locale_id' => '2', 'country_id' => '61', 'key' => 'ethanol_text', 'content' => 'Nigeria has a Biofuels Policy that aims for a 10% blend of bioethanol in gasoline, but this target has not been met. Nigeria produces bioethanol primarily from cassava and sugarcane, but the industry is small-scale and faces challenges, resulting in the country being a net importer of ethanol. Ethanol consumption in Nigeria was 379 million liters (100 million gallons) representing  1.7% of gasoline demand. '],
            ['locale_id' => '2', 'country_id' => '60', 'key' => 'ethanol_text', 'content' => 'South Korea has implemented requirements for renewable fuels that are currently met with biodiesel blending.  Altough, there is an oxygen requirement, ethanol is not currently blended in gasoline.  Efforts to implement pilot programs have been stalled because of a lack of consensus and reluctance of different actors in the petroleum industry.'],
            ['locale_id' => '2', 'country_id' => '58', 'key' => 'ethanol_text', 'content' => 'Taiwan has policies to promote biofuels in transportation to reduce imported fuel dependency and lower carbon emissions. While there was a limited trial of E3 gasohol in the mid-2000s, the lack of domestic production and insufficient incentives led to its discontinuation. Only a few gas stations offer it. Ethanol is supplied by imports and corresponds to an average content of less than 0.1%. CPC\'s 2026 budget indicates that the company plans to procure 96,000 liters of ethanol for E3 blends.Future bioethanol use depends on developing profitable cellulosic ethanol production from non-food waste like rice straw and food waste, rather than imported feedstocks. '],
            ['locale_id' => '2', 'country_id' => '57', 'key' => 'ethanol_text', 'content' => 'Thailand\'s bioethanol production primarily uses sugarcane and cassava as feedstocks, with approximately 30 facilities producing over 1 billion liters annually. The promotion of bio-based products like ethanol is part of Thailand\'s bioeconomy policy, supporting both the energy sector and domestic economic growth. In 2025, ethanol consumption supplied by local production in Thailand was 1,290 million liters (341 million gallons) representing  11.0% of gasoline demand. '],
            ['locale_id' => '2', 'country_id' => '55', 'key' => 'ethanol_text', 'content' => 'Vietnam\'s bioethanol demand is growing rapidly, driven by government policies like a planned nationwide E10 gasoline mandate set to begin in June 2026. Ethanol consumption in Vietnam was 369 million liters (97 million gallons) representing  3.2% of gasoline demand. Ethanol production and Net Imports were 250 and  119 million liters (66  and 31 million gallons) correspondingly. '],



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
