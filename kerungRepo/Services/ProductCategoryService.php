<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/06/16
 * Time: 3:53 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductCategoryRepositoryInterface;

/**
 * Class ProductCategoryService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductCategoryService extends BaseService
{

    /**
     * ProductCategoryService constructor.
     * @param ProductCategoryRepositoryInterface $repo
     */
    public function __construct(ProductCategoryRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

}