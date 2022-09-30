<?php


namespace App\Http\Controllers\Dashboard\User\Auth;


use App\Http\Controllers\Controller;

/**
 * Class LoginController
 * @package App\Http\Controllers\Dashboard\Auth
 */
class LoginController extends Controller
{
    /**
     * @var array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string
     */
    protected $_config;

    public function __construct()
    {
        $this->_config = request('_config');

    }

    public function index()
    {

    }

    /**
     *
     */
    public function login()
    {

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view($this->_config['view']);
    }

    /**
     *
     */
    public function create()
    {

    }

    public function destroy()
    {

    }
}
