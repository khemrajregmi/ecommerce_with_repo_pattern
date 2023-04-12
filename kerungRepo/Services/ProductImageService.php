<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/06/16
 * Time: 3:53 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductImageRepositoryInterface;

/**
 * Class ProductImageService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ProductImageService extends BaseService
{

    /**
     * ProductImageService constructor.
     * @param ProductImageRepositoryInterface $repo
     */
    public function __construct(ProductImageRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}