<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->getCities() ?? [] as $city)
        {
            City::firstOrCreate([
                'id'                            => $city['id'],
            ], [
                'name'                          => $city['name'],
                'slug'                          => Str::slug($city['name']),
            ]);
        }

    }

    private function getCities()
    {
        return [

            ['id' => '1',   'name' => 'Natore'],
            ['id' => '2',   'name' => 'testv'],
            ['id' => '3',   'name' => 'Chuadanga'],
            ['id' => '4',   'name' => 'Chittagong'],
            ['id' => '5',   'name' => 'Bogra'],
            ['id' => '6',   'name' => 'Sylhet'],
            ['id' => '7',   'name' => 'Bandarban'],
            ['id' => '8',   'name' => 'Sirajganj'],
            ['id' => '9',   'name' => 'Lakshmipur'],
            ['id' => '10',  'name' => 'Bhola'],
            ['id' => '11',  'name' => 'Lalmonirhat'],
            ['id' => '12',  'name' => 'Rajbari'],
            ['id' => '13',  'name' => 'Narayanganj'],
            ['id' => '14',  'name' => 'Kishoreganj'],
            ['id' => '15',  'name' => 'Mymensingh'],
            ['id' => '16',  'name' => 'Comilla'],
            ['id' => '17',  'name' => 'Narail'],
            ['id' => '18',  'name' => 'Satkhira'],
            ['id' => '19',  'name' => 'Madaripur'],
            ['id' => '20',  'name' => 'Shariatpur'],
            ['id' => '21',  'name' => 'Thakurgaon'],
            ['id' => '22',  'name' => 'Rangpur'],
            ['id' => '23',  'name' => 'Dinajpur'],
            ['id' => '24',  'name' => 'Panchagarh'],
            ['id' => '25',  'name' => 'Rangamati'],
            ['id' => '26',  'name' => 'Jessore'],
            ['id' => '27',  'name' => 'Khagrachhari'],
            ['id' => '28',  'name' => 'Joypurhat'],
            ['id' => '29',  'name' => 'Gazipur'],
            ['id' => '30',  'name' => 'Jhenaidah'],
            ['id' => '31',  'name' => 'Noakhali'],
            ['id' => '32',  'name' => 'Rajshahi'],
            ['id' => '33',  'name' => 'Manikganj'],
            ['id' => '34',  'name' => 'Kushtia'],
            ['id' => '35',  'name' => 'Pabna'],
            ['id' => '36',  'name' => 'Moulvibazar'],
            ['id' => '37',  'name' => 'Khulna'],
            ['id' => '38',  'name' => 'Kurigram'],
            ['id' => '39',  'name' => 'Jamalpur'],
            ['id' => '40',  'name' => 'Munshiganj'],
            ['id' => '41',  'name' => 'Narsingdi'],
            ['id' => '42',  'name' => 'Patuakhali'],
            ['id' => '43',  'name' => 'Netrakona'],
            ['id' => '44',  'name' => 'Gaibandha'],
            ['id' => '45',  'name' => 'Meherpur'],
            ['id' => '46',  'name' => 'Brahmanbaria'],
            ['id' => '47',  'name' => 'Sherpur'],
            ['id' => '48',  'name' => 'Magura'],
            ['id' => '49',  'name' => 'Nilphamari'],
            ['id' => '50',  'name' => 'Nawabganj'],
            ['id' => '51',  'name' => 'Barisal'],
            ['id' => '52',  'name' => 'Sunamganj'],
            ['id' => '53',  'name' => 'Barguna'],
            ['id' => '54',  'name' => 'Faridpur'],
            ['id' => '55',  'name' => 'Jhalokati'],
            ['id' => '56',  'name' => 'Tangail'],
            ['id' => '57',  'name' => 'Pirojpur'],
            ['id' => '58',  'name' => 'Dhaka'],
            ['id' => '59',  'name' => 'Gopalganj'],
            ['id' => '60',  'name' => 'Feni'],
            ['id' => '61',  'name' => 'Bagerhat'],
            ['id' => '62',  'name' => 'Cox\'s Bazar'],
            ['id' => '63',  'name' => 'Chandpur'],
            ['id' => '64',  'name' => 'Habiganj']
        ];
    }
}
