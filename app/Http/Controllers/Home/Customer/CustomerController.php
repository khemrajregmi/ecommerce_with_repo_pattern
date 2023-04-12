<?php

/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/17/16
 * Time: 10:49 AM
 */


namespace Kerung\Http\Controllers\Home\Customer;

use Illuminate\Http\Request;

use Kerung\Http\Requests;
use Jleon\LaravelPnotify\Notify;
use Illuminate\Support\Facades\Redirect;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Login\SignUpRequest;
use Kerung\Http\Requests\Home\ImageRequest;
use Kerung\Http\Requests\Home\ProfileRequest;
use Kerung\Http\Requests\Home\PasswordRequest;
use Kerung\Http\Requests\Home\AddressRequest;
use Kerung\Http\Requests\Home\ProductSuggestionRequest;
use KerungRepo\Services\CustomerFamilyTypeService;
use KerungRepo\Services\CustomerProSugService;
use KerungRepo\Services\CustomerService;
use KerungRepo\Services\FamilyWishlistService;
use KerungRepo\Services\FamilyWishlistProductService;
use KerungRepo\Services\DurationService;
use KerungRepo\Services\SettingService;
use KerungRepo\Services\OrderService;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManager;
use Intervention\Image\Exception\NotReadableException;
use KerungRepo\Services\CountryService;
use KerungRepo\Services\StateService;
use KerungRepo\Services\CityService;
use KerungRepo\Services\AddressService;
use Image; 
use Auth;
use Session;
// use KerungRepo\Services\WalletService;
// use KerungRepo\Services\TransactionService;


/**
 * Class CustomerController
 *
 * @package Kerung\Http\Controllers\Home\Customer
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CustomerController extends Controller
{

    /**
     * @var CustomerService
     */
    protected $service;

    /**
     *  CustomerFamilyTypeService  Object
     *
     * @var $customerFamilyTypeService
     */
    protected $customerFamilyTypeService;

    /**
     *  DurationService  Object
     *
     * @var $DurationService
     */
    protected $durationService;

    /**
     *  FamilyWishlistService  Object
     *
     * @var $familyWishlistService
     */
    protected $familyWishlistService;

    /**
     *  FamilyWishlistProductService  Object
     *
     * @var $familyWishlistProductService
     */
    protected $familyWishlistProductService;

    /**
     *  CustomerProSugService  Object
     *
     * @var $customerProSugService
     */
    protected $customerProSugService;

    /**
     *  OrderService  Object
     *
     * @var $orderService
     */
    protected $orderService;

    /**
     * Setting service
     *
     * @var SettingService
     */
    protected $settingService;


    /**
     * Country Service
     *
     * @var countryService
     */
    protected $countryService;

    /**
     * State Service
     *
     * @var stateService
     */
    protected $stateService;


    /**
     * City Service
     *
     * @var cityService
     */
    protected $cityService;

    /**
     * Address Service
     *
     * @var addressService
     */
    protected $addressService;


    // protected $walletService;
    // protected $transcationService;


    /**
     * CustomerController constructor.
     *
     * @param CustomerService $service
     * @param CustomerFamilyTypeService $customerFamilyTypeService
     * @param DurationService $durationService
     * @param FamilyWishlistService $familyWishlistService
     * @param FamilyWishlistProductService $familyWishlistProductService
     * @param CustomerProSugService $customerProSugService
     * @param SettingService $settingService
     * @param OrderService $orderService
     * @param CountryService $countryService
     * @param StateService $stateService
     * @param CityService $cityService
     * @param AddressService $addressService
     */
    public function __construct(
                CustomerService $service,
                CustomerFamilyTypeService $customerFamilyTypeService,
                DurationService $durationService,
                FamilyWishlistService $familyWishlistService,
                FamilyWishlistProductService $familyWishlistProductService,
                CustomerProSugService $customerProSugService,
                OrderService $orderService,
                SettingService $settingService,

                CountryService $countryService,
                StateService $stateService,
                CityService $cityService,
                AddressService $addressService
                // ,
                // WalletService $walletService,
                // TransactionService $transcationService
            )
    {
        $this->service = $service;
        $this->customerFamilyTypeService = $customerFamilyTypeService;
        $this->durationService = $durationService;
        $this->familyWishlistService = $familyWishlistService;
        $this->familyWishlistProductService = $familyWishlistProductService;
        $this->customerProSugService = $customerProSugService;
        $this->orderService = $orderService;
        $this->settingService = $settingService;
        $this->stateService = $stateService;
        $this->cityService = $cityService;
        $this->countryService = $countryService;
        $this->addressService = $addressService;
        // $this->walletService = $walletService;
        // $this->transcationService = $transcationService;
    }

    public function getAddressRelatedModelData()
    {
        return $data = array(
            'states' => $this->stateService->getAll(),
            'cities' => $this->cityService->getAll(),
            'countries' => $this->countryService->getAll()
        );
    }


    /**
     * Get Customer Dashboard
     *
     * @return mixed
     */
    public function index()

    {
    
        return view('home.customer.myaccount');
    }


    /**
     * Get Sign Up Index
     *
     * @return mixed
     */
    public function getSignUpIndex()
    {
        $code ='config';
        $key = 'register';
        $settings = $this->settingService->getSettingByCode($code);
        $result = in_array($key,$settings['config_captcha_page']) ? 'true' : 'false';
        return view('home.signup')
                ->with('result',$result);
    }


    /**
     * Store Sign Up Data
     * @param SignUpRequest $request
     */
    public function postSignUp(Request $request)
    {
        // dd($request->all());
        $data=[
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'telephone' => $request->telephone ? $request->telephone : NULL,
            'fax' => $request->fax ? $request->fax : NULL,
            'password' => bcrypt($request['password']),
            'newsletter' => $request->newsletter,
            'ip' =>$request->ip(),
            'customer_group_id' => 1,
            'customer_family_type_id' => 1,
            ];
        // dd($data);
    	$this->service->storeSingUpCustomer($data);
        Notify::success('Register Successfully.');
       	return Redirect::route('signin');
    }


    /**
     * Get Customer Profile
     *
     * @return mixed
     */
    public function profile()
    {
        return view('home.customer.profile');
    }

    /**
     * Get Customer Address
     *
     * @return mixed
     */
    public function address()
    {
        return view('home.customer.address')
        ->with($this->getAddressRelatedModelData())
        ->with('addresses', $this->addressService->getAddressByCustomerID(Auth::user()->customer_id));
    }

    /**
     * Get Customer Orders
     *
     * @return mixed
     */
    public function orders($id)
    {
        $orders= $this->orderService->getOrderByCustomerID($id);
        // dd($orders);
        return view('home.customer.orders')
                ->with('orders',$orders);
    }

    
    /**
     *Update  Image
     * 
     * @param Request $request
     * @return mixed
     */
    public function postImage(ImageRequest $request)
    {
        $id=$request->customer_id;
        if ($request->file('image')->isValid()) {
            $destinationPath = public_path('uploads/customer_image/'); 
            $extension = Input::file('image')->getClientOriginalExtension();  
            $filename = rand(11111,99999).'.'.$extension;
            $image = $filename;
            // $image = Image::make($request->file('image'))->resize(300, 200);
            $request->file('image')->move($destinationPath, $image); 
            $data=['image'=>$image];
            $this->service->imageUpdate($id, $data);
            Session::flash('success', 'Your Image Successfully Updated'); 
            return Redirect::route('customer.profile'); 
        }
        else {
          Session::flash('error', 'uploaded file is not valid');
          return Redirect::to('customer.profile');
        }
    }

    /**
     * Update Customer Profile
     * 
     * @param ProfileRequest $request
     * @return mixed
     */
    public function updateCustomer(ProfileRequest $request)
    {   
        $id=$request->customer_id;
        $data=$request->all();
        empty($data['customer_group_id'])?$data['customer_group_id'] = 1:$data['customer_id'] = $data['customer_id'];
        $id = Auth::user()->customer_id;
        $this->service->updateCustomer($id, $data);
        return response()->json(['message'=>'success']);
    }

    /**
     * Change Password
     * 
     * @return view
     */
    public function changePassword()
    {   
        return view('home.customer.changepassword');
    }

     /**
     * Update Customer Password
     * 
     * @param PasswordRequest $request
     * @return mixed
     */
    public function updatePassword(PasswordRequest $request)
    {   
        $id=$request->customer_id;
        $data=$request->all();
        $this->service->updateCustomerPassword($id, $data);
        Session::flash('success', 'Your Password Updated successfully'); 
        return Redirect::route('customer.changepass');
    }


    /**
     * Enable Newsletter
     * 
     * @param Request $request
     * @return mixed
     */
    public function newsletter(Request $request)
    {
        $id=$request->customer_id;
        $data=[
            'newsletter' => 1
            ];
        $this->service->newletterSubsciption($id, $data);
        Session::flash('success', 'Newsletter Subscription successfull'); 
        return Redirect::route('customer.profile');
    }


    /**
     * @param customerId
     * @return mixed
     */
    public function familyWishlist($customerId)
    { 
        $wishlist = $this->service->getAll();
        $totalWishlist = count($wishlist);
        $id = $customerId;
        $customerFamilySize = $this->customerFamilyTypeService->getAll();
        $durations = $this->durationService->getAll();
        return view('home.customer.familysize')
            ->with('customerFamilySize' ,$customerFamilySize)
            ->with('durations' ,$durations);
    }

    /**
     * FamilyWishlistSize Update
     * @param Request $request
     * @return mixed
     */
    public function postFamilyWishlist(Request $request)
    { 
        $data = $request->all();
        $customerId =$request->customer_id;
        $this->familyWishlistService->checkOldWishlist($customerId, $data);
        Session::flash('success', 'You Family Size WishList is Updated'); 
        return Redirect::route('customer.dashboard');
    }

    /**
     * Family Wishlsit View
     * @param customerId
     * @return mixed
     */
    public function showFamilyWishlist($customerId)
    {
        $products = $this->familyWishlistService->getFamilySizeId($customerId);
        if($products==null)
        {
            Session::flash('error', 'Please !! First of All Select Your Family Size   !! THANK YOU !!'); 
            return Redirect::route('customer.familysizewishlist','$customerId');
        }
        return view('home.customer.familywishlist')
            ->with('products' , $products);
    }

     /**
     * Update Family Wishlist 
     * @param customerId
     * @return mixed
     */
    public function updateFamilyWishlist(Request $request)
    {
        $counter = 1;
        foreach ($request->product as $p) {
            $data = $request->product[$counter];
            $id = $request->product[$counter]['familywish_product_id'];
            $this->familyWishlistProductService->update($id, $data);
            $counter++;
        }
        Session::flash('success', 'You Family Size WishList Quantity is Updated..'); 
        return Redirect::route('customer.familywishlist',Auth::user()->customer_id);
    }

    /**
     * Remove Family Wishlist
     * @param customerId
     * @return mixed
     */
    public function removeFamilyWishList(Request $request)
    {
        $id = $request->id;
        return $this->familyWishlistProductService->destroy($id);
    }

    /**
     * Customer Product Suggestion View Show
     * @return mixed
     */
    public function addSuggestion()
    {
        return view('home.customer.productsuggestion');
    }


     /**
     * Customer Product Suggestion Store
     * @param ProductSuggestionRequest $request
     * @return mixed
     */
    public function storeSuggestion(ProductSuggestionRequest $request)
    {
        $data=$request->all();
        $this->customerProSugService->store($data);
        Session::flash('success', 'Thanks For Your Suggestion...'); 
        return Redirect::route('customer.dashboard');
    }


    /**
     * Customer's Address Add
     * @param Request $request
     * @return mixed
     */
    public function addAddress(AddressRequest $request)
    {
        $data= $request->all();
        // $data['customer_id']=
        // dd($data);
        $this->addressService->store($data);
        Session::flash('success', 'Address Added Successfully'); 
        return Redirect::route('customer.address');
    }


}
