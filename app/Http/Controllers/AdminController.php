<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends MasterController
{
    protected $pageTitle = '';
    protected $headTitle = '';
    protected $activeApp = 'default';

    public function __construct() {

        // // if user must verify his email before login
        // if(config('auth.user_must_verify_email')) {
        //     $this->middleware(['verified']);
        // }

        // // if admin must approve user before login
        // if(config('auth.admin_must_approve_user')) {
        //     $this->middleware(['admin.approved']);
        // }

        // // if password can expire
        // if(config('auth.can_password_expire')) {
        //     $this->middleware(['password.expired']);
        // }

        // // if password can expire
        // //if(config('auth.can_password_expire')) {
        //     $this->middleware(['must.change.password']);
        //}




        // force user to change password.
        //if ((Auth::user()->password_changed_at == null)) {
            //return redirect()->route('password.expired.notice');
        //}

        $this->loadDefaultData();
    }

    protected function loadDefaultData(array $params=[]){
        //$this->headTitle = config('app.name');
        //$this->activeApp = config('constants.APPLICATIONS.TCOMMISSION.KEY');

        // calling the parent method to set the global variables
        parent::loadDefaultData($params);
    }
}
