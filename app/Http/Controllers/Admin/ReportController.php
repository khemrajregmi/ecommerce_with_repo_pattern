<?php

/**
 * Created by sublime.
 * User: khem
 * Date: 8/31/16
 * Time: 3:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\OrderService;
use KerungRepo\Services\OrderStatusService;
use KerungRepo\Services\ProductReturnService;
use KerungRepo\Services\CouponService;
use KerungRepo\Services\OrderProductService;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\StockStatusService;


/**
 * Class OrderController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class ReportController extends Controller
{
    
    /**
     *
     * @var OrderService
     */
    protected $service;

    /**
     * OrderStatus Service
     *
     * @var OrderStatus
     */
    protected $orderstatusService;


    /**
     * ProductReturn Service
     *
     * @var ProductReturn
     */
    protected $productReturnService;

    /**
     * CouponService
     *
     * @var CouponService
     */
    protected $couponService;

    /**
     * OrderProduct Service
     *
     * @var OrderProductService
     */
    protected $orderProductService;

    /**
     * Product Service
     *
     * @var ProductService
     */
    protected $productService;

     /**
     * StockStatus Service
     *
     * @var StockStatusService
     */
    protected $stockStatusService;

   
    /**
     * OrderController constructor.
     * @param OrderService $service
     */
    public function __construct(
                                OrderService $service,
                                OrderStatusService $orderstatusService,
                                ProductReturnService $productReturnService,
                                CouponService $couponService,
                                OrderProductService $orderProductService,
                                ProductService $productService,
                                StockStatusService $stockStatusService
                                )
    {
        $this->service = $service;
        $this->orderstatusService = $orderstatusService;
        $this->productReturnService = $productReturnService;
        $this->couponService = $couponService;
        $this->orderProductService = $orderProductService;
        $this->productService = $productService;
        $this->stockStatusService = $stockStatusService;
        
    }

    /**
     * Get All Data Related To Orders
     *
     * @return array
     */
    public function getSalesReportRelatedModelData(){
        return $data = array(
            'orders' => $this->service->getAll(),
            'orders' => $this->service->getAll(),
            'orderstatus' => $this->orderstatusService->getAll(),
            'stockstatus' => $this->stockStatusService->getAll()
        );


    }

    /**
     *
     * @return view
     */
    public function orderSalesReport()
    {   
        $result = collect([]);
         return view('admin.reports.sales.admin_orderlist_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with('result',$result);
    }


    /**
     * @param $request
     * @return view
     */
    public function postorderSalesReport(Request $request)
    {
        $data= $request->all();
        $result = $this->orderProductService->getFilterSalesReport($data);
        return view('admin.reports.sales.admin_orderlist_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with(compact('result','data','total'));
    }

    /**
     * Shipping Sales Report
     * @return view
     */
    public function shippingSalesReport()
    {   
        $result = collect([]);
         return view('admin.reports.sales.admin_shippinglist_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with('result',$result);
    }


    /** 
     * Filter of Shipping Sales Report
     * @param $request
     * @return view
     */
    public function postShippingSalesReport(Request $request)
    {
        $data= $request->all();
        $result = $this->service->getFilterShippingReport($data);
        return view('admin.reports.sales.admin_shippinglist_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with(compact('result','data'));
    }


    /**
     * Returns Sales Report
     * @return view
     */
    public function returnSalesReport()
    {   
        $result = collect([]);
         return view('admin.reports.sales.admin_returnlist_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with('result',$result);
    }


    /** 
     * Filter of Returns  Report
     * @param $request
     * @return view
     */
    public function postReturnSalesReport(Request $request)
    {
        $data= $request->all();
        $result = $this->productReturnService->getFilterReturnReport($data);
        return view('admin.reports.sales.admin_returnlist_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with(compact('result','data'));
    }

    /**
     * Coupons  Report
     * @return view
     */
    public function couponSalesReport()
    {   
        $result = collect([]);
         return view('admin.reports.sales.admin_couponlist_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with('result',$result);
    }


    /** 
     * Filter of Coupons  Report
     * @param $request
     * @return view
     */
    public function postCouponSalesReport(Request $request)
    {
        $data= $request->all();
        $result = $this->couponService->getFilterCouponReport($data);
        return view('admin.reports.sales.admin_couponlist_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with(compact('result','data'));
    }


    /**
     * ProductVeiw  Report
     * @return view
     */
    public function productViewReport()
    {  
        $result = $this->productService->getProductViews();
        $count = $this->productService->getTotalViews();
         return view('admin.reports.product.admin_productview_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with(compact('result','count'));
    }

    /**
     * Product Purchase Report View
     * @return view
     */
    public function productPurchaseReport()
    {  
        $result = collect([]);
         return view('admin.reports.product.admin_productpurchase_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with('result',$result);
    }

    /**
     * Product Purchase Report View
     * @param $request
     * @return view
     */
    public function postProductPurchaseReport(Request $request)
    {
        $data= $request->all();
        $result = $this->orderProductService->getProductPurchaseReport($data);
        return view('admin.reports.product.admin_productpurchase_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with('result',$result);
    }


    /**
     * Product Inventory Report View
     * @return view
     */
    public function productInventoryReport()
    {  
        $result = collect([]);
         return view('admin.reports.product.admin_inventory_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with('result',$result);
    }

    /**
     * Product Inventory Report View
     * @param $request
     * @return view
     */
    public function postProductInventoryReport(Request $request)
    {
        $data= $request->all();
        $result = $this->productService->getProductInventoryReport($data);
        return view('admin.reports.product.admin_inventory_report')
         ->with($this->getSalesReportRelatedModelData())
         ->with('result',$result);
    }

}
