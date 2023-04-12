<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/21/16
 * Time: 8:54 AM
 */

namespace Kerung\Http\Controllers\Auth;


use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Login\LoginRequest;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;
use Session;

/**
 * Class LoginController
 * @package Kerung\Http\Controllers\Auth
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class LoginController extends Controller
{

    /**
     * @var UserService
     */
    protected $userService;


    /**
     * @var StoreService
     */
    protected $storeService;

    /**
     * LoginController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService,StoreService $storeService)
    {
        $this->userService = $userService;
        $this->storeService = $storeService;
    }

    /**
     * Get Login Index
     *
     * @return mixed
     */
    public function getLoginIndex()
    {
        return view('login.login_index');
    }

    /**
     * @param LoginRequest $loginRequest
     */
    public function postLogin(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->only('email', 'password');
        $response = $this->userService->authenticate($credentials);
        if ($response === true) {
           return redirect()->route('admin.dashboard.index');
        } else {
           return redirect()->back()->withInput()->withErrors($response);
        }
    }



    public function getLogout()
    {
        if($this->userService->getLogout()){
            return redirect()->route('login');
        }
    }
}