<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Kerung\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;
use KerungRepo\Services\FeatureProductService;
use KerungRepo\Services\ProductService;
use Illuminate\Support\Facades\Redirect;
use KerungRepo\Services\StockStatusService;
use Helper;
use Excel;


/**
 * Class ProductController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class FeatureProductController extends Controller
{

    /**
     * Feature Product Service
     *
     * @var ProductService
     */
    protected $service;


   /**
    * ProductController constructor.
    * @param ProductService $service
    */
    public function __construct(
        ProductService $pservice,
        FeatureProductService $service
    ) {
        $this->service = $service;
        $this->pservice = $pservice;
    }


    /**
     * Index View of Manufacturer
     *
     * @return mixed
     */
    public function index()
    {   
        return view('admin.feature_product.admin_table_product')->with($this->getProductRelatedModelData());
    }

    /**
     * Get All Data Related To Products
     *
     * @return array
     */
    public function getProductRelatedModelData()
    {
        return $data = array(
            'feature_products' => $this->service->getAll(),
            'products' => $this->pservice->getAll()
        );


    }

    /**
     * Create Product
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.feature_product.admin_add_product')->with($this->getProductRelatedModelData());
    }

    /**
     * Update product
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->service->storeData($request->all());
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.feature.index');
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
        return view('admin.feature_product.admin_edit_product')
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
        return view('admin.feature_product.admin_show_product')
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
        return Redirect::route('admin.feature.index');
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
