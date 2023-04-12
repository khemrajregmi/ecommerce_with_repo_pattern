<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/13/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Repository\Eloquent;

use Carbon\Carbon;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use Kerung\Models\Order;
use KerungRepo\Repository\OrderRepositoryInterface;
use DB;


/**
 * Class OrderEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class OrderEloquentRepository extends BaseEloquentRepository implements OrderRepositoryInterface
{
    /**
     * OrderEloquentRepository constructor.
     *  
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    /**
     * Create Order
     *
     * @param $data
     * @return static
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * Get Store With Order Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithOrderAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['reviews'] = $value->reviews()->get();
            }
            return $stores;
    }

    /**
     * @param $orderId
     * @param $order
     * @return mixed
     */
    public function storeOrderInStores($orderId, $order)
    {
     return  $order->Store()->sync($orderId);
    }


    /**
     * @param $id
     * @param $order
     * @return mixed
     */
    public function getStoreName($id,$order)
    {
        return $order->Store()->wherePivot('order_id',$id)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOrderByCustomerID($id)
    {
        return $this->model->where('customer_id',$id)->get();
    }




    /**
     * @param $data
     * @return mixed
     */
    public function getFilterShippingReport($data)
    {   
        $start_date = Carbon::parse($data['start_date'])->format('Y-m-d');
        $end_date = Carbon::parse($data['end_date'])->format('Y-m-d');
        if($data['filter_order_status_id']!=0)
        {
          switch($data['filter_group']) {
                      case 'DAY';
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->where('order_status_id',$data['filter_order_status_id'])
                          ->select('shipping_method', DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy('created_at')
                          ->get();
                          break;
                        default:
                      case 'WEEK':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->where('order_status_id',$data['filter_order_status_id'])
                          ->select('shipping_method', DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("WEEK(created_at)"))
                          ->get();
                          break;
                      case 'MONTH':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->where('order_status_id',$data['filter_order_status_id'])
                          ->select('shipping_method', DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("MONTH(created_at)"))
                          ->get();
                          break;
                      case 'YEAR':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->where('order_status_id',$data['filter_order_status_id'])
                          ->select('shipping_method', DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("YEAR(created_at)"))
                          ->get();
                          break;
                    }
        }
        else
        {
          switch($data['filter_group']) {
                      case 'DAY';
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('shipping_method', DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy('created_at')
                          ->get();
                          break;
                        default:
                      case 'WEEK':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('shipping_method', DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("WEEK(created_at)"))
                          ->get();
                          break;
                      case 'MONTH':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('shipping_method', DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("MONTH(created_at)"))
                          ->get();
                          break;
                      case 'YEAR':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('shipping_method', DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("YEAR(created_at)"))
                          ->get();
                          break;
                    }
        }
    }

}