<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use ReCaptcha\ReCaptcha;

use App\Repositories\CountryRepository;
use App\Repositories\StateRepository;
use App\Repositories\CityRepository;
use App\Repositories\CamperRepository;
use App\Repositories\ParentRepository;

class ApiController extends Controller
{
    /**
     * The CountryRepository instance.
     *
     * @var App\Repositories\CountryRepository
     */
    protected $countryRepository;

    /**
     * The StateRepository instance.
     *
     * @var App\Repositories\StateRepository
     */
    protected $stateRepository;

    /**
     * The CityRepository instance.
     *
     * @var App\Repositories\CityRepository
     */
    protected $cityRepository;

    /**
     * The CamperRepository instance.
     *
     * @var App\Repositories\CamperRepository
     */
    protected $camperRepository;

    /**
     * The ParentRepository instance.
     *
     * @var App\Repositories\ParentRepository
     */
    protected $parentRepository;

    /**
     * Create a new ApiController instance.
     *
     * @param  App\Repositories\CountryRepository $countryRepository
     * @param  App\Repositories\StateRepository $stateRepository
     * @param  App\Repositories\CityRepository $cityRepository
     * @param  App\Repositories\CamperRepository $camperRepository
     * @param App\Repositories\ParentRepository $parentRepository
     * @return void
    */
    public function __construct(
            CountryRepository $countryRepository,
            StateRepository $stateRepository,
            CityRepository $cityRepository,
            CamperRepository $camperRepository,
            ParentRepository $parentRepository) {
        $this->countryRepository = $countryRepository;
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
        $this->camperRepository = $camperRepository;
        $this->parentRepository = $parentRepository;
    }

    /**
     * Get countries
     * 
     * @return Illuminate\Contracts\Routing\ResponseFactory
     */
    public function getCountries() {
        $countries = $this->countryRepository->all();
        return response()->json($countries);
    }

    /**
     * Get states
     * 
     * @return Illuminate\Contracts\Routing\ResponseFactory
     */
    public function getStates() {
        $states = $this->stateRepository->all();
        return response()->json($states);
    }

    /**
     * Get Cities
     * 
     * @param  Illuminate\Http\Request $request
     * @param integer $id
     * @return Illuminate\Contracts\Routing\ResponseFactory
     */
    public function getCitiesByState(Request $request, $state) {
        $cities = $this->cityRepository->getByState($state);
        return response()->json($cities);
    }

    /**
     * Verify ReCaptcha
     * 
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Contracts\Routing\ResponseFactory
     */
    public function verifyReCaptcha(Request $request) {
        $secretKey = env('GOOGLE_RECAPTCHA_SECRET');
        $action = $request->input('action');
        $token = $request->input('token');
        $recaptcha = new ReCaptcha($secretKey);
        $response = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                        ->setExpectedAction($action)
                        ->setScoreThreshold(0.5)
                        ->verify($token, $_SERVER['REMOTE_ADDR']);
        return response()->json($response);
    }

    /**
     * Get one camper
     * 
     * @param  Illuminate\Http\Request $request
     * @param integer $camper
     * @return Illuminate\Http\Response
     */
    public function camper(Request $request, $camper) {
        $camper = $this->camperRepository->getCamper($camper);
        return response()->json($camper);
    }

    /**
     * Get one parent
     * 
     * @param  Illuminate\Http\Request $request
     * @param integer $parent
     * @return Illuminate\Http\Response
     */
    public function parent(Request $request, $parent) {
        $parent = $this->parentRepository->getParent($parent);
        return response()->json($parent);
    }
}
