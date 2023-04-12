<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/09/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\OrderStatusRepositoryInterface;

/**
 * Class OrderStatusService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class OrderStatusService extends BaseService

{
	/**
     * OrderStatusService constructor.
     * @param OrderStatusRepositoryInterface $repo
     */
    public function __construct(OrderStatusRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}