<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPagesController extends Controller
{
    public function trainingProgramme(){
        return view('website-pages.training-programme');
    }

    public function programmeDetails(){
        return view('website-pages.programme-details');
    }

    public function traineesLogin(){
        return view('website-pages.trainees-login');
    }

    public function traineesRegistration(){
        return view('website-pages.trainees-registration');
    }
}
