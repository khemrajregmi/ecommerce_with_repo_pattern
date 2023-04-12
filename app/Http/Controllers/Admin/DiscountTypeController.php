<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\DiscountTypeRequest;
use KerungRepo\Services\DiscountTypeService;
use KerungRepo\Services\DiscountService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

class DiscountTypeController extends Controller
{
     /**
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
     *  Discount  Object
     *
     * @var $discountService
     */
    protected $discountService;

    /**

     * Discount Type constructor.
     * @param DiscountTypeService $service
     */
    public function __construct(DiscountTypeService $service,
                                StoreService $storeService,
                                UserService $userService,
                                DiscountService $discountService)
    {
        $this->service = $service;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->discountService = $discountService;
    }


    /**
     * Get All Data Related To DiscountType
     *
     * @return array
     */
    public function getDiscountTypeRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userDiscountTypes' => $this->service->getStoreWithDiscountTypeAccToUser($user),
            'stores' => $this->storeService->getStoreAccToUser($user),
        );
    }

    /**
     * Discount Create
     * 
     *@return View
     */
    public function create(){
        return view('admin.distype.admin_add_discountType')
               ->with($this->getDiscountTypeRelatedModelData());
    }




  
    /**
     * List Discount Type index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.distype.admin_table_discountType')
               ->with($this->getDiscountTypeRelatedModelData());
    }


    /**

     * 
     * @param  $id
     *
     * @param Request $request
     */

    public function edit($id)
    {
        return view('admin.distype.admin_edit_discountType',
            ['discount' => $this->service->getById($id)])
            ->with($this->getDiscountTypeRelatedModelData());
    }

    /**
     *
     * @param DiscountTypeRequest $request
     */
    public function store(DiscountTypeRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
       return Redirect::route('admin.discounttype.index');
    }

    /**
     * Update Discount Type Data
     *
     * @param DiscountTypeRequest $request
     * @param $id
     * @return mixed
     */
    public function update(DiscountTypeRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.discounttype.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->discountService->hasChild('discount_type_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
