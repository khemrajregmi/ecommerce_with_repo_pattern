<?php

/**
 * Created by Sublime.
 * User: Khem
 * Date: 21/04/16
 * Time: 11:49 AM
 */
namespace Kerung\Http\Controllers\Home\Customer;

use Illuminate\Http\Request;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\CountryService;
use Kerung\Http\Requests\Home\AddressRequest;
use KerungRepo\Services\StateService;
use KerungRepo\Services\CityService;
use KerungRepo\Services\AddressService;
use Auth;
use Session;

/**
 * Class CustomerController
 *
 * @package Kerung\Http\Controllers\Home\Customer
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class AccountController extends Controller
{

	/**
	 * @var AddressService
     */
    protected $service;

   /**
     * Country Service
     *
     * @var countryService
     */
    protected $countryService;

    /**
     * State Service
     *
     * @var stateService
     */
    protected $stateService;


    /**
     * City Service
     *
     * @var cityService
     */
    protected $cityService;

    
    /**
     * CustomerController constructor.
     *
     * @param CountryService $countryService
     * @param StateService $stateService
     * @param CityService $cityService
     * @param AddressService $service
     */
    public function __construct(
                AddressService $service,
                CountryService $countryService,
                StateService $stateService,
                CityService $cityService)
    {
        $this->stateService = $stateService;
        $this->cityService = $cityService;
        $this->countryService = $countryService;
        $this->service = $service;
    }

    /**
     * Get Address Related Model
     *
     **/
    public function getAddressRelatedModelData()
    {
        return $data = array(
            'states' => $this->stateService->getAll(),
            'cities' => $this->cityService->getAll(),
            'countries' => $this->countryService->getAll()
        );
    }

    /**
     * Get Customer Account
     *
     * @return mixed
     */
    public function account()
    {	
    	$addresses = $this->service->getAddressByCustomerID(Auth::user()->customer_id);
    	// dd($addresses);
        return view('home.customer.account')
        ->with($this->getAddressRelatedModelData())
        ->with('addresses',$addresses );
    }

     /**
     * Customer's Address Add
     * @param AddressRequest $request
     * @return mixed
     */
    public function addAddress(AddressRequest $request)
    {
        $data= $request->all();
        $data['customer_id'] = Auth::user()->customer_id;
        $this->service->store($data);
        return response()->json(['message'=>'success']);
    }


     /**
     * Update Customer Address
     * 
     * @param AddressRequest $request
     * @return mixed
     */
    public function updateAddress(AddressRequest $request)
    {   
        $id=$request->address_id;
        $data= $request->all();
        $data['customer_id'] = Auth::user()->customer_id;
        $this->service->update($id, $data);
        return response()->json(['message'=>'success']);
    }


    /**
     * Customer's Address Delete
     * @param Request $request
     * @return mixed
     */
    public function deleteAddress(Request $request)
    {
        $data= $request->all();
        $id = $request->addressID;
        $this->service->destroy($id);
        return 'true';
    }


    public function getCustomerAddress(Request $request)
    {
        $id = $request->addressId;
        $data = $this->service->getById($id);
        $data['company'] = $data->Customer->name;
        $data['country'] = $data->Country->name;
        $data['state'] = $data->State->name;
        $data['city'] = $data->City->name;
        $data['area'] = $data->Area->name;
        return $data;
    }

}
