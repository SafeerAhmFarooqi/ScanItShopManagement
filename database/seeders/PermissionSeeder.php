<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $configPermissions =  config('perm');
        $dbPermissions = Permission::all()->keyBy('id')->pluck('name')->toArray();
        $newPermissions = [];

        foreach ($configPermissions as $scope => $Permission) {
            foreach ($Permission as $perm){
                if(!in_array($perm, $dbPermissions)){
                    $newPermissions[] = [ 'name' => $perm, 'guard_name' => 'web'];
                }
            }
        }

        if($newPermissions)
        {
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
            Permission::insert($newPermissions);
        }
    }
}
