<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/07/16
 * Time: 08:31 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductRelatedRepositoryInterface;

/**
 * Class ProductRelatedService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductRelatedService extends BaseService
{

    /**
     * ProductRelatedService constructor.
     * @param ProductRelatedRepositoryInterface $repo
     */
    public function __construct(ProductRelatedRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getRelatedProductId($id)
    {
    	return $this->repo->getRelatedProductId($id);
    }
}