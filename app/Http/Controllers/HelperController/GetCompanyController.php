<?php

namespace App\Http\Controllers\HelperController;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class GetCompanyController extends Controller
{
    public function get_company(){
        $companies = Company::all();
        return $companies;
    }
}
