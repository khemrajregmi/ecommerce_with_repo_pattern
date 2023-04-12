<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 12/12/16
 * Time: 11:00 AM
 */

namespace KerungRepo\Repository\Eloquent;

use Carbon\Carbon;
use DB;
use Kerung\Models\OrderProduct;
use KerungRepo\Repository\OrderProductRepositoryInterface;

class OrderProductEloquentRepository extends BaseEloquentRepository implements OrderProductRepositoryInterface
{

    public function __construct(OrderProduct $OrderProduct)
    {
        $this->model = $OrderProduct;
    }


    /**
     * @param $products
     * @param $order
     * @param $cartTotal
     * @return bool
     */
    public function storeOrderedProducts($products, $order,$cartTotal)
    {

        $this->model->where('order_id','=',$order->order_id)->delete();
        foreach ($products as $product) {
            $this->model->create([
                'order_id' => $order->order_id,
                'product_id' => $product->id,
                'name' => $product->name,
                'model' => $product->options->model,
                'price' => $product->price,
                'quantity' => $product->qty,
                'total' => ($product->qty)*($product->price),
                'tax' => $product->tax,
            ]);
        }

        return true;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getByOrderID($id)
    {
        return $this->model->where('order_id','=',$id)->get();
    }

     /**
     * @return mixed
     */
    public function getFilterSalesReport($data)
    {   
        $start_date = Carbon::parse($data['start_date'])->format('Y-m-d');
        $end_date = Carbon::parse($data['end_date'])->format('Y-m-d');
        if($data['filter_order_status_id']!=0)
        {

            switch($data['filter_group']) {
                      case 'DAY';
                      return $this->model->whereHas('order',function($query) use($data){
                              $query->where('order_status_id',$data['filter_order_status_id']);
                              })->whereBetween('created_at', [$start_date, $end_date])
                                ->select('*', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
                                ->selectRaw('MIN(created_at) as created ,MAX(created_at) as updated')
                                ->selectRaw('sum(total) as sum')
                                ->groupBy('created_at')
                                ->get();
                          break;
                        default:
                      case 'WEEK':
                      return $this->model->whereHas('order',function($query) use($data){
                              $query->where('order_status_id',$data['filter_order_status_id']);
                              })->whereBetween('created_at', [$start_date, $end_date])
                                ->select('*', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
                                    ->selectRaw('MIN(created_at) as created ,MAX(created_at) as updated')
                                ->selectRaw('sum(total) as sum')
                                ->groupBy(DB::raw("WEEK(created_at)"))
                                ->get();
                          break;
                      case 'MONTH':
                      return $this->model->whereHas('order',function($query) use($data){
                              $query->where('order_status_id',$data['filter_order_status_id']);
                              })->whereBetween('created_at', [$start_date, $end_date])
                                ->select('*', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
                                    ->selectRaw('MIN(created_at) as created ,MAX(created_at) as updated')
                                ->selectRaw('sum(total) as sum')
                                ->groupBy(DB::raw("MONTH(created_at)"))
                                ->get();
                          break;
                      case 'YEAR':
                      return $this->model->whereHas('order',function($query) use($data){
                              $query->where('order_status_id',$data['filter_order_status_id']);
                              })->whereBetween('created_at', [$start_date, $end_date])
                                ->select('*', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
                                ->selectRaw('MIN(created_at) as created ,MAX(created_at) as updated')
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
                          ->select('created_at','updated_at', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
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
                          ->select('created_at','updated_at', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("WEEK(created_at)"))
                          ->get();
                          break;
                      case 'MONTH':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('*', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("MONTH(created_at)"))
                          ->get();
                          break;
                      case 'YEAR':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('*', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->selectRaw('sum(total) as sum')
                          ->groupBy(DB::raw("YEAR(created_at)"))
                          ->get();
                          break;
                    }
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getProductPurchaseReport($data)
    {

        $start_date = Carbon::parse($data['start_date'])->format('Y-m-d');
        $end_date = Carbon::parse($data['end_date'])->format('Y-m-d');
        if($data['filter_order_status_id']!=0)
        {

            return $this->model->whereHas('order',function($query) use($data){
                    $query->where('order_status_id',$data['filter_order_status_id']);
                    })->whereBetween('created_at', [$start_date, $end_date])
                      ->select('*', DB::raw('sum(quantity) as qty'))
                      ->selectRaw('sum(total) as sum')
                      ->groupBy('name')
                      ->get();
                
        }
        else
        {

            return $this->model
                        ->whereBetween('created_at', [$start_date, $end_date])
                        // ->select('*', DB::raw('sum(quantity) as qty'),DB::raw('count(order_id) as totalorder'))
                        ->select('*', DB::raw('sum(quantity) as qty'))
                        ->selectRaw('sum(total) as sum')
                        ->groupBy('name')
                        ->get();
        }
    }


}