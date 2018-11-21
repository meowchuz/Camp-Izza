<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

use App\Repositories\CamperRepository;

class CamperController extends Controller
{
    /**
     * The CamperRepository instance.
     *
     * @var App\Repositories\CamperRepository
     */
    protected $camperRepository;

    /**
     * Create a new ParentController instance.
     *
     * @param  App\Repositories\CamperRepository $camperRepository
     * @return void
    */
    public function __construct(CamperRepository $camperRepository) {
        $this->camperRepository = $camperRepository;
    }

    /**
     * Show campers
     * 
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function campers(Request $request) {
        $request->user()->authorizeRoles(['parent', 'owner']);

        if ('owner' == Auth::user()->roles[0]->name) {
            $campers = $this->camperRepository->getCampersWithPagination();

            $totalItemsCount = $campers->total();
            $numberOfItemsPerPage = $campers->perPage();
            $page = $campers->currentPage();

            $numberOfPages = floor(($totalItemsCount + $numberOfItemsPerPage - 1) / $numberOfItemsPerPage);
            $start = ($page * $numberOfItemsPerPage) - ($numberOfItemsPerPage - 1);
            $end = min($start + $numberOfItemsPerPage - 1, $totalItemsCount);

            $phoneTypes = [
                'cell' => 'Cell',
                'home' => 'Home',
                'work' => 'Work',
                'other' => 'Other'
            ];

            return view('pages.owner.campers', [
                'start' => $start,
                'end' => $end,
                'campers' => $campers,
                'phoneTypes' => $phoneTypes
            ]);
        }

        $campers = $this->camperRepository->getCampers(Auth::user()->id);

        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '06' => 'May',
            '05' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];

        $currenYear = date('Y');
        
        return view('pages.parent.campers', [
            'months' => $months,
            'currenYear' => $currenYear,
            'campers' => $campers
        ]);
    }

    /**
     * Store camper information
     * 
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function addCamper(Request $request) {
        try {
            DB::beginTransaction();

            $camper = (object) [
                'name' => $request->input('camper_name'),
                'gender' => $request->input('camper_gender'),
                'birthday' => $request->input('camper_birthday'),

                'parent' => Auth::user()->id
            ];

            $this->camperRepository->addCamper($camper);

            DB::commit();

            return redirect('campers', 201);
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Update camper information
     * 
     * @param  Illuminate\Http\Request $request
     * @param integer $camper
     * @return Illuminate\Http\RedirectResponse
     */
    public function updateCamper(Request $request, $camper) {
        try {
            DB::beginTransaction();

            $camper = (object) [
                'id' => $camper,
                'name' => $request->input('camper_name'),
                'gender' => $request->input('camper_gender'),
                'birthday' => $request->input('camper_birthday'),
            ];

            $this->camperRepository->updateCamper($camper);

            DB::commit();

            return redirect('campers');
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
