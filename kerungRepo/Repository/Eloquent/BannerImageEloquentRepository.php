<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/16/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\BannerImage;
use KerungRepo\Repository\BannerImageRepositoryInterface;
/**
 * Class BannerImageEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class BannerImageEloquentRepository extends BaseEloquentRepository implements BannerImageRepositoryInterface
{
    /**
     * BannerImageEloquentRepository constructor.
     *  
     * @param BannerImage $bannerimage
     */
    public function __construct(BannerImage $bannerimage)
    {
        $this->model = $bannerimage;
    }

    /**
     * Store Banner Images
     *
     * @param $bannerImages
     * @param $bannerId
     */
    public function storeBannerImages($bannerImages,$bannerId)
    {
        foreach($bannerImages as $bi)
        {
            $this->model->create([
                  'banner_id' => $bannerId,
	              'title' => $bi['title'],
	              'link' => $bi['link'],
	              'image' => $bi['image'],
	              'sort_order' => $bi['sort_order']
            ]);
        }
    }


    /**
     * Update Banner Images
     * 
     * @param $bannerImages
     * @param $bannerId
     */
    public function updateBannerImages($bannerImages,$bannerId)
    {
        $this->model->where('banner_id','=',$bannerId)->delete();
        foreach($bannerImages as $bi)
        {
            $this->model->create([
                  'banner_id' => $bannerId,
	              'title' => $bi['title'],
	              'link' => $bi['link'],
	              'image' => $bi['image'],
	              'sort_order' => $bi['sort_order']
            ]);
        }
    }

    /**
     * Get Banner Images By Banner ID
     * 
     * @param $bannerId
     * @return mixed
     */
    public function getBannerImagesByBannerId($bannerId)
    {
        return $this->model->where('banner_id','=',$bannerId)->get();
    }
    
}