<?php

namespace Database\Seeders;

namespace Database\Seeders;

use App\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //North Africa
            DB::table('countries')->insert([
                'name' => __('Algeria'),
                'region' => 'North Africa',
                'indicatif' => '+213'
            ]);
            DB::table('countries')->insert([
                'name' => __('Egypt'),
                'region' => 'North Africa',
                'indicatif' => '+20'
            ]);
            DB::table('countries')->insert([
                'name' => __('Lybia'),
                'region' => 'North Africa',
                'indicatif' => '+218'
            ]);
            DB::table('countries')->insert([
                'name' => __('Morocco'),
                'region' => 'North Africa',
                'indicatif' => '+212'
            ]);
            DB::table('countries')->insert([
                'name' => __('South Soudan'),
                'region' => 'North Africa',
                'indicatif' => '+211'
            ]);
            DB::table('countries')->insert([
                'name' => __('Soudan'),
                'region' => 'North Africa',
                'indicatif' => '+249'
            ]);
            DB::table('countries')->insert([
                'name' => __('Tunisia'),
                'region' => 'North Africa',
                'indicatif' => '+216'
            ]);
        //West Africa
            DB::table('countries')->insert([
                'name' => 'Togo',
                'region' => 'West Africa',
                'indicatif' => '+228'
            ]);
            DB::table('countries')->insert([
                'name' => 'Benin',
                'region' => 'West Africa',
                'indicatif' => '+229'
            ]);
            DB::table('countries')->insert([
                'name' => 'Ghana',
                'region' => 'West Africa',
                'indicatif' => '+233'
            ]);
            DB::table('countries')->insert([
                'name' => __('Burkina Faso'),
                'region' => 'West Africa',
                'indicatif' => '+226'
            ]);
            DB::table('countries')->insert([
                'name' => __('Mali'),
                'region' => 'West Africa',
                'indicatif' => '+223'
            ]);
            DB::table('countries')->insert([
                'name' => __('Gambia'),
                'region' => 'West Africa',
                'indicatif' => '+220'
            ]);
            DB::table('countries')->insert([
                'name' => __('Guinea'),
                'region' => 'West Africa',
                'indicatif' => '+224'
            ]);
            DB::table('countries')->insert([
                'name' => __('Guinea-Bissau'),
                'region' => 'West Africa',
                'indicatif' => '+245'
            ]);
            DB::table('countries')->insert([
                'name' => __('Mauritania'),
                'region' => 'West Africa',
                'indicatif' => '+222'
            ]);
            DB::table('countries')->insert([
                'name' => __('Niger'),
                'region' => 'West Africa',
                'indicatif' => '+227'
            ]);
            DB::table('countries')->insert([
                'name' => __('Liberia'),
                'region' => 'West Africa',
                'indicatif' => '+231'
            ]);
            DB::table('countries')->insert([
                'name' => __('Sierra Leonne'),
                'region' => 'West Africa',
                'indicatif' => '+232'
            ]);
            DB::table('countries')->insert([
                'name' => __('Ivory Coast'),
                'region' => 'West Africa',
                'indicatif' => '+225'
            ]);
            DB::table('countries')->insert([
                'name' => 'Senegal',
                'region' => 'West Africa',
                'indicatif' => '+221'
            ]);
            DB::table('countries')->insert([
                'name' => 'Nigeria',
                'region' => 'West Africa',
                'indicatif' => '+234'
            ]);
            DB::table('countries')->insert([
                'name' => __('Cape Verde'),
                'region' => 'West Africa',
                'indicatif' => '+238'
            ]);
            DB::table('countries')->insert([
                'name' => __('Ascension Island'),
                'region' => 'West Africa',
                'indicatif' => '+247'
            ]);
            DB::table('countries')->insert([
                'name' => __('Saint Helena'),
                'region' => 'West Africa',
                'indicatif' => '+290'
            ]);
        //Central Africa
            DB::table('countries')->insert([
                'name' => __('Angola'),
                'region' => 'Central Africa',
                'indicatif' => '+244'
            ]);
            DB::table('countries')->insert([
                'name' => __('Cameroon'),
                'region' => 'Central Africa',
                'indicatif' => '+237'
            ]);
            DB::table('countries')->insert([
                'name' => __('Central African Republic'),
                'region' => 'Central Africa',
                'indicatif' => '+236'
            ]);
            DB::table('countries')->insert([
                'name' => __('Republic of Congo'),
                'region' => 'Central Africa',
                'indicatif' => '+242'
            ]);
            DB::table('countries')->insert([
                'name' => __('Democratic Republic of Cong'),
                'region' => 'Central Africa',
                'indicatif' => '+243'
            ]);
            DB::table('countries')->insert([
                'name' => __('Gabon'),
                'region' => 'Central Africa',
                'indicatif' => '+241'
            ]);
            DB::table('countries')->insert([
                'name' => __('Equatorial Guinea'),
                'region' => 'Central Africa',
                'indicatif' => '+240'
            ]);
            DB::table('countries')->insert([
                'name' => __('Sao Tome and Principe'),
                'region' => 'Central Africa',
                'indicatif' => '+239'
            ]);
            DB::table('countries')->insert([
                'name' => __('Chad'),
                'region' => 'Central Africa',
                'indicatif' => '+235'
            ]);
        //East Africa
            DB::table('countries')->insert([
                'name' => __('Burundi'),
                'region' => 'East Africa',
                'indicatif' => '+257'
            ]);
            DB::table('countries')->insert([
                'name' => __('Comoros'),
                'region' => 'East Africa',
                'indicatif' => '+269'
            ]);
            DB::table('countries')->insert([
                'name' => __('Kenya'),
                'region' => 'East Africa',
                'indicatif' => '+254'
            ]);
            DB::table('countries')->insert([
                'name' => __('Madagascar'),
                'region' => 'East Africa',
                'indicatif' => '+261'
            ]);
            DB::table('countries')->insert([
                'name' => __('Malawi'),
                'region' => 'East Africa',
                'indicatif' => '+265'
            ]);
            DB::table('countries')->insert([
                'name' => __('Mauritius'),
                'region' => 'East Africa',
                'indicatif' => '+230'
            ]);
            DB::table('countries')->insert([
                'name' => __('Mozambique'),
                'region' => 'East Africa',
                'indicatif' => '+258'
            ]);
            DB::table('countries')->insert([
                'name' => __('Rwanda'),
                'region' => 'East Africa',
                'indicatif' => '+250'
            ]);
            DB::table('countries')->insert([
                'name' => __('Seychelles'),
                'region' => 'East Africa',
                'indicatif' => '+248'
            ]);
            DB::table('countries')->insert([
                'name' => __('Tanzania'),
                'region' => 'East Africa',
                'indicatif' => '+255'
            ]);
            DB::table('countries')->insert([
                'name' => __('Uganda'),
                'region' => 'East Africa',
                'indicatif' => '+256'
            ]);
            //Horn of Africa
            DB::table('countries')->insert([
                'name' => __('Djibouti'),
                'region' => 'East Africa',
                'indicatif' => '+253'
            ]);
            DB::table('countries')->insert([
                'name' => __('Eritrea'),
                'region' => 'East Africa',
                'indicatif' => '+291'
            ]);
            DB::table('countries')->insert([
                'name' => __('Ethiopia'),
                'region' => 'East Africa',
                'indicatif' => '+251'
            ]);
            DB::table('countries')->insert([
                'name' => __('Somalia'),
                'region' => 'East Africa',
                'indicatif' => '+252'
            ]);
        //Southern Africa
            DB::table('countries')->insert([
                'name' => __('Botswana'),
                'region' => 'Southern Africa',
                'indicatif' => '+267'
            ]);
            DB::table('countries')->insert([
                'name' => __('Lesotho'),
                'region' => 'Southern Africa',
                'indicatif' => '+266'
            ]);
            DB::table('countries')->insert([
                'name' => __('Namibia'),
                'region' => 'Southern Africa',
                'indicatif' => '+264'
            ]);
            DB::table('countries')->insert([
                'name' => __('Eswantini'),
                'region' => 'Southern Africa',
                'indicatif' => '+268'
            ]);
            DB::table('countries')->insert([
                'name' => __('South Africa'),
                'region' => 'Southern Africa',
                'indicatif' => '+27'
            ]);
            DB::table('countries')->insert([
                'name' => __('Zambia'),
                'region' => 'Southern Africa',
                'indicatif' => '+260'
            ]);
            DB::table('countries')->insert([
                'name' => __('Zimbabwe'),
                'region' => 'Southern Africa',
                'indicatif' => '+263'
            ]);
    }
}
