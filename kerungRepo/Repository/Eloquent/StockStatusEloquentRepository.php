<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/29/16
 * Time: 11:22 AM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\StockStatus;
use KerungRepo\Repository\StockStatusRepositoryInterface;

class StockStatusEloquentRepository extends BaseEloquentRepository implements StockStatusRepositoryInterface
{
    /**
     * StockStatusEloquentRepository constructor.
     * @param StockStatus $stockStatus
     */
    public function __construct(StockStatus $stockStatus)
    {
        $this->model = $stockStatus;
    }
}