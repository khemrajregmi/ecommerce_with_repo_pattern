<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\DiscountRequest;
use KerungRepo\Services\DiscountService;
use KerungRepo\Services\DiscountTypeService;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\CategoryService;
use KerungRepo\Services\DiscountAttributeService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

class DiscountController extends Controller
{
     /**
     * Service Object
     *
     * @var object $service
     */
    protected $service;


    /**
     *  Discount Type Service Object
     *
     * @var object $dtService
     */
    protected $dtService;

    /**

    /**
     *  Product Service Object
     *
     * @var object $pService
     */
    protected $pService;


    /**
     *  Category Service Object
     *
     * @var object $cService
     */
    protected $cService;

    /**
     *  Discount Attribute Object
     *
     * @var object $disAttrService
     */
    protected $disAttrService;

    /**
     *  Store  Object
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

     * Discount constructor.
     * @param DiscountService $service
     * @param ProductService $productService
     * @param CategoryService $categoryService
     * @param DiscountTypeService $discountService
     * @param StoreService $storeService
     * @param DiscountAttributeService $discountAttributeService
     * @param UserService $userService
     */
    public function __construct(DiscountService $service,
                        DiscountTypeService $discountService,
                        ProductService $productService,
                        CategoryService $categoryService,
                        DiscountAttributeService $discountAttributeService,
                        StoreService $storeService,
                        UserService $userService)
    {
        $this->service = $service;
        $this->dtService = $discountService;
        $this->pService = $productService;
        $this->cService = $categoryService;
        $this->storeService = $storeService;
        $this->disAttrService = $discountAttributeService;
        $this->userService = $userService;
    }


    /**
     * Get All Data Related To Discount
     *
     * @return array
     */
    public function getDiscountRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userDiscounts' => $this->service->getStoreWithDiscountAccToUser($user),
            'discount_type' => $this->dtService->getAll(),
            'products' => $this->pService->getAll(),
            'categories' => $this->cService->getAll(),
            'discounts' => $this->service->getAll(),
            'stores' => $this->storeService->getStoreAccToUser($user),
        );


    }

    /**
     * Create Discount
     *
     * @return mixed
     */
    public function create(){
        return view('admin.discount.admin_add_discount')->with($this->getDiscountRelatedModelData());
    }


    /**
     * Get Index
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.discount.admin_table_discount')
        ->with($this->getDiscountRelatedModelData());
    }


    /**
     * Edit Discount
     * 
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {   
        return view('admin.discount.admin_edit_discount')
                    ->with($this->getDiscountRelatedModelData())
                    ->with(array(
                        'discount' => $this->service->getById($id),
                        'discount_attribute' => $this->service->getDiscountAttributes($id)
                    ));
    }

    /**
     *
     * @param DiscountRequest $request
     */
    public function store(DiscountRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.discount.index');
    }

    /**
     * Update Discount Data
     *
     * @param DiscountRequest $request
     * @param $id
     * @return mixed
     */
    public function update(DiscountRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.discount.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return 'deleted';
    }


     /**
     * Get Product By CategoryID
     *
     * @param $id
     * @return mixed
     */
    public function getAllProductByCategoryId($id)
    {
        $product_list = $this->service->getAllProductByCategoryId($id);
        return $product_list;
    }
}
