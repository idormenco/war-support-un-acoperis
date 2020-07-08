<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class PermissionTableSeeder
 */
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // @see https://docs.spatie.be/laravel-permission/v3/advanced-usage/cache/#manual-cache-reset
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        Permission::create(['name' => 'is administrator']);
        Permission::create(['name' => 'is landlord']);

        /** @var Role $administrator */
        $administrator = Role::create(['name' => 'administrator']);
        $administrator->givePermissionTo('is administrator');

        /** @var Role $teacherRole */
        $teacherRole = Role::create(['name' => 'landlord']);
        $teacherRole->givePermissionTo('is landlord');
    }
}