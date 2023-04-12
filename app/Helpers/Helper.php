<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/20/16
 * Time: 11:48 AM
 */

namespace Kerung\Helpers;

use Route;
/**
 * Class Helper
 * @package Kerung\Helpers
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class Helper
{

    /**
     * Array of Ajax Routes
     *
     * @var array AjaxRoutes
     */
    public static $ajaxRoutes=['cities','areas','states','get_make_store_admin','make_or_remove_user_as_store_admin','getProducts','products'];

    /**
     * Array Search in multidimensional Array
     *
     * @param $needle
     * @param $haystack
     * @param bool $strict
     * @return bool
     */
    public static function in_array_r($needle, $haystack, $strict = false)
    {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && self::in_array_r($needle, $item,
                        $strict))
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Implode Array By Dot
     *
     * @param $array
     * @return mixed
     */
    public static function implodeArrayByDot(array $array)
    {
        return implode('.', $array);
    }


    /**
     * Get All Routes Name
     *
     * @return array
     */
    public static function getAllRouteNames()
    {
//        dd(self::getAllAdminAjaxRoute());
        foreach(Route::getRoutes() as $route)
        {
            if(substr($route->getName(),0,6)=='admin.')
            {
                $module = explode('.',$route->getName());
                $Routes[] = $module;
                $permissionRoutes[$module[1]][]=$module;

            }
        }
//        dd($permissionRoutes);
        return $permissionRoutes;


    }


    public static function getAllAdminAjaxRoute()
    {
        foreach(Route::getRoutes() as $route){
           if(strpos($route->getName(),'ajax') !== false){
             $adminAjaxRoute[] = $route->getName();

           }
        }
       return $adminAjaxRoute;

    }


    public static function getAjaxRouteArray()
    {
        $allAdminAjaxRoutes = self::getAllAdminAjaxRoute();
        $ajaxRouteArray = [];
       foreach($allAdminAjaxRoutes as $ajaxRoute)
       {
           $ajaxRoutes = explode('.',$ajaxRoute);
          $ajaxRouteArray[] = $ajaxRoutes[1];

       }
        return $ajaxRouteArray;
    }

    /**
     * Format Permission array as Required
     * @param array $permissions
     * @return array
     */
    public static function formatPermissionAsRequired(array $permissions)
    {
        $formattedPermission = [];
        foreach($permissions as &$p){
            $formattedPermission[$p] = true; // add true in each of the array value .
        }
        unset($permissions);
        return $formattedPermission;
    }
    /**
     * Make And Format Roles as Required
     *
     * @return array
     */
    public static function makeAndFormatRoles()
    {
        $routeNames = self::getAllRouteNames();
        foreach($routeNames as $key=>$value)
        {
            foreach($value as $permission) {
                $permissions[] = self::implodeArrayByDot($permission);
            }

        }
        return self::formatPermissionAsRequired(array_merge($permissions,self::$ajaxRoutes));
    }
}