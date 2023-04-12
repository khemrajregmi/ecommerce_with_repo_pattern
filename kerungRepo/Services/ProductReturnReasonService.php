<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 1:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductReturnReasonRepositoryInterface;
use KerungRepo\Services\BaseService;

/**
 * Class ProductReturnReasonService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */


class ProductReturnReasonService extends BaseService
{
	/**
     * ProductReturnReasonService constructor.
     * @param ProductReturnReasonRepositoryInterface $repo
     */
	
    public function __construct(ProductReturnReasonRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
