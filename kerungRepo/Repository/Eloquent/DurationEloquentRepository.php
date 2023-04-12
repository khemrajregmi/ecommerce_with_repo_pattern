<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/12/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Duration;
use KerungRepo\Repository\DurationRepositoryInterface;

class DurationEloquentRepository extends BaseEloquentRepository implements DurationRepositoryInterface
{
    /**
     * DurationEloquentRepository constructor.
     *  
     * @param Duration $customer_group
     */
    public function __construct(Duration $customer_group)
    {
        $this->model = $customer_group;
    }


    /**
     * @param $DurationId
     * @param $Duration
     * @return mixed
     */
    public function storeDurationInStores($durationId, $duration)
    {  
        return  $duration->Store()->sync($durationId);
    }


    /**
     * Get Store With Duration Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithDurationAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['durations'] = $value->durations()->get();
            }
            return $stores;
    }

    
}