<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/27/16
 * Time: 9:54 AM
 */

namespace KerungRepo\Services;


use Cartalyst\Sentinel\Sentinel;
use Faker\Provider\Base;
use Illuminate\Support\Facades\Route;
use Kerung\Helpers\Helper;

class UserRoleService
{

    /**
     * @var Sentinel
     * @var Sentinel
     */
    private $sentinel;

    /**
     * UserRoleService constructor.
     * @param Sentinel $sentinel
     */
    public function __construct(Sentinel $sentinel)
    {
        $this->sentinel = $sentinel;
    }


    /**
     * Create Role
     *
     * @param array $roles
     * @return mixed
     */
    public function createRole(array $roles)
    {
        $roles['slug'] = str_slug('-'.$roles['name']);
        if(isset($roles['permissions'])) {
            $roles['permissions'] = $this->formatPermissionAsRequired(array_merge($roles['permissions'],Helper::getAllAdminAjaxRoute())); // here we merge the ajax route that needs default permissions
        }
       return $this->sentinel->getRoleRepository()->createModel()->fill($roles)->save();
    }

    /**
     * Format Permission array as Required
     *
     * @param array $permissions
     * @return array
     */
    public function formatPermissionAsRequired(array $permissions)
    {
       return Helper::formatPermissionAsRequired($permissions);
    }



    /**
     * Get All Routes Name
     *
     * @return array
     */
    public function getAllRouteNames()
    {

        return Helper::getAllRouteNames();

    }

    /**
     * Get All Roles
     *
     * @return mixed
     */
    public function getAllRoles()
    {
        return $this->sentinel->getRoleRepository()->where('id','!=',1)->get();
    }

    /**
     * Get Role by Id
     * 
     * @param $id
     * @return \Cartalyst\Sentinel\Roles\RoleInterface
     */
    public function getRoleById($id)
    {
        return $this->sentinel->getRoleRepository()->findById($id);
    }

    /**
     * Update User Roles By Id
     *
     * @param $roles
     * @param $id
     */
    public function UpdateRolesById($roles,$id)
    {
        $roleModel = $this->sentinel->getRoleRepository();
        $roles['slug'] = str_slug('-'.$roles['name']);
        $roles['permissions'] = $this->formatPermissionAsRequired(array_merge($roles['permissions'],Helper::getAllAdminAjaxRoute())); // here we merge the ajax route that needs default permissions
        $roleModel->find($id)->update($roles);
    }

}