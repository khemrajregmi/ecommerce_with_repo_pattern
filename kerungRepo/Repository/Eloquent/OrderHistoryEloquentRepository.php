<?php
/**
 * Created by Sublime.
 * User: khem
 * Date: 12/12/19
 * Time: 11:00 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\OrderHistory;
use KerungRepo\Repository\OrderHistoryRepositoryInterface;

class OrderHistoryEloquentRepository extends BaseEloquentRepository implements OrderHistoryRepositoryInterface
{

    public function __construct(OrderHistory $OrderHistory)
    {
        $this->model = $OrderHistory;
    }


    /**
     * @param $products
     * @param $order
     * @param $cartTotal
     * @return bool
     */
    public function storeOrderedHistory($products, $order,$comment)
    {
        $this->model->create([
            'order_id' => $order->order_id,
            'order_status_id' => $order->order_status_id,
            'notify' => 0,
            'comment' => $comment
        ]);
        return true;
    }

    public function getByOrderID($id)
    {
      return $this->model->where('order_id','=',$id)->get();  
    }

}