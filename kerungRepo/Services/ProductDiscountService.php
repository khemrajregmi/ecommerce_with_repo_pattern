<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/06/16
 * Time: 3:53 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductDiscountRepositoryInterface;

/**
 * Class ProductDiscountService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductDiscountService extends BaseService
{

    /**
     * ProductDiscountService constructor.
     * @param ProductDiscountRepositoryInterface $repo
     */
    public function __construct(ProductDiscountRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}