<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Kerung\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Requests\Admin\CustomerFamilySizeRequest;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\CustomerFamilyTypeService;
use KerungRepo\Services\CustomerService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

class CustomerFamilySizeController extends Controller
{
    /**
     * @var CustomerFamilyTypeService
     */
    protected $service;

    /**
     * @var CustomerService
     */
    protected $customerService;

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
     * CustomerController constructor.
     * @param CustomerFamilyTypeService $service
     * @param CustomerService $customerService
     * @param StoreService $storeService
     * @param UserService $userService
     */
    public function __construct(CustomerFamilyTypeService $service,
                                UserService $userService,
                                StoreService $storeService,
                                CustomerService $customerService)
    {
        $this->service = $service;
        $this->customerService = $customerService;
        $this->storeService = $storeService;
        $this->userService = $userService;
    }

    /**
     * Get All Data Related To CustomerFamilyType
     *
     * @return array
     */
    public function getCustomerFamilyTypeRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userCustomerFamilySize' => $this->service->getStoreWithCustomerFamilyTypeAccToUser($user),
            'stores' => $this->storeService->getStoreAccToUser($user)
        );
    }


    /**
     * Create CustomerFamilyType
     * @return mixed
     */
    public function create(){
        return view('admin.customerfamilysize.admin_add_customerfamilytype')
                ->with($this->getCustomerFamilyTypeRelatedModelData());
    }




  
    /**
     * List CustomerFamilyType index
     *
     * @return View
     */

    public function index()
    {  
        return view('admin.customerfamilysize.admin_table_customerfamilytype')
                ->with($this->getCustomerFamilyTypeRelatedModelData());
    }


    /**
     * Edit CustomerFamilyType
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.customerfamilysize.admin_edit_customerfamilytype',
            ['customerFamilySize' => $this->service->getById($id)])
            ->with($this->getCustomerFamilyTypeRelatedModelData());
    }

    /**
     *
     * @param CustomerFamilySizeRequest $request
     */
    public function store(CustomerFamilySizeRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
       return Redirect::route('admin.customerfamilysize.index');
    }

    /**
     * Update CustomerFamilyType Data
     *
     * @param CustomerFamilySizeRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CustomerFamilySizeRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.customerfamilysize.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->customerService->hasChild('customer_family_type_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

    
}
