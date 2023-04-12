<?php

/**
 * Created by sublime.
 * User: khem
 * Date: 9/07/16
 * Time: 11:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\CustomerRequest;
use Kerung\Http\Requests\Admin\CustomerUpdateRequest;
use KerungRepo\Services\CustomerService;
use KerungRepo\Services\CustomerGroupService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\ReviewService;
use KerungRepo\Services\CustomerFamilyTypeService;
use KerungRepo\Services\UserService;

/**
 * Class CustomerController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    protected $service;

    /**
     * @var CustomerGroupService
     */
    protected $cgService;

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
     *  Review  Object
     *
     * @var $reviewService
     */
    protected $reviewService;

    /**
     *  CustomerFamilyTypeService  Object
     *
     * @var $customerFamilyTypeService
     */
    protected $customerFamilyTypeService;

    /**
     * CustomerController constructor.
     * @param CustomerService $service
     * @param CustomerGroupService $cgService
     * @param StoreService $storeService
     * @param UserService $userService
     * @param ReviewService $reviewService
     * @param CustomerFamilyTypeService $customerFamilyTypeService
     */
    public function __construct(CustomerService $service,
                                CustomerGroupService $cgService,
                                StoreService $storeService,
                                UserService $userService,
                                ReviewService $reviewService,
                                CustomerFamilyTypeService $customerFamilyTypeService)
    {
        $this->service = $service;
        $this->cgService = $cgService;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->reviewService = $reviewService;
        $this->customerFamilyTypeService = $customerFamilyTypeService;
    }

    /**
     * Get All Data Related To Customer
     *
     * @return array
     */
    public function getCustomerRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userCustomers' => $this->service->getStoreWithCustomerAccToUser($user),
            'customer_group' => $this->cgService->getAll(),
            'customers' => $this->service->getAll(),
            'stores' => $this->storeService->getStoreAccToUser($user)
        );
    }


    /**
     * Create Customer
     * @return mixed
     */
    public function create(){
        return view('admin.customer.admin_add_customer')
                ->with($this->getCustomerRelatedModelData());
    }




  
    /**
     * List Customer index
     *
     * @return View
     */

    public function index()
    {  
        return view('admin.customer.admin_table_customer')
                ->with($this->getCustomerRelatedModelData());
    }


    /**
     * Edit Customer
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.customer.admin_edit_customer',
            ['customer' => $this->service->getById($id)])
            ->with($this->getCustomerRelatedModelData());
    }

    /**
     *
     * @param CustomerRequest $request
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
       return Redirect::route('admin.customer.index');
    }

    /**
     * Update Customer Data
     *
     * @param CustomerUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.customer.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->reviewService->hasChild('customer_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

    
}
