<?php

namespace Kerung\Http\Controllers\Admin;


use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;
use KerungRepo\Services\CustomerGroupService;
use KerungRepo\Services\LengthClassService;
use KerungRepo\Services\ProductService;
use Kerung\Http\Requests\Admin\ProductRequest;
use KerungRepo\Services\ManufacturerService;
use KerungRepo\Services\CategoryService;
use KerungRepo\Services\AttributeService;
use Illuminate\Support\Facades\Redirect;
use JavaScript;
use KerungRepo\Services\StockStatusService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;
use KerungRepo\Services\WeightClassService;
use KerungRepo\Services\ProductAttributeService;
use KerungRepo\Services\ProductDiscountService;
use KerungRepo\Services\ProductImageService;
use KerungRepo\Services\ProductReturnService;
use KerungRepo\Services\ReviewService;
use Helper;
use Excel;


/**
 * Class ProductController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductController extends Controller
{

    /**
     * Product Service
     *
     * @var ProductService
     */
    protected $service;

    /**
     * Category Service
     *
     * @var CategoryService
     */
    protected $cService;

    /**
     * @var ManufacturerService
     */
    protected $mService;

    /**
     * Attribute Service
     *
     * @var AttributeService
     */
    protected $aService;

    /**
     * StockStatusService
     *
     * @var StockStatusService
     */
    protected $ssService;

    /**
     * Customer Group Service
     *
     * @var Cusotmer Group Service
     */
    protected $cgService;

    /**
     * @var WeightClassService
     */
    protected $wcService;

    /**
     * @var LengthClassService
     */
    protected $lcService;

    /**
     * @var $storeService
     */
    protected $storeService;

    /**
     * @var $userService
     */
    protected $userService;

    /**
     * @var $productAttributeService
     */
    protected $productAttributeService;

    /**
     * @var $productDiscountService
     */
    protected $productDiscountService;

    /**
     * @var $productImageService
     */
    protected $productImageService;

    /**
     * @var $productReturnService
     */
    protected $productReturnService;

    /**
     * @var $reviewService
     */
    protected $reviewService;


   /**
    * ProductController constructor.
    * @param ProductService $service
    * @param ManufacturerService $manufacturerService
    * @param CategoryService $categoryService
    * @param AttributeService $attributeService
    * @param StockStatusService $stockStatusService
    * @param CustomerGroupService $customerGroupService
    * @param LengthClassService $lengthClassService
    * @param WeightClassService $weightClassService
    * @param StoreService $storeService
    * @param UserService $userService
    * @param ProductAttributeService $productAttributeService
    * @param ProductDiscountService $productDiscountService
    * @param ProductImageService $productImageService
    * @param ProductReturnService $productReturnService
    * @param ReviewService $reviewService
    */
    public function __construct(
        ProductService $service,
        ManufacturerService $manufacturerService,
        CategoryService $categoryService,
        AttributeService $attributeService,
        StockStatusService $stockStatusService,
        CustomerGroupService $customerGroupService,
        LengthClassService $lengthClassService,
        WeightClassService $weightClassService,
        StoreService $storeService,
        UserService $userService,
        ProductAttributeService $productAttributeService,
        ProductDiscountService $productDiscountService,
        ProductImageService $productImageService,
        ProductReturnService $productReturnService,
        ReviewService $reviewService
    ) {
        $this->service = $service;
        $this->cService = $categoryService;
        $this->mService = $manufacturerService;
        $this->aService = $attributeService;
        $this->ssService = $stockStatusService;
        $this->cgService = $customerGroupService;
        $this->lcService = $lengthClassService;
        $this->wcService = $weightClassService;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->productAttributeService = $productAttributeService;
        $this->productDiscountService = $productDiscountService;
        $this->productImageService = $productImageService;
        $this->productReturnService = $productReturnService;
        $this->reviewService = $reviewService;
    }


    /**
     * Index View of Manufacturer
     *
     * @return mixed
     */
    public function index()
    {   
        // dd('la ya pugyo');
        return view('admin.product.admin_table_product')->with($this->getProductRelatedModelData());
    }

    /**
     * Get All Data Related To Products
     *
     * @return array
     */
    public function getProductRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = array(
            'userProducts' => $this->service->getStoreWithProductAccToUser($user),
            'products' => $this->service->getAll(),
            'manufacturers' => $this->mService->getAll(),
            'categories' => $this->cService->getAll(),
            'attributes' => $this->aService->getAll(),
            'stockStatus' => $this->ssService->getAll(),
            'customerGroups' => $this->cgService->getAll(),
            'weightClass' => $this->wcService->getAll(),
            'lengthClass' => $this->lcService->getAll(),
            'stores' => $this->storeService->getStoreAccToUser($user),
        );


    }

    /**
     * Create Product
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.product.admin_add_product')->with($this->getProductRelatedModelData());
    }

    /**
     * Update product
     *
     * @param ProductRequest $request
     * @return mixed
     */
    public function store(ProductRequest $request)
    {
        $this->service->store($request->all());
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.product.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $productAttributes = $this->service->getProductWithAttributes($id);
        $productDiscounts = $this->service->getProductDiscountsByProductId($id);
        $productImages = $this->service->getProductImagesByProductId($id);
        return view('admin.product.admin_edit_product')
            ->with($this->getProductRelatedModelData())
            ->with(array(
                'product' => $this->service->getById($id),
                'productAttributes' => $productAttributes,
                'productImages' => $productImages,
                'productDiscounts' => $productDiscounts
            ));

    }

    public function show($id)
    {
        $productAttributes = $this->service->getProductWithAttributes($id);
        $productDiscounts = $this->service->getProductDiscountsByProductId($id);
        $productImages = $this->service->getProductImagesByProductId($id);
        return view('admin.product.admin_show_product')
            ->with($this->getProductRelatedModelData())
            ->with(array(
                'product' => $this->service->getById($id),
                'productAttributes' => $productAttributes,
                'productImages' => $productImages,
                'productDiscounts' => $productDiscounts
            ));

    }


    /**
     * Update product Data
     *
     * @param ProductRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ProductRequest $request, $id)
    {
        $this->service->update($id, $request->all());
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.product.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->productAttributeService->hasChild('product_id',$id);
        $response1= $this->reviewService->hasChild('product_id',$id);
        $response2= $this->productImageService->hasChild('product_id',$id);
        $response3= $this->productReturnService->hasChild('product_id',$id);
        if(($response==null) && ($response1==null) && ($response2==null) && ($response3==null))
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}    
