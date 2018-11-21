<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            (object) [
                'name' => 'owner',
                'description' => 'Camp Owner'
            ],
            (object) [
                'name' => 'counselor',
                'description' => 'The young adult or teenage supervisors'
            ],
            (object) [
                'name' => 'parent',
                'description' => 'Parent of camper'
            ]
        ];

        foreach ($roles as $role) {
            $role_employee = new Role();
            $role_employee->name = $role->name;
            $role_employee->description = $role->description;
            $role_employee->save();
        }
    }
}
