<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/06/16
 * Time: 3:53 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductAttributeRepositoryInterface;

/**
 * Class ProductAttributeService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductAttributeService extends BaseService
{

    /**
     * ProductAttributeService constructor.
     * @param ProductAttributeRepositoryInterface $repo
     */
    public function __construct(ProductAttributeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}