<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MasterController extends Controller
{
    protected $pageTitle = '';
    protected $headTitle = '';
    protected $activeApp = '';

    public function __construct() {}

    /**
     * Function to load common data which will be available
     * to all views.
    */
    protected function loadDefaultData(array $params=[])
    {
        // setting predefined global variables
        View()->share( 'pageTitle', $this->pageTitle );
        View()->share( 'headTitle', $this->headTitle );
        View()->share( 'activeApp', $this->activeApp );

        // setting global variables requested from child controllers
        if($params) {
            foreach ($params as $key => $param){
                View()->share( $key, $param);
            }
        }
    }

    protected function getMonthList() {
        return [
            1 => trans('Jan'),
            2 => trans('Feb'),
            3 => trans('Mar'),
            4 => trans('Apr'),
            5 => trans('May'),
            6 => trans('Jun'),
            7 => trans('Jul'),
            8 => trans('Aug'),
            9 => trans('Sep'),
            10 => trans('Oct'),
            11 => trans('Nov'),
            12 => trans('Dec'),
        ];
    }

    

    

    /**
     * Add the fetch api body content as parameters
     * to the current ajax request.
     */
   
}
