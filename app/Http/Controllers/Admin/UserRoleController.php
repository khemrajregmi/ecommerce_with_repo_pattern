<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/27/16
 * Time: 9:44 AM
 */

namespace Kerung\Http\Controllers\Admin;


use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\StoreUserRoleRequest;
use Kerung\Http\Requests\Admin\UpdateUserRoleRequest;
use KerungRepo\Services\UserRoleService;
use Route,Notify,Redirect;

/**
 * Class UserRoleController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class UserRoleController extends Controller
{
    /**
     * @var UserRoleService
     */
    private $service;

    /**
     * UserRoleController constructor.
     * @param UserRoleService $userRoleService
     */
    public function __construct(UserRoleService $userRoleService)
    {
        $this->service = $userRoleService;
    }

    /**
     * User Role Index
     *
     * @return mixed
     */
    public function index()
    {
        $roles = $this->service->getAllRoles();
        return view('admin.user.role.admin_table_role',compact('roles',$roles));
    }

    /**
     * Create User Role
     *
     * @return mixed
     */
    public function create()
    {
        $routeNames = $this->service->getAllRouteNames();
        return view('admin.user.role.admin_add_role',compact('routeNames'));
    }


    /**
     * Store User Role
     *
     * @param StoreUserRoleRequest $userRoleRequest
     * @return mixed
     */
    public function store(StoreUserRoleRequest $userRoleRequest)
    {
        $data = $userRoleRequest->all();
        $this->service->createRole($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.role.index');

    }

    /**
     * Edit User Role
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $role = $this->service->getRoleById($id);
        $routeNames = $this->service->getAllRouteNames();
        return view('admin.user.role.admin_edit_role',compact('role','routeNames',$role,$routeNames));
    }

    /**
     * Update User Role
     * 
     * @param UpdateUserRoleRequest $userRoleUpdateRequest
     * @param $id
     * @return mixed
     */
    public function update(UpdateUserRoleRequest $userRoleUpdateRequest,$id)
    {
        $data = $userRoleUpdateRequest->all();
        $this->service->UpdateRolesById($data,$id);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.role.index');
    }

}