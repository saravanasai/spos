<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{




    public function changePasswordIndex()
    {
        Gate::authorize('can-access');
        return view('Setting.changePassword');
    }


    public function employeeManagementIndex()
    {
        Gate::authorize('can-access');
        return view('Setting.employeeManagement');
    }

    public function branchManagementIndex()
    {
        Gate::authorize('can-access');
        return view('Setting.branchManagment');
    }
}
