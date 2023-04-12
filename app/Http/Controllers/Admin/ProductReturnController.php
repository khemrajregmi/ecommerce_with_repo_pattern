<?php


/**
 * Created by sublime.
 * User: khem
 * Date: 9/02/16
 * Time: 3:00 PM
 */
namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\ProductReturnRequest;
use KerungRepo\Services\ProductReturnService;
use KerungRepo\Services\ProductReturnActionService;
use KerungRepo\Services\ProductReturnReasonService;
use KerungRepo\Services\ProductReturnStatusService;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;
use KerungRepo\Services\CustomerService;


/**
 * Class ProductReturnController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class ProductReturnController extends Controller
{
    /**
     * Service Object
     * 
     *
     * @var object $service
     */
    protected $service;

    /**
     *  ProductReturnReason  Object
     *
     * @var object $rService
     */
    protected $rService;

    /**
     *  ProductReturnAction  Object
     *
     * @var object $aService
     */
    protected $aService;

    /**
     *  ProductReturnStatus Object
     *
     * @var object $sService
     */
    protected $sService;

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
     * Product Service
     *
     * @var pService
     */
    protected $pService;

    /**
     * Customer Service
     *
     * @var $cService
     */
    protected $cService;


    /**
     * ProductReturnController constructor.
     * @param ProductReturnService $service
     * @param ProductReturnActionService $aService
     * @param ProductReturnReasonService $rService
     * @param ProductReturnStatusService $sService
     * @param StoreService $storeService
     * @param ProductService $productService
     * @param UserService $userService
     * @param CustomerService $customerService
     */
        public function __construct(ProductReturnService $service,
                                ProductReturnActionService $aService,
                                ProductReturnReasonService $rService,
                                ProductReturnStatusService $sService,
                                StoreService $storeService,
                                UserService $userService,
                                ProductService $productService,
                                CustomerService $customerService)
    {
        $this->service = $service;
        $this->rService = $rService;
        $this->aService = $aService;
        $this->sService = $sService;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->pService = $productService;
        $this->cService = $customerService;
    }


    /**
     * Get All Data Related To Return
     *
     * @return array
     */
    public function getReturnRelatedModelData()
    {
        $user = $this->userService->getUser();
        $stores = $this->storeService->getStoreAccToUser($user);
        return $data = 
        array(
            'userReturns' => $this->service->getStoreWithReturnAccToUser($user),
            'stores' => $stores,
            'returnreason' => $this->rService->getAll(),
            'returnstatus' =>$this->sService->getAll(),
            'productreturns' => $this->service->getAll(),
            'returnaction' => $this->aService->getAll(),
            'products' => $this->pService->getProductAccToStore($stores),
            'customers' => $this->cService->getAll()

        );
    }


    /**
     * Add Return Create
     *
     * @return View
     */
    public function create()
    {
        return view('admin.return.admin_add_return')
        ->with($this->getReturnRelatedModelData());
    }


    /**
     * List Return index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.return.admin_table_return')->with($this->getReturnRelatedModelData());
    }


    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.return.admin_edit_return')
        ->with('productreturn', $this->service->getById($id))
        ->with($this->getReturnRelatedModelData());
    }

    /**
     *
     * @param ProductReturnRequest $request
     */
    public function store(ProductReturnRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.return.index');

    }

    /**
     * Update return Data
     *
     * @param ProductReturnRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ProductReturnRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
         Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.return.index');
    }

    /**
     *Update return Data
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return 'deleted';
    }
}
