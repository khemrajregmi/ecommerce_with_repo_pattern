<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/17/16
 * Time: 10:49 AM
 */

namespace Kerung\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\OrderService;
use KerungRepo\Services\CartService;
use Kerung\Http\Requests\Home\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use KerungRepo\Services\AddressService;
use KerungRepo\Services\CountryService;
use KerungRepo\Services\StateService;
use KerungRepo\Services\CityService;
use Session; 
use Auth;

/**
 * Class HomeController
 *
 * @package Kerung\Http\Controllers\Home
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CartController extends Controller
{
    /**
     * Product Service
     *
     * @var ProductService
     */
    protected $service;

    /**
     * Order Service
     *
     * @var OrderService
     */
    protected $oService;

    /**
     * Cart Service
     *
     * @var CartService
     */
    protected $cService;

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

    public function __construct(ProductService $service,
                                OrderService $orderService,
                                CartService $cartService,
                                AddressService $addressService,
                                CountryService $countryService,
                                StateService $stateService,
                                CityService $cityService)
    {
        $this->service = $service;
        $this->oService = $orderService;
        $this->cService = $cartService;
        $this->addressService = $addressService;
        $this->stateService = $stateService;
        $this->cityService = $cityService;
        $this->countryService = $countryService;
    }

    /**
     *Get Cart Page
     *
     * @return mixed
     */
    public function getCart()
    {
        return view('home.cart', [Cart::content()],[Cart::count()]);

    }

    /**
     * Add to Cart
     *
     * @param Request $request
     * @return mixed
     */
    public function addToCart(Request $request)
    {   
        $id = $request->id;
        $product = $this->service->getProductsWithDiscount($id);
        // dd($product);
        $result = $this->cService->addToCartFormFrontend($product);
        
        return response()->json($result);
    }

    /**
     * Order Checkout
     *
     * @param CheckoutRequest $request
     * @return mixed
     */
    public function orderCheckout(Request $request)
    {   
        $data=$request->all();
        
        $data['total'] = $this->cService->getTotal();
        $data['product'] = $this->cService->getCartItems();
        $data['ip']=$request->ip();
        $data['user_agent']=$request->server('HTTP_USER_AGENT');
        $this->oService->frontendCheckout($data);
        // $email = $request->email;
        // $title = "Purchase from Suvalav";
        // $content = "Thanks is creating your order";
        // $rows =Cart::content();
        // Mail::send('emails.send', ['title' => $title,'content' => $content,'rows'=>$rows],function ($message) use($email)
        // {

        //     $message->from('khem.r.regmi@gmail.com', 'khem Raj Regmi');
        //     $message->to($email);

        // });
        Cart::destroy();
        \Session::flash('flash_message', 'Your Order Created Sucessfully...'); 
        return Redirect::route('product.list'); 
        

    }

    /**
     * Cancel Order
     *
     * @param $id - Cart id
     * @return mixed
     */
    public function orderCancel($id)
    {
        Cart::remove($id);
        if (Cart::total() == 0) {
            \Session::flash('flash_message','Successfully remove from your Cart !!!!');
            return Redirect::route('product.list');
        }
        \Session::flash('flash_message', 'Successfully Update  your Shopping Cart !!!!'); 
        return Redirect::route('cart');

    }

    /**
     * Update Order
     *
     * @param Request $request
     * @return mixed
     */
    public function orderUpdate(Request $request)
    {
        foreach ($request->rowId as $row) {
            $options['image'] = $row['image'];
            Cart::update($row['rowId'], ['qty' => $row['qty'],'options' => $options]);
        }
        \Session::flash('flash_message', 'Your Order Cancelled Successfully...'); 
        return Redirect::route('cart');

    }

    /**
     *Get Checkout
     * @return mixed
     */
    public function getCheckOut()
    {
        if((Cart::total()==0.00))
        {
            \Session::flash('flash_message', 'Please Put Some Item in Your Cart !!!'); 
            return Redirect::route('product.list'); 
        }
        else
        {
            if(Auth::check())
            {   
                $id = Auth::user()->customer_id;
                $addresses = $this->addressService->getAddressByCustomerID($id);
                $countries = $this->countryService->getAll();
                return view('home.checkout', [Cart::content()])
                ->with('addresses',$addresses)
                ->with('countries',$countries);
            }
            else
            {   
                $countries = $this->countryService->getAll();
                return view('home.checkout', [Cart::content()])
                ->with('countries',$countries);
            }
        }
    }

}
