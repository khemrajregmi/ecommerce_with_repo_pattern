<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/12/16
 * Time: 08:30 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\FamilyWishlistProductRepositoryInterface;

/**
 * Class FamilyWishlistProductService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class FamilyWishlistProductService extends BaseService
{
    /**
     * FamilyWishlistProductService constructor.
     *
     * @param FamilyWishlistProductRepositoryInterface $repo
     */
    public function __construct(FamilyWishlistProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }


     /**
     * @param array $data
     * @return mixed
     */
    public function storeFamilyWishList($product,$customerwishlist)
    {   
        if($customerwishlist==null)
            {
                return "notsuccess";
            }
        else
            { 
               
                $familyWishlist = $this->repo->checkProductIfExit($product->product_id);

                if($familyWishlist!=null)
                {
                    if($familyWishlist->product_id==$product->product_id)
                        {
                            $data =array(
                                'f_s_w_id'=> $customerwishlist->f_s_w_id,
                                'product_id' => $product->product_id,
                                'name' => $product->name,
                                'price' => $product->price,
                                'quantity' => 1
                            );

                            $id = $familyWishlist->familywish_product_id;
                           $this->repo->update($id,$data); 
                        }
                }
                else
                    {
                        $data =array(
                            'f_s_w_id'=> $customerwishlist->f_s_w_id,
                            'product_id' => $product->product_id,
                            'name' => $product->name,
                            'price' => $product->price,
                            'quantity' => 1
                        );
                        $this->repo->create($data);
                    }
                return "success";
            }
    }
    /**
     * @param familysizeId
     * @return mixed
     */
    public function getFamilyWishlist($familysizeId)
    {
        return $this->repo->getWishlitAccToFamilySizeId($familysizeId);
    }
}