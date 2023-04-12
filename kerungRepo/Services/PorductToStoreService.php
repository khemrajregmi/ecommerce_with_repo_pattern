<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/06/16
 * Time: 3:53 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductToStoreRepositoryInterface;

/**
 * Class ProductToStoreService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductToStoreService extends BaseService
{

    /**
     * ProductToStoreService constructor.
     * @param ProductToStoreRepositoryInterface $repo
     */
    public function __construct(ProductToStoreRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}