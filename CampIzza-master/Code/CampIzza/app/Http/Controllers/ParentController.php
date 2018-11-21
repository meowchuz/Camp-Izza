<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\ParentRepository;

class ParentController extends Controller
{
    /**
     * The ParentRepository instance.
     *
     * @var App\Repositories\ParentRepository
     */
    protected $parentRepository;

    /**
     * Create a new ParentController instance.
     *
     * @param  App\Repositories\ParentRepository $parentRepository
     * @return void
    */
    public function __construct(ParentRepository $parentRepository) {
        $this->parentRepository = $parentRepository;
    }

    /**
     * Show contact
     * 
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request) {
        $request->user()->authorizeRoles(['parent']);

        $phoneTypes = [
            'cell' => 'Cell',
            'home' => 'Home',
            'work' => 'Work',
            'other' => 'Other'
        ];
        $contact = $this->parentRepository->getContact(Auth::user()->id);

        return view('pages.parent.contact')
                    ->with('contact', $contact)
                    ->with('phoneTypes', $phoneTypes);
    }

    /**
     * Save contact information
     * 
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function saveContact(Request $request) {
        try {
            DB::beginTransaction();

            $contact = (object) [
                'parent_1' => $request->input('parent_1'),
                'parent_2' => $request->input('parent_2'),
                'email_1' => Auth::user()->email,
                'email_2' => $request->input('email_2'),
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'city' => $request->input('city'),
                'zipcode' => $request->input('zipcode'),
    
                'phone_1' => $request->input('phone_1'),
                'phone_2' => $request->input('phone_2'),
                'phone_3' => $request->input('phone_3'),
                'phone_4' => $request->input('phone_4'),
                'phone_type_1' => $request->input('phone_type_1'),
                'phone_type_2' => $request->input('phone_type_2'),
                'phone_type_3' => $request->input('phone_type_3'),
                'phone_type_4' => $request->input('phone_type_4'),
    
                'emergency_name_1' => $request->input('emergency_name_1'),
                'emergency_name_2' => $request->input('emergency_name_2'),
                'emergency_relationship_1' => $request->input('emergency_relationship_1'),
                'emergency_relationship_2' => $request->input('emergency_relationship_2'),
                'emergency_phone_1' => $request->input('emergency_phone_1'),
                'emergency_phone_2' => $request->input('emergency_phone_2'),
    
                'user' => Auth::user()->id
            ];
    
            $this->parentRepository->saveContact($contact);
    
            $user = Auth::user();
            $user->fullFill = true;
            $user->save();

            DB::commit();
    
            return redirect('contact');
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Get list of parents
     * 
     * @return \Illuminate\Http\Response
     */
    public function parents(Request $request) {
        $parents = $this->parentRepository->getParents();

        $totalItemsCount = $parents->total();
        $numberOfItemsPerPage = $parents->perPage();
        $page = $parents->currentPage();

        $numberOfPages = floor(($totalItemsCount + $numberOfItemsPerPage - 1) / $numberOfItemsPerPage);
        $start = ($page * $numberOfItemsPerPage) - ($numberOfItemsPerPage - 1);
        $end = min($start + $numberOfItemsPerPage - 1, $totalItemsCount);

        $phoneTypes = [
            'cell' => 'Cell',
            'home' => 'Home',
            'work' => 'Work',
            'other' => 'Other'
        ];

        return view('pages.owner.parent', [
            'parents' => $parents,
            'start' => $start,
            'end' => $end,
            'phoneTypes' => $phoneTypes
        ]);
    }

    /**
     * Update contact information
     * 
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function updateContact(Request $request) {
        try {
            DB::beginTransaction();

            $contact = (object) [
                'parent_1' => $request->input('parent_1'),
                'parent_2' => $request->input('parent_2'),
                'email_2' => $request->input('email_2'),
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'city' => $request->input('city'),
                'zipcode' => $request->input('zipcode'),
    
                'phone_1' => $request->input('phone_1'),
                'phone_2' => $request->input('phone_2'),
                'phone_3' => $request->input('phone_3'),
                'phone_4' => $request->input('phone_4'),
                'phone_type_1' => $request->input('phone_type_1'),
                'phone_type_2' => $request->input('phone_type_2'),
                'phone_type_3' => $request->input('phone_type_3'),
                'phone_type_4' => $request->input('phone_type_4'),
    
                'emergency_name_1' => $request->input('emergency_name_1'),
                'emergency_name_2' => $request->input('emergency_name_2'),
                'emergency_relationship_1' => $request->input('emergency_relationship_1'),
                'emergency_relationship_2' => $request->input('emergency_relationship_2'),
                'emergency_phone_1' => $request->input('emergency_phone_1'),
                'emergency_phone_2' => $request->input('emergency_phone_2'),

                'user' => Auth::user()->id
            ];
    
            $this->parentRepository->updateContact($contact);

            DB::commit();
    
            return redirect('contact');
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
