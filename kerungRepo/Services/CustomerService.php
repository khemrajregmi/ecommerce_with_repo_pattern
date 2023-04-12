<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\CustomerRepositoryInterface;
use Auth;


/**
 * Class CustomerService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CustomerService extends BaseService
{
    /**
     * CustomerService constructor.
     * @param CustomerRepositoryInterface $repo
     */
    public function __construct(CustomerRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCustomerAccToUser($user)
    {
        return $this->repo->getStoreWithCustomerAccToUser($user);
    }

    /**
     * Get Products By Customer Id
     *
     * @param $id
     * @return mixed
     */
    public function getProductsByCustomerId($id)
    {
        return $this->repo->getProductsByCustomerId($id);
    }

    /**
     * Authenticate User
     *
     * @param array $credentials
     * @return bool
     */
    public function authenticate(array $credentials)
    {

            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
                return true;
            } else {
                $this->errors = 'Invalid Credentials';
            }

    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCustomerFamilyTypeAccToUser($user)
    {
        return $this->repo->getStoreWithCustomerFamilyTypeAccToUser($user);
    }


    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {(!isset($data['image'])) ? $data['image']='' : $data['image'];
        (!isset($data['store_id'])) ? $data['store_id']=1 : $data['store_id'];

        $customers_data = array(
                'customer_group_id'=>(!isset($data['customer_group_id'])) ? $data['customer_group_id']='' : $data['customer_group_id'],
                'firstname'=>(!isset($data['firstname'])) ? $data['firstname']='' : $data['firstname'],
                'lastname'=>(!isset($data['lastname'])) ? $data['lastname']='' : $data['lastname'],
                'email'=>(!isset($data['email'])) ? $data['email']='' : $data['email'],
                'telephone'=>(!isset($data['telephone'])) ? $data['telephone']='' : $data['telephone'],
                'fax'=>(!isset($data['fax'])) ? $data['fax']='' : $data['fax'],
                'password'=>(!isset($data['password'])) ? $data['password']='' : $data['password'],
                'newsletter'=>(!isset($data['newsletter'])) ? $data['newsletter']='' : $data['newsletter'],
                'status'=>(!isset($data['status'])) ? $data['status']='' : $data['status'],
                'approved'=>(!isset($data['approved'])) ? $data['approved']='' : $data['approved'],
                'safe'=>(!isset($data['safe'])) ? $data['safe']='' : $data['safe'],
                'remember_token'=>(!isset($data['remember_token'])) ? $data['remember_token']='' : $data['remember_token'],
                'image'=>(!isset($data['image'])) ? $data['image']='' : $data['image']
                );
         
        $customer =  $this->repo->create($customers_data);
        if (isset($data['store'])) {
            $this->repo->storeCustomerInStores($data['store'],$customer);
        }
        return true;
    }


    /**
     * @param $customerId
     * @param array $data
     * @return bool
     */
    public function update($customerId,array $data)
    {
        $customers_data = array(
                'customer_group_id'=>$data['customer_group_id'],
                'firstname'=>$data['firstname'],
                'lastname'=>$data['lastname'],
                'email'=>$data['email'],
                'telephone'=>$data['telephone'],
                'fax'=>$data['fax'],
                'password'=>bcrypt($data['password']),
                'status'=>$data['status'],
                'newsletter'=>$data['newsletter'],
                'approved'=>$data['approved'],
                'safe'=>$data['safe'],
                );

    $this->repo->update($customerId,$customers_data);
    if (isset($data['store'])) {
        $customer  = $this->repo->findById($customerId);
        $this->repo->storeCustomerInStores($data['store'],$customer);
    }
    return true;
    }


    /**
     * @param $customerId
     * @param array $data
     * @return bool
     */
    public function updateCustomer($customerId,array $data)
    {
        $customers_data = array(
                'customer_group_id'=>$data['customer_group_id'],
                'firstname'=>$data['firstname'],
                'lastname'=>$data['lastname'],
                'email'=>$data['email'],
                'telephone'=>$data['telephone']
                );

    $this->repo->update($customerId,$customers_data);
    if (isset($data['store'])) {
        $customer  = $this->repo->findById($customerId);
        $this->repo->storeCustomerInStores($data['store'],$customer);
    }
    return true;
    }

    /**
     * @param $customerId
     * @param array $data
     * @return bool
     */
    public function updateCustomerPassword($customerId,array $data)
    {
        $customers_data = array(
                'password'=>bcrypt($data['password'])
                );

    $this->repo->update($customerId,$customers_data);
    return true;
    }

     /**
     * @param $customerId
     * @param array $data
     * @return bool
     */
    public function newletterSubsciption($customerId,array $data)
    {
        $this->repo->update($customerId,$data);
        return true;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function storeSingUpCustomer(array $data)
    {
        // dd($data);
        return $this->repo->create($data);
    }

    /**
     * @param array $data
     * @param $customerId
     * @return mixed
     */
    public function imageUpdate($customerId,array $data)
    {
        return $this->repo->update($customerId, $data);
    }


    /**
     * @param array $data
     * @param $customerId
     * @return mixed
     */
    public function familySizeWishlistUpdate($customerId,array $data)
    {
        return $this->repo->update($customerId, $data);
    }


}