<?php

/**
 * Created by Sublime.
 * User: Khem
 * Date: 11/07/16
 * Time: 10:49 AM
 */

namespace Kerung\Http\Controllers\Home\Customer;

use Illuminate\Http\Request;

use Response;
use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\CustomerService;
use KerungRepo\Services\WishListService;
use KerungRepo\Services\FamilyWishlistProductService;
use KerungRepo\Services\FamilyWishlistService;


/**
 * Class WishListController
 *
 * @package Kerung\Http\Controllers\Home
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class WishlistController extends Controller
{
    /**
     *
     * WishList Object
     *
     * @var object $service
     */
    protected $service;

    /**
     * Product Service
     *
     * @var pService
     */
    protected $pService;

    /**
     * Customer Service
     *
     * @var cService
     */
    protected $cService;

    /**
     * FamilyWishlistProduct Service 
     *
     * @var familyWishlistProductService
     */
    protected $familyWishlistProductService;

    /**
     * FamilyWishlist Service 
     *
     * @var familyWishlistService
     */
    protected $familyWishlistService;


    /**
     * WishListController constructor.
     * @param WishListService $service
     * @param ProductService $productService
     * @param CustomerService $customerService
     * @param FamilyWishlistService $familyWishlistService
     * @param FamilyWishlistProductService $familyWishlistProductService
     */
    public function __construct(
                    WishListService $service,
                    ProductService $productService,
                    CustomerService $customerService,
                    FamilyWishlistService $familyWishlistService,
                    FamilyWishlistProductService $familyWishlistProductService
    ) {
        $this->service = $service;
        $this->pService = $productService;
        $this->cService = $customerService;
        $this->familyWishlistProductService = $familyWishlistProductService;
        $this->familyWishlistService = $familyWishlistService;
    }

    /**
     * Add Wishlist
     * @param Request $request
     * @return mixed
     */
    public function addToWishlist(Request $request)
    {	
    	$productId = $request->productId;
        $product=$this->pService->getById($productId);
        $customerId= $request->customerId;
        $this->service->storeCustomerWishList($productId,$customerId);
        $count= count($this->service->getAll());

        return $count;
        // Notify::success('Data Added Successfully.');
        // return Redirect::route('single.product',$request->product_id);

    }

    /**
     * Wishlist
     * @param customerId $customerId
     * @return View
     */
    public function wishList($customerId)
    {
        $wishlist = $this->service->getAll();
        $totalWishlist = count($wishlist);
        $id = $customerId;
        return view('home.customer.wishlist',
            ['products' => $this->cService->getProductsByCustomerId($id)],
            ['total' => $totalWishlist]
        );
    }

    /**
     * Delete Wishlist
     * @param  Request $request
     * @return mixed
     */
    public function removeWishlist(Request $request)
    {

        $productId = $request->id;
        $product=$this->pService->getById($productId);
        $customerId= $request->customerId;
        return $this->service->removeWishlist($productId,$customerId);

    }

    /**
     * Add Family Wishlist
     * @param  Request $request
     * @return mixed
     */
    public function addFamilyWishList(Request $request)
    {
        $productId = $request->productId;
        $customerId= $request->customerId;
        $product=$this->pService->getById($productId);
        $customerwishlist=$this->familyWishlistService->getByCustomerId($customerId);
        return $response = $this->familyWishlistProductService->storeFamilyWishList($product,$customerwishlist);
    }
}
