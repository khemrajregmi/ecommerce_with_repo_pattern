<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/27/16
 * Time: 9:09 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductRepositoryInterface;
use KerungRepo\Repository\WishListRepositoryInterface;

/**
 * Class WishListService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class WishListService extends BaseService
{

    protected $productRepo;

    /**
     * WishListService constructor.
     * @param WishListRepositoryInterface $repo
     * @param ProductRepositoryInterface $productRepositoryInterface
     */
    public function __construct(WishListRepositoryInterface $repo,ProductRepositoryInterface $productRepositoryInterface)
    {
       $this->repo = $repo;
       $this->productRepo = $productRepositoryInterface;
    }


    /**
     * @param $productId
     * @param $customer
     */
    public function storeCustomerWishList($productId, $customer)
    {
        $product  = $this->productRepo->findById($productId);
        $this->repo->storeCustomerWishList($product,$customer);
    }

    /**
     * @param $productId
     * @param $customer
     */
    public function removeWishList($productId, $customer)
    {
        $product  = $this->productRepo->findById($productId);
        $this->repo->removeWishList($product,$customer);
    }

    
}