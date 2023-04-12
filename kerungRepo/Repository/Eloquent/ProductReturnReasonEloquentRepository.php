<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 2:00 PM
 */

namespace KerungRepo\Repository\Eloquent;





use Kerung\Models\ProductReturnReason;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\ProductReturnReasonRepositoryInterface;

class ProductReturnReasonEloquentRepository extends BaseEloquentRepository implements ProductReturnReasonRepositoryInterface
{
    /**
     * ReturnReasonEloquentRepository constructor.
     *  
     * @param ProductReturnReason $returnreason
     */
    public function __construct(ProductReturnReason $returnreason)
    {
        $this->model = $returnreason;
    }
}