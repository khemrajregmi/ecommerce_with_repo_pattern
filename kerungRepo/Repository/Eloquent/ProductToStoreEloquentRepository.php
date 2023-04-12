<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/05/16
 * Time: 10:00 PM
 */

namespace KerungRepo\Repository\Eloquent;





use Kerung\Models\ProductToStore;
use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use KerungRepo\Repository\ProductToStoreRepositoryInterface;

class ProductToStoreEloquentRepository extends BaseEloquentRepository implements ProductToStoreRepositoryInterface
{
    /**
     * ReturnEloquentRepository constructor.
     *  
     * @param ProductToStore $producttostore
     */
    public function __construct(ProductToStore $producttostore)
    {
        $this->model = $producttostore;
    }
}