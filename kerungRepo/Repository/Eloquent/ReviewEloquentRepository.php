<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/31/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Review;
use KerungRepo\Repository\ReviewRepositoryInterface;

class ReviewEloquentRepository extends BaseEloquentRepository implements ReviewRepositoryInterface
{
    /**
     * ReviewEloquentRepository constructor.
     *  
     * @param Review $review
     */
    public function __construct(Review $review)
    {
        $this->model = $review;
    }


    /**
     * Get Review ProductWise
     *
     * @param $id
     * @return mixed
     */
    public function getReview($id)
    {
    	return $this->model->where([
                                    ['product_id', '=', $id],
                                    ['status', '=', 1]
                                ])->get();
    }

    /**
     * Get Store With Review Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithReviewAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['reviews'] = $value->reviews()->get();
            }
            return $stores;
    }

    /**
     * @param $reviewId
     * @param $review
     * @return mixed
     */
    public function storeReviewInStores($reviewId, $review)
    {
     return  $review->Store()->sync($reviewId);
    }

    
}