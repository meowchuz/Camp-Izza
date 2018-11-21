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

    public function handleRegistrationFormTEST(Request $request) {
        $camperInfo = (object) [
            'camperName' => $request->input('camperName'),
            'camperSchool' => $request->input('camperSchool'),
            'camperGender' => $request->input('camperGender'),
            'camperGrade' => $request->input('camperGrade'),
            'camperDOB' => $request->input('camperDOB'),
            'camperShirtSize' => $request->input('camperShirtSize'),
            'camperNumShirt' => $request->input('numShirt')
        ];

        print_r ("Name: " . $camperInfo->camperName);
        echo '<br/>';
        print_r ("CurrentSchool: " . $camperInfo->camperSchool);
        echo '<br/>';
        print_r ("Gender: " . $camperInfo->camperGender);
        echo '<br/>';
        print_r ("GradeSchool: " . $camperInfo->camperGrade);
        echo '<br/>';
        print_r ("DOB: " . $camperInfo->camperDOB);
        echo '<br/>';
        print_r ("Shirt Size: " . $camperInfo->camperShirtSize);
        echo '<br/>';
        print_r ("Number of Shirt buy: " . $camperInfo->camperNumShirt);
 
    }

    /**
     * Show the application registrationForm Page-2.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrationForm2()
    {
        return view('pages.RegistrationForm.regForm2');
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
    
    public function handleRegistrationFormReview() {
        return redirect('/registrationFormReview');
    }


}