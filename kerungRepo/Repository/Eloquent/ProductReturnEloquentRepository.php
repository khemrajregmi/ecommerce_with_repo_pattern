<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Repository\Eloquent;


use Carbon\Carbon;
use DB;
use Kerung\Models\ProductReturn;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\ProductReturnRepositoryInterface;

class ProductReturnEloquentRepository extends BaseEloquentRepository implements ProductReturnRepositoryInterface
{
    /**
     * ReturnEloquentRepository constructor.
     *  
     * @param ProductReturn $productreturn
     */
    public function __construct(ProductReturn $productreturn)
    {
        $this->model = $productreturn;
    }

    /**
     * Get Store With Return Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithReturnAccToUser($user)
    {
        
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['productreturns'] = $value->productreturns()->get();
            }
            return $stores;
    }

    /**
     * @param $returnId
     * @param $product_return
     * @return mixed
     */
    public function storeReturnInStores($returnId, $product_return)
    {
     return  $product_return->Store()->sync($returnId);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getFilterReturnReport($data)
    {  
        $start_date = Carbon::parse($data['start_date'])->format('Y-m-d');
        $end_date = Carbon::parse($data['end_date'])->format('Y-m-d');
        if($data['filter_order_status_id']!=0)
        {

            switch($data['filter_group']) {
                      case 'DAY';
                      return $this->model
                                ->whereBetween('created_at', [$start_date, $end_date])
                                ->select('product_return_id', DB::raw('count(order_id) as qty'))
                                ->selectRaw('MIN(created_at) as created ,MAX(created_at) as updated')
                                ->groupBy('created_at')
                                ->get();
                          break;
                        default:
                      case 'WEEK':
                      return $this->model
                                ->whereBetween('created_at', [$start_date, $end_date])
                                ->select('product_return_id', DB::raw('count(order_id) as qty'))
                                ->selectRaw('MIN(created_at) as created ,MAX(created_at) as updated')
                                ->groupBy(DB::raw("WEEK(created_at)"))
                                ->get();
                          break;
                      case 'MONTH':
                      return $this->model
                                ->whereBetween('created_at', [$start_date, $end_date])
                                ->select('product_return_id', DB::raw('count(order_id) as qty'))
                                ->selectRaw('MIN(created_at) as created ,MAX(created_at) as updated')
                                ->groupBy(DB::raw("MONTH(created_at)"))
                                ->get();
                          break;
                      case 'YEAR':
                      return $this->model
                                ->whereBetween('created_at', [$start_date, $end_date])
                                ->select('product_return_id', DB::raw('count(order_id) as qty'))
                                ->selectRaw('MIN(created_at) as created ,MAX(created_at) as updated')
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
                          ->select('product_return_id', DB::raw('count(order_id) as qty'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->groupBy('created_at')
                          ->get();
                          break;
                        default:
                      case 'WEEK':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('product_return_id', DB::raw('count(order_id) as qty'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->groupBy(DB::raw("WEEK(created_at)"))
                          ->get();
                          break;
                      case 'MONTH':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('product_return_id', DB::raw('count(order_id) as qty'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->groupBy(DB::raw("MONTH(created_at)"))
                          ->get();
                          break;
                      case 'YEAR':
                        return $this->model
                          ->whereBetween('created_at', [$start_date, $end_date])
                          ->select('product_return_id', DB::raw('count(order_id) as qty'))
                          ->selectRaw('MAX(created_at) AS "updated"' )
                          ->selectRaw('MIN(created_at) AS "created"' )
                          ->groupBy(DB::raw("YEAR(created_at)"))
                          ->get();
                          break;
                    }
        }
    }
}