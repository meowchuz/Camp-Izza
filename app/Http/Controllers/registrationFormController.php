<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class registrationFormController extends Controller
{
    /**
     * Show the application registrationForm Page-1.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrationForm1()
    {
        return view('Pages.RegistrationForm.regForm1');
    }

    public function handleRegistrationForm1() {
        return redirect('/registrationForm2');
    }

    /**
     * Show the application registrationForm Page-2.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrationForm2()
    {
        return view('Pages.RegistrationForm.regForm2');
    }

    public function handleRegistrationForm2() {
        return redirect('/registrationForm3');
    }

        /**
     * Show the application registrationForm Page-3.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrationForm3()
    {
        return view('Pages.RegistrationForm.regForm3');
    }

    public function handleRegistrationForm3() {
        return redirect('/registrationFormReview');
    }

        /**
     * Show the application registrationForm Page-Review.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrationFormReview()
    {
        return view('Pages.RegistrationForm.regForm-Review');
    }
}