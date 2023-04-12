<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/12/16
 * Time: 08:30 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\FamilyWishlistRepositoryInterface;
use KerungRepo\Repository\FamilyWishlistProductRepositoryInterface;

/**
 * Class FamilyWishlistService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class FamilyWishlistService extends BaseService
{
    /**
     * FamilyWishlistService constructor.
     *
     * @param FamilyWishlistRepositoryInterface $repo
     */
    public function __construct(FamilyWishlistRepositoryInterface $repo,
        FamilyWishlistProductRepositoryInterface $familyWishlistProductRepositoryInterface)
    {
        $this->repo = $repo;
        $this->familyWishlistProductRepositoryInterface = $familyWishlistProductRepositoryInterface;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {	
        $wishlistdatas = array(
                'customer_family_type_id'=>$data['customer_family_type_id'],
                'customer_id'=>$data['customer_id'],
                'duration_id'=>$data['duration_id']
                );
         
        $this->repo->create($wishlistdatas);
        return true;
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function checkOldWishlist($customerId,array $data)
    {   
       $check = $this->repo->checkOldWishlist($customerId);
       if($check==null)
           {
                $wishlistdatas = array(
                        'customer_family_type_id'=>$data['customer_family_type_id'],
                        'customer_id'=>$data['customer_id'],
                        'duration_id'=>$data['duration_id']
                        );
                 
                $this->repo->create($wishlistdatas);
                return true;
           }
       else
            {  
                $wishlistId = $check->f_s_w_id;
                $wishlistdatas = array(
                            'customer_family_type_id'=>$data['customer_family_type_id'],
                            'duration_id'=>$data['duration_id']
                            );
                $this->repo->update($wishlistId,$wishlistdatas);
                return true;
            }

    }
   
    /**
     * @param $customerId
     * @return mixed
     */
    public function getByCustomerId($customerId)
    {
      return $this->repo->checkOldWishlist($customerId);  
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function getFamilySizeId($customerId)
    {
        $data = $this->repo->checkOldWishlist($customerId);
        if($data!=null)
        {
            return $this->familyWishlistProductRepositoryInterface->getWishlitAccToFamilySizeId($data->f_s_w_id);
        }
        else
            return null;

    }
}