<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 11/15/16
 * Time: 11:27 AM
 */

namespace KerungRepo\Repository\Eloquent;


use Kerung\Models\ComboOffer;
use KerungRepo\Repository\ComboOfferRepositoryInterface;

class ComboOfferEloquentRepository extends BaseEloquentRepository implements ComboOfferRepositoryInterface
{

    public function __construct(ComboOffer $comboOffer)
    {
        $this->model = $comboOffer;
    }


    /**
     * @param array $comboOffers
     * @return static
     */
    public function store(array $comboOffers)
    {
        return $this->create($comboOffers);
    }
    
    public function updateComboOffers($comboOfferId,$comboOffers)
    {
        return $this->update($comboOfferId,$comboOffers);
    }

    /**
     * @param $combo
     * @param $comboProducts
     * @return mixed
     */
    public function storeComboProducts($combo, $comboProducts)
    {
      return $combo->products()->sync($comboProducts);
    }

    /**
     * Get Combo Offers With Types
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getComboOfferWithType()
    {
      return  $this->model->with('comboType')->get();
    }


    /**
     * @param $comboofferId
     * @param $combooffer
     * @return mixed
     */
    public function storeComboOfferInStores($comboofferId, $combooffer)
    {
     return  $combooffer->Store()->sync($comboofferId);
    }


    /**
     * Get Store With ComboOffer Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithComboOfferAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['combooffers'] = $value->combooffers()->get();
            }
            return $stores;
    }

}