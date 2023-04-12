<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/16/16
 * Time: 02:00 PM
 */

namespace KerungRepo\Repository;


/**
 * Interface BannerImage
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface BannerImageRepositoryInterface
{
	/**
     * @param $bannerImages
     * @param $bannerId
     * @return mixed
     */
    public function storeBannerImages($bannerImages,$bannerId);
    /**
     * @param $bannerId
     * @return mixed
     */
    public function getBannerImagesByBannerId($bannerId);

    /**
     * Update Banner
     * @param $bannerImages
     * @param $bannerId
     * @return mixed
     */
    public function updateBannerImages($bannerImages,$bannerId);
}