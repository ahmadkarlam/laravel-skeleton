<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$webRrole = Role::create(['name' => 'super-admin']);
		$webPermission = Permission::create(['name' => 'all backend']);
		$webRrole->givePermissionTo($webPermission);

    	$apiRole = Role::create(['name' => 'api']);
		$apiPermission = Permission::create(['name' => 'all api']);
		$apiRole->givePermissionTo($apiPermission);

        factory('App\User', 1)->create()->each(function($user){
        	$user->assignRole(['super-admin', 'api']);
        });
    }
}
