<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 10:00 PM
 */

namespace KerungRepo\Repository\Eloquent;





use Kerung\Models\ProductReturnAction;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\ProductReturnActionRepositoryInterface;

class ProductReturnActionEloquentRepository extends BaseEloquentRepository implements ProductReturnActionRepositoryInterface
{
    /**
     * ReturnEloquentRepository constructor.
     *  
     * @param ProductReturnAction $returnaction
     */
    public function __construct(ProductReturnAction $returnaction)
    {
        $this->model = $returnaction;
    }
}