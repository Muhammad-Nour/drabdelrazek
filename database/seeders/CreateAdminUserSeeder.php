<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'muhammad nour', 
            'email' => 'muhammad.nour111@gmail.com',
            'password' => bcrypt('123456789'),
            'roles_name' => ['owner'],
            'status' => '1',
        ]);
    
        $role = Role::create(['name' => 'owner']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
