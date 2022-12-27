<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'admin',
            'email' => 'testadmin@gmail.com',
            "password" => Hash::make("12345678"),
        ]);
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        'news-list',
        'news-create',
        'news-edit',
        'news-delete',
        'news-partner-list',
        'news-partner-create',
        'news-partner-edit',
        'news-partner-delete',
        'category-list',
        'category-create',
        'category-edit',
        'category-delete',
        'location-list',
        'location-create',
        'location-edit',
        'location-delete',
        'polls-list',
        'polls-create',
        'polls-edit',
        'polls-delete',
    ]);
    $user->assignRole([$role->id]);
    }
}
