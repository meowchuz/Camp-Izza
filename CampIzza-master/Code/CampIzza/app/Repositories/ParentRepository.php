<?php

namespace App\Repositories;

use DB;
use Carbon\Carbon;

class ParentRepository
{
    /**
     * Save parent contact information
     * 
     * @param object $contact
     * @return void
     */
    public function saveContact($contact) {
        DB::table('contacts')->insert([
            'parent_1' => $contact->parent_1,
            'parent_2' => $contact->parent_2,
            'email_1' => $contact->email_1,
            'email_2' => $contact->email_2,
            'address_1' => $contact->address_1,
            'address_2' => $contact->address_2,
            'country' => $contact->country,
            'state' => $contact->state,
            'city' => $contact->city,
            'zipcode' => $contact->zipcode,

            'phone_1' => $contact->phone_1,
            'phone_2' => $contact->phone_2,
            'phone_3' => $contact->phone_3,
            'phone_4' => $contact->phone_4,
            'phone_type_1' => $contact->phone_type_1,
            'phone_type_2' => $contact->phone_type_2,
            'phone_type_3' => $contact->phone_type_3,
            'phone_type_4' => $contact->phone_type_4,

            'emergency_name_1' => $contact->emergency_name_1,
            'emergency_name_2' => $contact->emergency_name_2,
            'emergency_relationship_1' => $contact->emergency_relationship_1,
            'emergency_relationship_2' => $contact->emergency_relationship_2,
            'emergency_phone_1' => $contact->emergency_phone_1,
            'emergency_phone_2' => $contact->emergency_phone_2,

            'user' => $contact->user,
            'created_at' =>  Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    /**
     * Get contact of parent by parentID
     * 
     * @param integer $parent
     * @return Illuminate\Support\Collection;
     */
    public function getContact($parent) {
        $contact = DB::table('contacts')->where('user', $parent)->first();
        return $contact;
    }

    /**
     * Get list of parents
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getParents() {
        $parents = DB::table('users')
                        ->join('role_user', 'users.id', '=', 'role_user.user_id')
                        ->join('roles', 'role_user.role_id', '=', 'roles.id')
                        ->leftJoin('contacts', 'users.id', '=', 'contacts.user')
                        ->where('roles.name', 'parent')
                        ->select('users.id', 'users.email', 'contacts.parent_1', 'contacts.parent_2')
                        ->paginate(20);
        return $parents;
    }

    /**
     * Get parent by ID
     * 
     * @param integer $parent
     * @return Illuminate\Support\Collection;
     */
    public function getParent($parent) {
        $parent = DB::table('users')
                        ->join('role_user', 'users.id', '=', 'role_user.user_id')
                        ->join('roles', 'role_user.role_id', '=', 'roles.id')
                        ->leftJoin('contacts', 'users.id', '=', 'contacts.user')
                        ->where([
                            ['users.id', '=', $parent],
                            ['roles.name', '=', 'parent']
                        ])->select('contacts.*', 'users.id', 'users.email')
                        ->first();
        return $parent;
    }

    /**
     * Update parent contact information
     * 
     * @param object $contact
     * @return void
     */
    public function updateContact($contact) {
        DB::table('contacts')
            ->where('user', $contact->user)
            ->update([
                'parent_1' => $contact->parent_1,
                'parent_2' => $contact->parent_2,
                'email_2' => $contact->email_2,
                'address_1' => $contact->address_1,
                'address_2' => $contact->address_2,
                'country' => $contact->country,
                'state' => $contact->state,
                'city' => $contact->city,
                'zipcode' => $contact->zipcode,

                'phone_1' => $contact->phone_1,
                'phone_2' => $contact->phone_2,
                'phone_3' => $contact->phone_3,
                'phone_4' => $contact->phone_4,
                'phone_type_1' => $contact->phone_type_1,
                'phone_type_2' => $contact->phone_type_2,
                'phone_type_3' => $contact->phone_type_3,
                'phone_type_4' => $contact->phone_type_4,

                'emergency_name_1' => $contact->emergency_name_1,
                'emergency_name_2' => $contact->emergency_name_2,
                'emergency_relationship_1' => $contact->emergency_relationship_1,
                'emergency_relationship_2' => $contact->emergency_relationship_2,
                'emergency_phone_1' => $contact->emergency_phone_1,
                'emergency_phone_2' => $contact->emergency_phone_2,
                'updated_at' => Carbon::now()
            ]);
    }
}
