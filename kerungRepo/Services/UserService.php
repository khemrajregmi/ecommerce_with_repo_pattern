<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/21/16
 * Time: 11:51 AM
 */

namespace KerungRepo\Services;

use Cartalyst\Sentinel\Sentinel;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Session;

/**
 * Class UserService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class UserService
{

    /**
     * @var Sentinel
     */
    protected $sentinel;


    /**
     * @var $errors
     */
    private $errors;

    /**
     * UserService constructor.
     * @param Sentinel $sentinel
     */
    public function __construct(Sentinel $sentinel)
    {
        $this->sentinel = $sentinel;
    }

    /**
     * @param array $credentials
     * @return bool
     */
    public function authenticate(array $credentials)
    {
        try {
            if ($this->sentinel->authenticateAndRemember($credentials)) {
                return true;
            } else {
                $this->errors = 'Invalid Credentials';
            }
        } catch (\Exception $e) {
            if ($e instanceof NotActivatedException) {
                $this->errors = 'Account Not Activated';
            }
        }
        return $this->errors;

    }


    /**
     * LogsOut User
     * @return bool
     */
    public function getLogout()
    {
        $this->sentinel->logout(null, true);
        return true;
    }


    /**
     * Create Users
     *
     * @param array $users
     * @return mixed
     */
    public function createUser(array $users)
    {
        $user = $this->sentinel->registerAndActivate($users);
        if (isset($users['role_id'])) {
            $user->roles()->sync($users['role_id']);
        }

    }


    /**
     * Get All users
     *
     * @return mixed
     */
    public function getAllUsers()
    {
        return $this->sentinel->getUserRepository()->all();
    }

    /**
     * Get User By User Id
     *
     * @param $id
     * @return \Cartalyst\Sentinel\Users\UserInterface
     */
    public function getUserById($id)
    {
        return $this->sentinel->getUserRepository()->findById($id);
    }

    /**
     * Update User By Id
     *
     * @param $userData
     * @param $id
     */
    public function UpdateUserById($userData, $id)
    {

        $user = $this->sentinel->findById($id);
        $this->sentinel->update($user, $userData);
        if (isset($userData['role_id'])) {
            $user->roles()->sync($userData['role_id']);
        }

    }

    /**
     * Get User Full Name
     *
     * @param $userId
     * @return string
     */
    public function getFullNameByUserId($userId)
    {
        $user = $this->getUserById($userId);
        return $user->first_name . ' ' . $user->last_name;
    }

    /**
     * Make a user as Store Admin
     *
     * @param array $data
     */
    public function makeUserStoreAdmin(array $data)
    {
        $user = $this->getUserById($data['user_id']);
        $user->Store()->sync($data['store']);
    }


    /**
     * Remove User as Store Admin
     *
     * @param array $data
     */
    public function removeUserStoreAdmin(array $data)
    {
        $user = $this->getUserById($data['user_id']);
        $user->Store()->sync($data['store']);

    }


    /**
     * Add Super Admin To Store On Store Creations
     * 
     * @param $data
     */
    public function addSuperAdminToStore($data)
    {
        $user = $this->getUserById($data['user_id']);
        $user->Store()->sync($data);
    }


    /**
     * Get User
     *
     * @return \Cartalyst\Sentinel\Users\UserInterface
     */
    public function getUser()
    {
        return $this->sentinel->getUser();
    }


    /**
     * @param $id
     */
    public function destroy($id)
    {
        $roles = $this->sentinel->getUserRepository()->findById($id)->roles;
        $user = $this->sentinel->getUserRepository()->findById($id);
        foreach ($roles as $role) {
            $role->users()->detach($user);
        }
        $user->delete();

    }
}