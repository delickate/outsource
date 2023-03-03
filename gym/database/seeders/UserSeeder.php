<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* Users */
        User::updateOrCreate(['id'=>1],['name'=>'Super Admin','email'=>'jarribhaig@gmail.com','userName'=>'superadmin','password'=>'$2y$10$OURI7FLfOFOON3OFudqHOOencdd2eJ8qgnhYpFMC8mU1F8mYAwqq2','status'=>1]);
        


        /* Role & Permissions */

        /* Role */
        Role::updateOrCreate(['id'=>1],['name'=>'Super Admin','guard_name'=>'web','status'=>1]);


        /* Permission */
        /* Permission - user */
        Permission::updateOrCreate(['id'=>1],['name'=>'user.create','description'=>'Create User','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>2],['name'=>'user.read','description'=>'Read User','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>3],['name'=>'user.update','description'=>'Edit User','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>4],['name'=>'user.delete','description'=>'Delete User','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>5],['name'=>'user.status','description'=>'Delete User','guard_name'=>'web']);
        /* Permission - Role */
        Permission::updateOrCreate(['id'=>5],['name'=>'role.create','description'=>'Create role','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>6],['name'=>'role.read','description'=>'Read role','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>7],['name'=>'role.update','description'=>'Edit role','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>8],['name'=>'role.delete','description'=>'Delete role','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>9],['name'=>'role.status','description'=>'Delete role','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>10],['name'=>'role.assign','description'=>'Role Assign','guard_name'=>'web']);
        Permission::updateOrCreate(['id'=>11],['name'=>'permission.read','description'=>'Assign Role / Permission Read','guard_name'=>'web']);
        
        
        $AllPermissions = Permission::get();
        $superAdmin = Role::where('id',1)->first();
        $superAdmin->syncPermissions($AllPermissions);
        $superAdminUser = User::where('id',1)->first();
        $superAdminUser->syncRoles($superAdmin);

    }
}
