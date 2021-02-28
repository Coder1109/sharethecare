<?php
use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get Available Permissions.
         */
        $permissions = config('roles.models.permission')::all();

        /**
         * Attach Permissions to Roles.
         */
        $roleSuperAdmin = config('roles.models.role')::where('slug', '=', 'superadmin')->first();
        foreach ($permissions as $permission) {
            $roleSuperAdmin->attachPermission($permission);
        }
    }
}
