<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 10:00 PM
 */

namespace KerungRepo\Repository\Eloquent;





use Kerung\Models\ProductReturnStatus;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\ProductReturnStatusRepositoryInterface;

class ProductReturnStatusEloquentRepository extends BaseEloquentRepository implements ProductReturnStatusRepositoryInterface
{
    /**
     * ReturnEloquentRepository constructor.
     *  
     * @param ProductReturnStatus $returnstatus
     */
    public function __construct(ProductReturnStatus $returnstatus)
    {
        $this->model = $returnstatus;
    }
}