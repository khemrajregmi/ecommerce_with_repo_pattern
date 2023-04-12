<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/27/16
 * Time: 9:44 AM
 */

namespace Kerung\Http\Controllers\Admin;


use GuzzleHttp\Psr7\Request;
use Kerung\Http\Controllers\Controller;
use Route, Notify, Redirect;
use Kerung\Http\Requests\Admin\MakeStoreAdmin;
use Kerung\Http\Requests\Admin\MakeStoreAdminRequest;
use Kerung\Http\Requests\Admin\StoreUserRequest;
use Kerung\Http\Requests\Admin\UpdateUserRequest;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserRoleService;
use KerungRepo\Services\UserService;

/**
 * Class UserController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class UserController extends Controller
{
    /**
     * @var UserRoleService
     */
    private $service;

    /**
     * @var UserRoleService
     */
    private $userRoleService;

    /**
     * @var $storeService
     */
    protected $storeService;

    /**
     * UserController constructor.
     * @param UserService $userService
     * @param UserRoleService $userRoleService
     */
    public function __construct(UserService $userService, UserRoleService $userRoleService)
    {
        $this->service = $userService;
        $this->userRoleService = $userRoleService;
    }

    /**
     * User Index
     * @return mixed
     */
    public function index()
    {
        $users = $this->service->getAllUsers();
        return view('admin.user.admin_table_user', compact('users', $users));
    }

    /**
     * Create  User
     * @return mixed
     */
    public function create()
    {
        $roles = $this->userRoleService->getAllRoles();
        return view('admin.user.admin_add_user', compact('roles'));
    }


    /**
     * Store User
     * @param StoreUserRequest $userRequest
     * @return mixed
     */
    public function store(StoreUserRequest $userRequest)
    {
        $this->service->createUser($userRequest->all());
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.user.index');

    }

    /**
     * Edit User
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = $this->service->getUserById($id);
        $roles = $this->userRoleService->getAllRoles();
        return view('admin.user.admin_edit_user', compact('user', 'roles', $user, $roles));
    }

    /**
     * Update User
     *
     * @param UpdateUserRequest $userRequest
     * @param $id
     * @return mixed
     */
    public function update(UpdateUserRequest $userRequest, $id)
    {
        $data = $userRequest->all();
        $this->service->UpdateUserById($data, $id);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.user.index');
    }

    /**
     * Get Make User Store Admin
     *
     * @param $userId
     * @param StoreService $storeService
     * @return mixed
     */
    public function getMakeUserStoreAdmin($userId, StoreService $storeService)
    {
        $this->storeService = $storeService;
        $userFullName = $this->service->getFullNameByUserId($userId);
        $stores = $this->storeService->getAll();
        $user = $this->service->getUserById($userId);
        return view('admin.user.admin_add_store_admin',
            compact('stores', 'userFullName', 'userId', 'user', $stores, $userFullName, $userId, $user));
    }

    /**
     * Method to make user as admin of store
     *
     * @param MakeStoreAdminRequest $makeStoreAdminRequest
     * @param StoreService $storeService
     * @return mixed
     */
    public function makeOrRemoveUserAsStoreAdmin(
        MakeStoreAdminRequest $makeStoreAdminRequest,
        StoreService $storeService
    ) {
        $this->storeService = $storeService;
        if (isset($makeStoreAdminRequest->make)) {
            $this->service->makeUserStoreAdmin($makeStoreAdminRequest->all());
            $storeName = $this->storeService->getStoreNameByStoreId($makeStoreAdminRequest->store);
            Notify::success($makeStoreAdminRequest->fullName . ' is added as admin of ' . $storeName . ' Store');
            return Redirect::route('admin.user.index');
        } else {
            $this->service->removeUserStoreAdmin($makeStoreAdminRequest->all());
            $storeName = $this->storeService->getStoreNameByStoreId($makeStoreAdminRequest->store);
            Notify::success($makeStoreAdminRequest->fullName . ' is removed as admin of ' . $storeName . ' Store');
            return Redirect::route('admin.user.index');
        }
    }


    /**
     *
     * Destroy User
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return 'deleted';
    }

}