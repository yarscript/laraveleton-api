<?php


namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers\Dashboard
 */
class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('welcome');
    }
}
