<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function changePasswordIndex()
    {

        return view('Setting.changePassword');

    }

}
