<?php

namespace Module\Permission\database\seeds;

use Illuminate\Database\Seeder;
use Module\Permission\Models\Submodule;

class SubmoduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getSubmodules() ?? [] as $submodule) {
            Submodule::updateOrCreate([
                'id'        => $submodule['id'],
            ], [
                'name'      => $submodule['name'],
                'module_id' => $submodule['module_id'],
            ]);
        }
        Submodule::whereNotIn('id', collect($this->getSubmodules())->pluck('id'))->delete();
    }

    private function getSubmodules()
    {
        return [
            ['id' => '1',  'name' => 'Sale',                      'module_id' => '2',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '2',  'name' => 'Due Collection',            'module_id' => '2',  'created_at' => '2019-12-25 20:46:45', 'updated_at' => '2020-02-12 06:00:57'],
            ['id' => '3',  'name' => 'Sales Return Exchange',     'module_id' => '13', 'created_at' => '2019-12-25 20:46:45', 'updated_at' => '2020-02-12 06:00:57'],

            ['id' => '4',  'name' => 'Purchase',                  'module_id' => '3',  'created_at' => '2019-12-25 20:46:45', 'updated_at' => '2020-02-12 06:00:57'],
            ['id' => '5',  'name' => 'Due Payment',               'module_id' => '3',  'created_at' => '2019-12-25 20:46:45', 'updated_at' => '2020-02-12 06:00:57'],

            ['id' => '6',  'name' => 'Product',                   'module_id' => '4',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '7',  'name' => 'Unit',                      'module_id' => '4',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '8',  'name' => 'Categories',                'module_id' => '4',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],

            ['id' => '11', 'name' => 'Customer',                  'module_id' => '5',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],

            ['id' => '12', 'name' => 'Supplier',                  'module_id' => '6',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],

            ['id' => '13', 'name' => 'Income',                    'module_id' => '7',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '14', 'name' => 'Expense',                   'module_id' => '7',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '15', 'name' => 'Fund Transfer',             'module_id' => '7',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '16', 'name' => 'G Parties',                 'module_id' => '7',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '17', 'name' => 'Chart of Account',          'module_id' => '7',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],


            ['id' => '18', 'name' => 'Reports',                   'module_id' => '8',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],

            ['id' => '27', 'name' => 'User',                      'module_id' => '9',  'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],

            ['id' => '28', 'name' => 'By SMS Package',            'module_id' => '10', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '29', 'name' => 'Send SMS',                  'module_id' => '10', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '30', 'name' => 'Groups',                    'module_id' => '10', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],

            ['id' => '31', 'name' => 'Employees',                 'module_id' => '11', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '32', 'name' => 'Attendence Management',     'module_id' => '11', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '33', 'name' => 'Advance',                   'module_id' => '11', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '34', 'name' => 'Salary',                    'module_id' => '11', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '35', 'name' => 'Payroll Setting',           'module_id' => '11', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '36', 'name' => 'Holidays',                  'module_id' => '11', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],
            ['id' => '37', 'name' => 'Business Setting',          'module_id' => '12', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],

            ['id' => '38', 'name' => 'Order',                      'module_id' => '14', 'created_at' => '2019-12-25 20:45:50', 'updated_at' => '2019-12-25 23:03:11'],

        ];
    }
}
