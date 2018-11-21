<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_owner = Role::where('name', 'owner')->first();

        $owner = new User();
        $owner->email = 'info@campizza.com';
        $owner->password = bcrypt('4Campizza');
        $owner->fullFill = true;
        $owner->save();
        $owner->roles()->attach($role_owner);

        $role_parent = Role::where('name', 'parent')->first();

        $parent = new User();
        $parent->email = 'test@gmail.com';
        $parent->password = bcrypt('123456');
        $parent->fullFill = true;
        $parent->save();
        $parent->roles()->attach($role_parent);
    }
}
