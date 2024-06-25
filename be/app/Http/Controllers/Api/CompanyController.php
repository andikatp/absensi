<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // get company
    public function show()
    {
        $company = Company::find(1);
        return response(['company' => $company], 200);
    }
}
