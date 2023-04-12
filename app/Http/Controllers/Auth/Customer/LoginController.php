<?php
/**
 * Created by Sublime.
 * User: khem
 * Date: 9/21/16
 * Time: 8:54 AM
 */

namespace Kerung\Http\Controllers\Auth\Customer;

use Illuminate\Http\Request;

use Socialite;  

use Kerung\Models\Customer;
use Kerung\Http\Requests;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Login\SignInRequest;
use KerungRepo\Services\CustomerService;
use Suvalav\Http\Requests\Home\Checkout\SignIn;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use Auth;
use Redirect;


/**
 * Class LoginController
 * @package Kerung\Http\Controllers\Customer\Auth
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use  ThrottlesLogins;

    /**
     * @var customerService
     */
    protected $customerService;

    /**
     * LoginController constructor.
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }


    protected $redirectPath = 'customer/dashboard';

    protected $loginPath = 'signin';
   
    protected $redirectTo = '/';
    
    protected $redirectAfterLogout = '/';

    /**
     * Get Sign In Index
     *
     * @return mixed
     */
    public function getSignInIndex()
    {
        return view('home.signin');
    }


    /**
     * Post SignIn
     *
     * @param SignInRequest $signInRequest
     * @return mixed
     */
    public function postSignIn(Request $signInRequest)
    {  
        $credentials = $signInRequest->only('email', 'password');
        $response = $this->customerService->authenticate($credentials);
        if ($response === TRUE) {
            Session::flash('success', 'You have been successfully logged In !!');
            return Redirect::route('customer.dashboard');
        } else {
           return redirect()->back()->withInput()->withErrors($response);
        }
    }


    /**
     * Get logout
     *
     * @return mixed
     */
    public function getLogout()
    {
        Auth::logout();
        Notify::success('Successfully Logout...');
        return Redirect::route('product.list'); 
    }


    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        // dd($provider);
        \Session::flash('url',\Request::server('HTTP_REFERER'));
        switch($provider){
            case "facebook":
                return Socialite::driver('facebook')->redirect();
            case "twitter":
        // dd($provider);
                return Socialite::driver('twitter')->redirect();
            case "google":
                return Socialite::driver('google')->redirect();
            case "linkedin":
                return Socialite::driver('linkedin')->redirect();
            default:
                abort(404);
        }

    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        // dd($provider);
       switch($provider){
            case "facebook":
                try {
                    $customer = Socialite::driver('facebook')->user();
                    // dd($customer);
                }catch (\Exception $e){
                    return redirect()->back()->withError("Error!! Failed to Login.");
                }
                return $this->authenticateFacebookCustomer($customer);
            case "twitter":
                try{
                $customer = Socialite::driver('twitter')->user();
                }catch (\Exception $e){
                    return redirect()->back()->withError("Error!! Failed to Login.");
                }
                return $this->authenticateTwitterCustomer($customer);
            case "google":
                try{
                $customer = Socialite::driver('google')->user();
                }catch (\Exception $e){
                    return redirect()->back()->withError("Error!! Failed to Login.");
                }
                return $this->authenticateGoogleCustomer($customer);
            case "linkedin":
                try{
                $customer = Socialite::driver('linkedin')->user();
                }catch (\Exception $e){
                    return redirect()->back()->withError("Error!! Failed to Login.");
                }
                return $this->authenticateLinkedinCustomer($customer);
            default:
                return abort(404);
        }

    }


    private function authenticateFacebookCustomer($fbuser)
    {
        if ($fbuser->email == null){
            $fbuser->email = $fbuser->id."@facebook.com";
        }
        return $this->logMeIn($fbuser->name,$fbuser->email, $fbuser->avatar);
    }


    private function authenticateTwitterCustomer($twuser) {
        if ($twuser->email == null){
            $twuser->email = $twuser->id."@twitter.com";
        }
        return $this->logMeIn($twuser->name,$twuser->email, $twuser->avatar);
    }
    private function authenticateGoogleCustomer($googleuser) {
        return $this->logMeIn($googleuser->name,$googleuser->email, $googleuser->avatar);
    }

    private function authenticateLinkedinCustomer($linkedinuser) {
        if( $linkedinuser->avatar == null ) {
            $linkedinuser->avatar = "";
        }
        return $this->logMeIn($linkedinuser->name,$linkedinuser->email, $linkedinuser->avatar);
    }


    private function logMeIn($name,$email, $avatar) {
        $customer = Customer::where('email',$email)->first();
        $splitName = explode(' ', $name, 2); 
        $data=[
            'firstname' => $splitName[0],
            'lastname' => $splitName[1],
            'image' => $avatar,
            'email' => $email,
            'customer_group_id' => 1,
            'customer_family_type_id' => 1,
            'safe' => 1,
            'status' => 1,
            'approved' => 1
            ];
        if( !$customer ) {
            $customer = $this->customerService->store($data);
        }
        Auth::login($customer);
        return \Redirect::to('customer/dashboard');
    }

    /**
     * Checkout  SignIn
     *
     * @param SignInRequest $request
     * @return mixed
     */
    public function checkoutSignIn(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $response = $this->customerService->authenticate($credentials);
         if ($response === TRUE) {
            return "true";
        } else {
            // return response()->json(['error'=>json(['modalErr' => 'Customer Fistname'])]);
           // return response()->json(array(array('error'=>'Invalid Credentials')));
           return response()->json(['errorMss' => 'Invalid ']);
        }
    }

}
