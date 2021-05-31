<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeesder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'manager_access',
            'role_access',
            'permission_access',
            'user_access',
            'role_create',
            'role_delete',
            'role_edit',
            'role_show',
            'permission_show',
            'permission_delete',
            'permission_edit',
            'permission_create',
            'user_create',
            'user_delete',
            'user_edit',
            'user_show',
            'import_create',
            'import_access',
            'import_edit',
            'import_delete',
            'export_create',
            'export_access',
            'export_delete',
            'export_edit',
            'export_show',
            'product_access',
            'product_delete',
            'product_edit',
            'product_show',
            'product_create',
            'brand_create',
            'brand_edit',
            'brand_delete',
            'brand_show',
            'brand_access',
            'category_access',
            'category_delete',
            'category_edit',
            'category_show',
            'category_create',
            'order_access',
            'order_create',
            'order_edit',
            'order_show',
            'order_delete',
            'payment_access',
            'payment_edit',
            'payment_show',
            'payment_create',
            'payment_delete',
            'shipment_access',
            'shipment_edit',
            'shipment_create',
            'shipment_edit',
            'shipment_delete',
            'supplier_access',
            'supplier_edit',
            'supplier_create',
            'supplier_delete',
            'supplier_show',
            'product_color_create',
            'product_color_edit',
            'product_color_show',
            'product_color_delete',
            'product_color_access',
            'product_size_create',
            'product_size_edit',
            'product_size_delete',
            'product_size_show',
            'product_size_access',
            'product_variant_access',
            'product_variant_edit',
            'product_variant_create',
            'product_variant_show',
            'product_variant_delete',
            'user_management',
            'product_manager',
            'order_manager',
            'inventory_manager',

        ];
        foreach ($permissions as $permission){
            $p=Permission::create([
                'title'          =>$permission,
                'description' =>''
            ]);
        }

        //
    }
}
