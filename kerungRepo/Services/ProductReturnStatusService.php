<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductReturnStatusRepositoryInterface;
use KerungRepo\Services\BaseService;

/**
 * Class ProductReturnStatusService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class ProductReturnStatusService extends BaseService
{
	/**
     * ProductReturnStatusService constructor.
     * @param ProductReturnStatusRepositoryInterface $repo
     */
	
    public function __construct(ProductReturnStatusRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
