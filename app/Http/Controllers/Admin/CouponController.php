<?php
/**
 * Created by sublime.
 * User: khem
 * Date: 9/07/16
 * Time: 11:49 AM
 */

namespace Kerung\Http\Controllers\Admin;


use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\CouponService;
use KerungRepo\Services\CategoryService;
use KerungRepo\Services\ProductService;
use Kerung\Http\Requests\Admin\CouponRequest;
use Jleon\LaravelPnotify\Notify;
use Illuminate\Support\Facades\Redirect;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

/**
 * Class CouponController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class CouponController extends Controller
{
    /**
     * Coupon service
     *
     * @var CouponService
     */
    protected $service;

    /**
     * Product service
     *
     * @var ProductService
     */
    protected $productService;

    /**
     * Category service
     *
     * @var CategoryService
     */
    protected $categoryService;

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
     * CountryController constructor.
     * @param CountryService $service
     * @param CountryService $service
     * @param CountryService $service
     * @param StoreService $storeService
     * @param UserService $userService
     */
    public function __construct(CouponService $service,
                                CategoryService $categoryService,
                                ProductService $productService,
                                StoreService $storeService,
                                UserService $userService)
    {
        $this->service = $service;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->storeService = $storeService;
        $this->userService = $userService;
    }

    /**
     * Get All Data Related To Coupon
     *
     * @return array
     */
    public function getCouponRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userCoupons' => $this->service->getStoreWithCouponAccToUser($user),
            'stores' => $this->storeService->getStoreAccToUser($user),
            'coupons' => $this->service->getAll(),
            'categories' => $this->categoryService->getAllEnable(),
            'products' => $this->productService->getAllEnable()
        );
    }


    /**
     * Index View of Coupon
     *
     * @return mixed
     */
    public function index()
    {

        return view('admin.coupon.admin_table_coupon')
               ->with($this->getCouponRelatedModelData());
    }

    /**
     * Create Coupon
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.coupon.admin_add_coupon')
               ->with($this->getCouponRelatedModelData());
    }

    /**
     * Store the Coupon Data
     *
     * @param CouponRequest $request
     * @return mixed
     */
    public function store(CouponRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.coupon.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.coupon.admin_edit_coupon',
            ['coupon' => $this->service->getById($id)])
            ->with($this->getCouponRelatedModelData());
    }


    /**
     * Update Coupon Data
     *
     * @param CouponRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CouponRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.coupon.index');
    }

    /**
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
