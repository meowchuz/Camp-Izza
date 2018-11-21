<?php

namespace App\Repositories;

use DB;
use Carbon\Carbon;

class CamperRepository
{
    /**
     * Add camper aka child
     * 
     * @param object $camper
     * @return void
     */
    public function addCamper($camper) {
        DB::table('campers')->insert([
            'name' => $camper->name,
            'gender' => $camper->gender,
            'birthday' => $camper->birthday,

            'parent' => $camper->parent,
            'created_at' =>  Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    /**
     * Get all children of parentID
     * 
     * @param integer $parent
     * @return Illuminate\Support\Collection;
     */
    public function getCampers($parent) {
        $campers = DB::table('campers')->where('parent', $parent)->get();
        return $campers;
    }

    /**
     * Get all children
     * 
     * @return Illuminate\Support\Collection;
     */
    public function getCampersWithPagination() {
        $campers = DB::table('campers')->paginate(20);
        return $campers;
    }

    /**
     * Add camper aka child
     * 
     * @param object $camper
     * @return void
     */
    public function updateCamper($camper) {
        $status = DB::table('campers')
            ->where('id', $camper->id)
            ->update([
                'name' => $camper->name,
                'gender' => $camper->gender,
                'birthday' => $camper->birthday,
                'updated_at' => Carbon::now()
            ]);
    }

    /**
     * Get camper by ID
     * 
     * @param integer $camper
     * @return Illuminate\Support\Collection;
     */
    public function getCamper($camper) {
        $camper = DB::table('campers')->where('id', $camper)->first();
        return $camper;
    }
}
