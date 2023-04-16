<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class localController extends Controller
{
    public function local($local)
    {
           app()->setLocale($local);
            Session::put('locale', $local);
            return redirect()->back();
    }
}
