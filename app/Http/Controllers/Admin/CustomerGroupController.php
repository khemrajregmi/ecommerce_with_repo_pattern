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
use Kerung\Http\Requests\Admin\CustomerGroupRequest;
use KerungRepo\Services\CustomerGroupService;
use KerungRepo\Services\CustomerService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

/**
 * Class CustomerGroupController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class CustomerGroupController extends Controller
{
    /**
     * Service Object
     * Service Object
     *
     * @var object $service
     */
    protected $service;

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
     *  Customer  Object
     *
     * @var $customerService
     */
    protected $customerService;

    /**
     * CustomerGroup constructor.
     * @param CustomerGroupService $service
     * @param StoreService $storeService
     * @param UserService $userService
     * @param CustomerService $customerService
     */
    public function __construct(CustomerGroupService $service,
                                StoreService $storeService,
                                UserService $userService,
                                CustomerService $customerService)
    {
        $this->service = $service;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->customerService = $customerService;
    }

    /**
     * Get All Data Related To CustomerGroup
     *
     * @return array
     */
    public function getCustomerGroupRelatedModelData()
    {   

        $user = $this->userService->getUser();
        return $data = array(
            'userCustomerGroups' => $this->service->getStoreWithCustomerGroupAccToUser($user),
            'customergroups' => $this->service->getAll(),
            'stores' => $this->storeService->getStoreAccToUser($user)
        );
    }


    /**
     * CustomerGroup Create
     * 
     *@return View
     */
    public function create()
    {
        return view('admin.customergroup.admin_add_customergroup')
        ->with($this->getCustomerGroupRelatedModelData());
    }




  
    /**
     * List CustomerGroup index
     *
     * @return View
     */

    public function index()
    {  
        return view('admin.customergroup.admin_table_customergroup')
        ->with($this->getCustomerGroupRelatedModelData());
    }


    /**

     * 
     * @param  $id
     *
     * @param Request $request
     */

    public function edit($id)
    {
        return view('admin.customergroup.admin_edit_customergroup',
            ['customer_group' => $this->service->getById($id)])
            ->with($this->getCustomerGroupRelatedModelData());

    }

    /**
     *
     * @param CustomerGroupRequest $request
     */
    public function store(CustomerGroupRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
       return Redirect::route('admin.customergroup.index');
    }

    /**
     * Update CustomerGroup Data
     *
     * @param CustomerGroupRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CustomerGroupRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.customergroup.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->customerService->hasChild('customer_group_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
