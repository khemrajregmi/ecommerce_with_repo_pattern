<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductReturnActionRepositoryInterface;
use KerungRepo\Services\BaseService;

/**
 * Class ProductReturnActionService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class ProductReturnActionService extends BaseService
{
	/**
     * ProductReturnActionService constructor.
     * @param ProductReturnActionRepositoryInterface $repo
     */
	
    public function __construct(ProductReturnActionRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
