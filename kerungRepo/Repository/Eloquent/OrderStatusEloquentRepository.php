<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/09/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\OrderStatus;
use KerungRepo\Repository\OrderStatusRepositoryInterface;

/**
 * Class OrderStatusEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class OrderStatusEloquentRepository extends BaseEloquentRepository implements OrderStatusRepositoryInterface
{
    /**
     * OrderStatusEloquentRepository constructor.
     *  
     * @param OrderStatus $orderstatus
     */
    public function __construct(OrderStatus $orderstatus)
    {
        $this->model = $orderstatus;
    }
}