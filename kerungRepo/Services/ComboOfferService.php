<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 11/15/16
 * Time: 9:59 AM
 */
namespace KerungRepo\Services;

use KerungRepo\Repository\ComboOfferRepositoryInterface;


/**
 * Class ComboOfferService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ComboOfferService extends BaseService

{
    /**
     * ComboOfferService constructor.
     * @param ComboOfferRepositoryInterface $comboOfferRepositoryInterface
     */
    public function __construct(ComboOfferRepositoryInterface $comboOfferRepositoryInterface)
    {
        $this->repo = $comboOfferRepositoryInterface;
    }

    /**
     * Store Combo Offer
     * 
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        isset($data['show_mrp']) ? $data['show_mrp']=1 : $data['show_mrp']=0;
        isset($data['show_sp']) ? $data['show_sp']=1 : $data['show_sp']=0;
        isset($data['show_sp']) ? $data['show_sp']=1 : $data['show_sp']=0;
        $comboOffers = [
            'combo_name' => $data['combo_name'],
            'combo_type_id' => $data['combo_type_id'],
            'category_id' => $data['category_id'],
            'combo_price' => $data['combo_price'],
            'status' => $data['status'],
            'show_mrp' => $data['show_mrp'],
            'show_sp' => $data['show_sp'],
            'image' => $data['image'],
            'show_cp' => $data['show_cp']
        ];
        $combo = $this->repo->store($comboOffers);
        if(isset($data['product_id']))
        {
            $this->repo->storeComboProducts($combo,$data['product_id']);
        }
        if(isset($data['store']))
        {
            $this->repo->storeComboOfferInStores($data['store'],$combo);
        }
        return true;

    }

    /**
     * Update Combo Offers
     *
     * @param $comboOfferId
     * @param array $data
     * @return bool
     */
    public function update($comboOfferId,array $data)
    {

        isset($data['show_mrp']) ? $data['show_mrp']= "1" : $data['show_mrp']=0;
        isset($data['show_sp']) ? $data['show_sp']= "1" : $data['show_sp']=0;
        isset($data['show_sp']) ? $data['show_sp']= "1" : $data['show_sp']=0;
        $comboOffers = [
            'combo_name' => $data['combo_name'],
            'combo_type_id' => $data['combo_type_id'],
            'category_id' => $data['category_id'],
            'combo_price' => $data['combo_price'],
            'status' => $data['status'],
            'show_mrp' => $data['show_mrp'],
            'show_sp' => $data['show_sp'],
            'image' => $data['image'],
            'show_cp' => $data['show_cp']
        ];
        $this->repo->updateComboOffers($comboOfferId,$comboOffers);
        if(isset($data['product_id']))
        {
            $combo = $this->getById($comboOfferId);
            $this->repo->storeComboProducts($combo,$data['product_id']);
        }
        if(isset($data['store']))
        {
            $combo = $this->getById($comboOfferId);
            $this->repo->storeComboOfferInStores($data['store'],$combo);
        }
        return true;
    }


    /**
     * Get Combo Offer With Type
     *
     * @return mixed
     */
    public function getComboOfferWithType()
    {
        return $this->repo->getComboOfferWithType();
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithComboOfferAccToUser($user)
    {
        return $this->repo->getStoreWithComboOfferAccToUser($user);
    }

    }
