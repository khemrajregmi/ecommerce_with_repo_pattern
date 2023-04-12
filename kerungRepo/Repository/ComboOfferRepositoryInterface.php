<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 11/15/16
 * Time: 11:27 AM
 */

namespace KerungRepo\Repository;


interface ComboOfferRepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param $comboOfferId
     * @param $comboOffers
     * @return mixed
     */
    public function updateComboOffers($comboOfferId,$comboOffers);

    /**
     * Store Combo Products
     *
     * @param $combo
     * @param $comboProducts
     * @return mixed
     */
    public function storeComboProducts($combo,$comboProducts);

    /**
     * Get Comb Offer With Type
     *
     * @return mixed
     */
    public function getComboOfferWithType();

    /**
     * @param $data
     * @param $combooffer
     * @return mixed
     */
    public function storeComboOfferInStores($data,$combooffer);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithComboOfferAccToUser($user);

}