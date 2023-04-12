<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/16/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\BannerRepositoryInterface;
use KerungRepo\Repository\BannerImageRepositoryInterface;

/**
 * Class BannerService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class BannerService extends BaseService
{
	/**
     * @var BannerRepositoryInterface
     */
    protected $bannerImageRepo;

	/**
     * BannerService constructor.
     * @param BannerRepositoryInterface $repo
     */
	
    public function __construct(BannerRepositoryInterface $repo,BannerImageRepositoryInterface $bannerImageRepositoryInterface)
    {
        $this->repo = $repo;
        $this->bannerImageRepo = $bannerImageRepositoryInterface;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
            // dd($data);
        $banners = array(
        'name'=>$data['name'],
        'status'=>$data['status']
        
        );
       $banner =  $this->repo->create($banners);
        if(isset($data['banner_image'])) {
            $this->bannerImageRepo->storeBannerImages($data['banner_image'], $banner->banner_id);
        }
        return true;
    }

     /**
     * @param $bannerId
     * @param array $data
     * @return bool
     */
    public function update($bannerId,array $data)
    {
        $banners = array(
        'name'=>$data['name'],
        'status'=>$data['status']
        
        );
       if($this->repo->update($bannerId,$banners))
     	{
       		if(isset($data['banner_image'])){
            	$this->bannerImageRepo->updateBannerImages($data['banner_image'],$bannerId);
        	}
    	}
        return true;
    }

    public function getBannerImagesByBannerId($bannerId)
    {
        return $this->bannerImageRepo->getBannerImagesByBannerId($bannerId);
    }
}