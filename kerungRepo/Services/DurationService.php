<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\DurationRepositoryInterface;

/**
 * Class DurationService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class DurationService extends BaseService
{
	/**
     * DurationService constructor.
     * @param DurationRepositoryInterface $repo
     */
    public function __construct(DurationRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithDurationAccToUser($user)
    {
        return $this->repo->getStoreWithDurationAccToUser($user);
    }


    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $durations = array(
                'name'=>$data['name']
                );
         
        $duration =  $this->repo->create($durations);
        $this->repo->storeDurationInStores($data['store'],$duration);
        return true;
    }


    /**
     * @param $DurationId
     * @param array $data
     * @return bool
     */
    public function update($DurationId,array $data)
    {
        $durations = array(
                'name'=>$data['name']
                );

    $this->repo->update($DurationId,$durations);
    $duration  = $this->repo->findById($DurationId);
    $this->repo->storeDurationInStores($data['store'],$duration);
    return true;
	}

}