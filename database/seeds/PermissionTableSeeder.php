<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //permisos para cursos
        DB::table('permissions')->insert([
            'name'=>'role-list',
        ]);
        DB::table('permissions')->insert([
            'name'=>'role-create',
        ]);
        DB::table('permissions')->insert([
            'name'=>'role-edit',
        ]);
        DB::table('permissions')->insert([
            'name'=>'role-delete',
        ]);
        /* permisos para roles */
        DB::table('permissions')->insert([
            'name'=>'product-list',
        ]);
        DB::table('permissions')->insert([
            'name'=>'product-create',
        ]);
        DB::table('permissions')->insert([
            'name'=>'product-edit',
        ]);
        DB::table('permissions')->insert([
            'name'=>'product-delete',
        ]);
        //dando un rool root a un usuario con id:1
        DB::table('model_has_roles')->insert([

            'model_type'=>'App\User',
            'role_id'=>'1',
            'model_id'=>'1',
        ]); 
        //dando permisos a un rol root con role_id:1
        DB::table('role_has_permissions')->insert([
            'permission_id'=>'1',
            'role_id'=>'1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id'=>'2',
            'role_id'=>'1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id'=>'3',
            'role_id'=>'1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id'=>'4',
            'role_id'=>'1'
        ]);
        //--
        DB::table('role_has_permissions')->insert([
            'permission_id'=>'5',
            'role_id'=>'1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id'=>'6',
            'role_id'=>'1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id'=>'7',
            'role_id'=>'1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id'=>'8',
            'role_id'=>'1'
        ]);  
        //------------------------------------------

    }
}
