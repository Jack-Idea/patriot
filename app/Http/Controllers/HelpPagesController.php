<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpPagesController extends Controller
{
    // Policy PAGE
    public function policyPage() {
        return view('helppages.policy');
    }
    // Agreement PAGE
    public function agreementPage() {
        return view('helppages.agreement');
    }
}
