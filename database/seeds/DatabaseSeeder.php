<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users',
            'category',
            'products',
            'transactions',
            'not_availables',
            'details',
            
        
        ]);

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        
        

    }

    protected function truncateTables(array $tables)

    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
