<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // $this->command->call('migrate:refresh');

        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        $rol_admin = Role::create([
            'name' => 'Administrador'
        ]);

        $rol_admin->syncPermissions(Permission::all());

        $user = User::create([
            'name' => "Juan Pablo Salazar",
            'username' => '1061701570',
            'email' => "pablo.salazar.restrepo@gmail.com",
            'password' => "admin87",
            'remember_token' => str_random(10),
        ]);

        $user->assignRole($rol_admin->name);

        $rol = Role::create([
            'name' => 'Porteria'
        ]);

        $user = User::create([
            'name' => "Pepe perez",
            'username' => '111111',
            'email' => "porteria@gmail.com",
            'password' => "admin87",
            'remember_token' => str_random(10),
        ]);

        $user->assignRole($rol->name);

        $role = Role::create([
            'name' => 'Carnetización'
        ]);

        $user = User::create([
            'name' => "Maria perez",
            'username' => '222222',
            'email' => "carnet@gmail.com",
            'password' => "admin87",
            'remember_token' => str_random(10),
        ]);

        $user->assignRole($rol->name);

    }
}
