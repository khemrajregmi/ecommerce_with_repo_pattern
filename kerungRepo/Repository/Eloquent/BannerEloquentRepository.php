<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/16/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\Banner;
use KerungRepo\Repository\BannerRepositoryInterface;
/**
 * Class BannerEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class BannerEloquentRepository extends BaseEloquentRepository implements BannerRepositoryInterface
{
    /**
     * BannerEloquentRepository constructor.
     *  
     * @param Banner $banner
     */
    public function __construct(Banner $banner)
    {
        $this->model = $banner;
    }


    
}