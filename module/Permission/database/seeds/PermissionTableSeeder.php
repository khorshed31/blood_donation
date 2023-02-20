<?php

namespace Module\Permission\database\seeds;

use Illuminate\Database\Seeder;
use Module\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDatas() ?? [] as $permission) {
            Permission::updateOrCreate([
                'slug'                  => $permission['slug'],
            ], [
                'name'                  => $permission['name'],
                'submodule_id'          => $permission['submodule_id'],
                'created_by'            => 1,
                'updated_by'            => 1,
            ]);
        }
    }

    private function getDatas()
    {
        return [
            ['id' => '1', 'name' => 'Sale',                    'slug'  => 'dokani.sales.index',                   'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '2', 'name' => 'Sale Create',             'slug'  => 'dokani.sales.create',                  'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '3', 'name' => 'Sale View',               'slug'  => 'dokani.sales.show',                  'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '4', 'name' => 'Sale Delete',             'slug'  => 'dokani.sales.delete',                  'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '5', 'name' => 'Collection List',         'slug'  => 'dokani.collections.index',             'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '2', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '6', 'name' => 'Collection Create',       'slug'  => 'dokani.collections.create',            'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '2', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '7', 'name' => 'Collection Delete',       'slug'  => 'dokani.collections.delete',            'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '2', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '8', 'name' => 'Purchase List',           'slug'  => 'dokani.purchases.index',               'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '4', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '9', 'name' => 'Purchase Create',         'slug'  => 'dokani.purchases.create',              'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '4', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '10', 'name' => 'Purchase View',           'slug'  => 'dokani.purchases.show',              'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '4', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '11', 'name' => 'Purchase Delete',         'slug'  => 'dokani.purchases.delete',              'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '4', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '12', 'name' => 'Due Payment List',        'slug'  => 'dokani.payments.index',                'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '5', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '13', 'name' => 'Due Payment Create',      'slug'  => 'dokani.payments.create',               'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '5', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '14', 'name' => 'Due Payment Delete',      'slug'  => 'dokani.payments.delete',               'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '5', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '15', 'name' => 'Product List',            'slug'  => 'dokani.product.products.index',       'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '6', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '16', 'name' => 'Product Create',         'slug'  => 'dokani.product.products.create',       'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '6', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '17', 'name' => 'Product Update',         'slug'  => 'dokani.product.products.edit',         'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '6', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '18', 'name' => 'Product Delete',         'slug'  => 'dokani.product.products.delete',       'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '6', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '19', 'name' => 'Product Barcode',        'slug'  => 'dokani.product-barcode.index',         'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '6', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '20', 'name' => 'Unit List',              'slug'  => 'dokani.product.units.index',           'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '7', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '21', 'name' => 'Unit Create',            'slug'  => 'dokani.product.units.store',           'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '7', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '22', 'name' => 'Unit Update',            'slug'  => 'dokani.product.units.update',          'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '7', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '23', 'name' => 'Unit Delete',            'slug'  => 'dokani.product.units.delete',          'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '7', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '24', 'name' => 'Category List',          'slug'  => 'dokani.product.categories.index',      'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '8', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '25', 'name' => 'Category Create',        'slug'  => 'dokani.product.categories.store',      'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '8', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '26', 'name' => 'Category Update',        'slug'  => 'dokani.product.categories.update',     'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '8', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '27', 'name' => 'Category Delete',        'slug'  => 'dokani.product.categories.delete',     'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '8', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '28', 'name' => 'Supplier List',          'slug'  => 'dokani.suppliers.index',               'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '12', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '29', 'name' => 'Supplier Create',        'slug'  => 'dokani.suppliers.store',               'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '12', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '30', 'name' => 'Supplier Edit',          'slug'  => 'dokani.suppliers.edit',                'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '12', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '31', 'name' => 'Supplier Delete',        'slug'  => 'dokani.suppliers.delete',              'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '12', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '32', 'name' => 'Customer List',          'slug'  => 'dokani.customers.index',               'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '11', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '33', 'name' => 'Customer Create',        'slug'  => 'dokani.customers.store',               'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '11', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '34', 'name' => 'Customer Edit',          'slug'  => 'dokani.customers.edit',                'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '11', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '35', 'name' => 'Customer Delete',        'slug'  => 'dokani.customers.delete',              'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '11', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '36', 'name' => 'Inventory',              'slug'  => 'dokani.reports.inventory',             'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '37', 'name' => 'Alert Inventory',        'slug'  => 'dokani.reports.alert-inventory',       'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '38', 'name' => 'Sales',                  'slug'  => 'dokani.reports.sales',                 'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '39', 'name' => 'Purchase',               'slug'  => 'dokani.reports.purchase',              'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '40', 'name' => 'Cash Flow',              'slug'  => 'dokani.reports.cash-flow',             'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '41', 'name' => 'Receiveable Due',        'slug'  => 'dokani.reports.receivable-due',       'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '42', 'name' => 'Payable Due',            'slug'  => 'dokani.reports.payable-due',          'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '43', 'name' => 'Customer Ledger',        'slug'  => 'dokani.reports.customer-ledger',       'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '44', 'name' => 'Supplier Ledger',        'slug'  => 'dokani.reports.supplier-ledger',       'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '18', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '45', 'name' => 'User List',              'slug'  => 'dokani.users.index',                   'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '27', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '46', 'name' => 'User Create',            'slug'  => 'dokani.users.store',                   'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '27', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '47', 'name' => 'User Update',            'slug'  => 'dokani.users.update',                  'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '27', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '48', 'name' => 'User Delete',            'slug'  => 'dokani.users.delete',                  'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '27', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '49', 'name' => 'Income Create',          'slug'  => 'dokani.ac.voucher-payments.store',      'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '13', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '50', 'name' => 'Income List',            'slug'  => 'dokani.ac.voucher-payments.index',      'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '13', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '51', 'name' => 'Income Delete',          'slug'  => 'dokani.ac.voucher-payments.delete',     'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '13', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '52', 'name' => 'Expense Create',         'slug'  => 'dokani.ac.voucher-payments.store',      'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '14', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '53', 'name' => 'Expense List',           'slug'  => 'dokani.ac.voucher-payments.index',      'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '14', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '54', 'name' => 'Expense Delete',         'slug'  => 'dokani.ac.voucher-payments.delete',     'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '14', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '55', 'name' => 'G Parties Create',       'slug'  => 'dokani.ac.parties.store',                'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '16', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '56', 'name' => 'G Parties List',         'slug'  => 'dokani.ac.parties.index',                'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '16', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '57', 'name' => 'G Parties Edit',         'slug'  => 'dokani.ac.parties.edit',                'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' =>  '16', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '58', 'name' => 'G Parties Delete',       'slug'  => 'dokani.ac.parties.delete',               'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '16', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '59', 'name' => 'Chart of Account Create', 'slug'  => 'dokani.ac.chars.store',                 'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '17', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '60', 'name' => 'Chart of Account List',   'slug'  => 'dokani.ac.chars.index',                 'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '17', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '61', 'name' => 'Chart of Account Edit',   'slug'  => 'dokani.ac.chars.edit',                 'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' =>  '17', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '62', 'name' => 'Chart of Account Delete', 'slug'  => 'dokani.ac.chars.delete',                'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '17', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '63', 'name' => 'Sales Return Exchange',   'slug'  => 'dokani.sale-return-exchanges.create',   'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' =>  '3', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '64', 'name' => 'Sales Return List',       'slug'  => 'dokani.sale-return-exchanges.index',    'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' =>  '3', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '69', 'name' => 'Business Setting',       'slug'  => 'dokani.business-profile.index',          'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' =>  '37', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '65', 'name' => 'Order',                    'slug'  => 'dokani.orders.index',                   'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '38', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '66', 'name' => 'Order Create',             'slug'  => 'dokani.orders.create',                  'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '38', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '67', 'name' => 'Order Sale',               'slug'  => 'dokani.orders.edit',                    'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '38', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '68', 'name' => 'Order Delete',             'slug'  => 'dokani.orders.destroy',                 'description' => NULL, 'created_by' => '1', 'updated_by' => '1', 'submodule_id' => '38', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

        ];
    }
}
