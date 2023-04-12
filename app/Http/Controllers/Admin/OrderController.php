<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/13/16
 * Time: 11:55 AM
 */

namespace Kerung\Http\Controllers\Admin;


use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\OrderRequest;
use KerungRepo\Services\CartService;
use KerungRepo\Services\OrderService;
use KerungRepo\Services\CustomerService;
use KerungRepo\Services\CustomerGroupService;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\OrderStatusService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;
use KerungRepo\Services\ProductReturnService;
use KerungRepo\Services\StateService;
use KerungRepo\Services\CityService;
use KerungRepo\Services\AreaService;
use KerungRepo\Services\CountryService;
use KerungRepo\Services\OrderProductService;
use KerungRepo\Services\OrderHistoryService;
use Illuminate\Http\Request;


/**
 * Class OrderController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class OrderController extends Controller
{
    /**
     *
     * @var OrderService
     */
    protected $service;

    /**
     * Customer Group Service
     *
     * @var Cusotmer Group Service
     */
    protected $cgService;

    /**
     * Customer Service
     *
     * @var Cusotmer Service
     */
    protected $cService;

    /**
     * Product Service
     *
     * @var ProductService
     */
    protected $pService;

    /**
     * OrderStatus Service
     *
     * @var OrderService
     */
    protected $osService;

    /**
     *  Stote  Object
     *
     * @var object $storeService
     */
    protected $storeService;

    /**
     *  user  Object
     *
     * @var $userService
     */
    protected $userService;

    /**
     * @var CartService
     */
    protected $cartService;

     /* Product Return Service
     *
     * @var $returnService
     */
    protected $returnService;

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
     * Area Service
     *
     * @var areaService
     */
    protected $areaService;

    /**
     * Country Service
     *
     * @var countryService
     */
    protected $countryService;

     /**
     * OrderProduct Service
     *
     * @var orderProductService
     */
    protected $orderProductService;

    /**
     * OrderHistory Service
     *
     * @var orderHistoryService
     */
    protected $orderHistoryService;

    /**
     * OrderController constructor.
     * @param OrderStatusService $orderStatusService
     * @param ProductService $productService
     * @param OrderService $service
     * @param CustomerService $customerService
     * @param CustomerGroupService $customerGroupService
     * @param StoreService $storeService
     * @param UserService $userService
     * @param CartService $CartService
     * @param ProductReturnService $returnService
     * @param StateService $stateService
     * @param CityService $cityService
     * @param AreaService $areaService
     * @param CountryService $countryService
     * @param OrderProductService $orderProductService
     * @param OrderHistoryService $orderHistoryService
     */
    public function __construct(OrderStatusService $orderStatusService,                        ProductService $productService,
                                OrderService $service,
                                CustomerService $customerService,
                                CustomerGroupService $customerGroupService,
                                StoreService $storeService,
                                UserService $userService,
                                CartService $CartService,
                                ProductReturnService $returnService,
                                StateService $stateService,
                                CityService $cityService,
                                AreaService $areaService,
                                CountryService $countryService,
                                OrderProductService $orderProductService,
                                OrderHistoryService $orderHistoryService)
    {
        $this->service = $service;
        $this->cgService = $customerGroupService;
        $this->cService = $customerService;
        $this->pService = $productService;
        $this->osService = $orderStatusService;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->cartService = $CartService;
        $this->returnService = $returnService;
        $this->stateService = $stateService;
        $this->cityService = $cityService;
        $this->areaService = $areaService;
        $this->countryService = $countryService;
        $this->orderProductService = $orderProductService;
        $this->orderHistoryService = $orderHistoryService;
    }


    /**
     * Index View of Order
     *
     * @return mixed
     */
    public function index()
    {   
        $this->cartService->destroy();
        return view('admin.order.admin_table_order')->with($this->getOrderRelatedModelData());
    }

    /**
     * Get All Data Related To Orders
     *
     * @return array
     */
    public function getOrderRelatedModelData(){
        $user = $this->userService->getUser();
        return $data = array(
            'customers_group' => $this->cgService->getAll(),
            'customers' => $this->cService->getAll(),
            'orders' => $this->service->getAll(),
            'products' => $this->pService->getAll(),
            'orderstatus' => $this->osService->getAll(),
            'userOrders' => $this->service->getStoreWithOrderAccToUser($user),
            'stores' => $this->storeService->getStoreAccToUser($user),
            'states' => $this->stateService->getAll(),
            'cities' => $this->cityService->getAll(),
            'areas' => $this->areaService->getAll(),
            'countries' => $this->countryService->getAll()

        );


    }

    /**
     * Create Order
     *
     * @return mixed
     */
    public function create()
    {
        $cartItems = $this->cartService->getCartItems();
        $cartSubtotal = $this->cartService->getSubtotal();
        $cartTotal = $this->cartService->getTotal();
        return view('admin.order.admin_add_order')
                ->with($this->getOrderRelatedModelData())
                ->with('cartItems',$cartItems)
                ->with('cartSubtotal',$cartSubtotal)
                ->with('cartTotal',$cartTotal);
    }

    /**
     * Update Order
     *
     * @param OrderRequest $request
     * @return mixed
     */
    public function store(OrderRequest $request)
    {
        $data = $request->all();
        $data['total'] = $this->cartService->getTotal();
        $data['product'] = $this->cartService->getCartItems();
        $data['ip']=$request->ip();
        $data['user_agent']=$request->server('HTTP_USER_AGENT');
        if($this->service->store($data)){
            $this->cartService->destroy();
        }
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.order.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {   
        $this->cartService->destroy();
        $products = $this->orderProductService->getByOrderID($id);
        foreach ($products as $product) {
           $addcartItems = $this->cartService->addToCart($product);
        }
        $cartSubtotal = $this->cartService->getSubtotal();
        $cartTotal = $this->cartService->getTotal();
        $cartItems = $this->cartService->getCartItems();
        return view('admin.order.admin_edit_order')
                ->with($this->getOrderRelatedModelData())
                ->with('order',$this->service->getById($id))
                ->with('cartItems' , $cartItems)
                ->with('cartSubtotal',$cartSubtotal)
                ->with('cartTotal',$cartTotal);
    }


    /**
     * Show Form Data
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {   
        $this->cartService->destroy();
        $products = $this->orderProductService->getByOrderID($id);
        foreach ($products as $product) {
           $addcartItems = $this->cartService->addToCart($product);
        }
        $orderhistory = $this->orderHistoryService->getByOrderID($id);
        $order = $this->service->getById($id);
        $store = $this->service->getStoreName($id,$order);
        $cartSubtotal = $this->cartService->getSubtotal();
        $cartTotal = $this->cartService->getTotal();
        $cartItems = $this->cartService->getCartItems();
        return view('admin.order.admin_show_order')
                ->with($this->getOrderRelatedModelData())
                ->with('order',$order)
                ->with('cartItems' , $cartItems)
                ->with('cartSubtotal',$cartSubtotal)
                ->with('cartTotal',$cartTotal)
                ->with('store',$store)
                ->with('orderhistory',$orderhistory);
    }


    /**
     * Update Order Data
     *
     * @param OrderRequest $request
     * @param $id
     * @return mixed
     */
    public function update(OrderRequest $request, $id)
    {
        $data = $request->all();
        // $products = $this->orderProductService->getByOrderID($id);
        // dd($products);
        $data['total'] = $this->cartService->getTotal();
        $data['product'] = $this->cartService->getCartItems();
        // $data['products'] = $products;
        $data['ip']=$request->ip();
        $data['user_agent']=$request->server('HTTP_USER_AGENT');
        if($this->service->update($id, $data)){
            $this->cartService->destroy();
        }
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.order.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->returnService->hasChild('order_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

     /**
     * @param $id
     * @return mixed
     */
    public function printInvoice($id)
    {
        $products = $this->orderProductService->getByOrderID($id);
        foreach ($products as $product) {
           $addcartItems = $this->cartService->addToCart($product);
        }
        $order = $this->service->getById($id);
        $store = $this->service->getStoreName($id,$order);
        $cartSubtotal = $this->cartService->getSubtotal();
        $cartTotal = $this->cartService->getTotal();
        $cartItems = $this->cartService->getCartItems();
        return view('admin.order.admin_invoice_order')
                ->with($this->getOrderRelatedModelData())
                ->with('order',$order)
                ->with('cartItems' , $cartItems)
                ->with('cartSubtotal',$cartSubtotal)
                ->with('cartTotal',$cartTotal)
                ->with('store',$store);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function printShoppingList($id)
    {
        $products = $this->orderProductService->getByOrderID($id);
        foreach ($products as $product) {
           $addcartItems = $this->cartService->addToCart($product);
        }
        $order = $this->service->getById($id);
        $store = $this->service->getStoreName($id,$order);
        $cartSubtotal = $this->cartService->getSubtotal();
        $cartTotal = $this->cartService->getTotal();
        $cartItems = $this->cartService->getCartItems();
        return view('admin.order.admin_shoppinglist_order')
                ->with($this->getOrderRelatedModelData())
                ->with('order',$order)
                ->with('cartItems' , $cartItems)
                ->with('cartSubtotal',$cartSubtotal)
                ->with('cartTotal',$cartTotal)
                ->with('store',$store);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function orderAddHistory(Request $request)
    {
        $id=$request->order_id;
        $data=$request->all();
        $this->orderHistoryService->store($data);
        Notify::success('History Added Successfully.');
        return Redirect::route('admin.order.show',$id);

    }

    /**
     * @param $request
     * @return mixed
     */
    public function createInvoice(Request $request)
    {   
        $id= $request->orderId;
        $data =$request->all();
        $this->service->createInvoice($id, $data);
        return $this->service->getById($id);

    }

}
