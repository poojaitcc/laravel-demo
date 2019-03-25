<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete'
       ];

       $roles = ['admin','manager','employee'];
       foreach ($roles as $role) {
         Role::create(['name' => $role, 'guard_name' => 'web']);
     }

     foreach ($permissions as $permission) {
       Permission::create(['name' => $permission]);
   }
 }
}
