<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 11/15/16
 * Time: 10:04 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\ComboType;
use KerungRepo\Repository\ComboTypeRepositoryInterface;

/**
 * Class ComboTypeEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ComboTypeEloquentRepository extends BaseEloquentRepository implements ComboTypeRepositoryInterface
{
    
    public function __construct(ComboType $comboType)
    {
        $this->model = $comboType;
    }

    /**
     * @param $combotypeId
     * @param $combotype
     * @return mixed
     */
    public function storeComboTypeInStores($combotypeId, $combotype)
    {
     return  $combotype->Store()->sync($combotypeId);
    }


    /**
     * Get Store With Customer Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithComboTypeAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['combotypes'] = $value->combotypes()->get();
            }
            return $stores;
    }

}