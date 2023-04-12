<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/31/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ReviewRepositoryInterface;
/**
 * Class ReviewService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class ReviewService extends BaseService
{
	/**
     * ReviewService constructor.
     * @param ReviewRepositoryInterface $repo
     */
	
    public function __construct(ReviewRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Get Review With productId
     *
     * @param $productId
     * @return mixed
     */
    public function getReview($id)
    {
        return  $this->repo->getReview($id);
       

    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithReviewAccToUser($user)
    {
        return $this->repo->getStoreWithReviewAccToUser($user);
    }


    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {   
    
        $reviews = array(
                'author'=>$data['author'],
                'product_id'=>$data['product_id'],
                'customer_id'=>$data['customer_id'],
                'text'=>$data['text'],
                'rating'=>$data['rating'],
                'status'=>$data['status']
                );
         
        $review =  $this->repo->create($reviews);
        if(isset($data['store'])) {
            $this->repo->storeReviewInStores($data['store'],$review);
        }
        return true;
    }


    /**
     * @param $reviewsId
     * @param array $data
     * @return bool
     */
    public function update($reviewsId,array $data)
    {
        $reviews = array(
                'author'=>$data['author'],
                'product_id'=>$data['product_id'],
                'customer_id'=>$data['customer_id'],
                'text'=>$data['text'],
                'rating'=>$data['rating'],
                'status'=>$data['status']
                );

    $this->repo->update($reviewsId,$reviews);
    if(isset($data['store'])) {
        $review  = $this->repo->findById($reviewsId);
        $this->repo->storeReviewInStores($data['store'],$review);
        }
    return true;
    }
}