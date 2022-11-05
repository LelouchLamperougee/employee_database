<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $companies = Company::all();

        return $companies;
    }
}
