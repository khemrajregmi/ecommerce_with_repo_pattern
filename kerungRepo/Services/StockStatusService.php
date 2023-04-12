<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/29/16
 * Time: 11:21 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\StockStatusRepositoryInterface;

/**
 * Class StockStatusService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class StockStatusService extends BaseService
{
	/**
     * StockStatusService constructor.
     * @param StockStatusRepositoryInterface $repo
     */
	
    public function __construct(StockStatusRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}