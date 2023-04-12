<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/07/16
 * Time: 11:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\CountryRequest;
use KerungRepo\Services\CityService;
use KerungRepo\Services\CountryService;
use KerungRepo\Services\StateService;
use KerungRepo\Services\StoreService;


/**
 * Class CountryController
 * @package app\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class CountryController extends Controller
{
    /**
     * Service Object
     *
     * @var object $service
     */
    private $service;

     /**
     * CityService Object
     *
     * @var object $cityService
     */
    private $cityService;


     /**
     * StateService Object
     *
     * @var object $stateService
     */
    private $stateService;

    /**
     * StoreService Object
     *
     * @var object $storeService
     */
    private $storeService;


    /**
     * CountryController constructor.
     * @param CountryService $service
     * @param CityService $cityService
     * @param StateService $stateService
     * @param StoreService $storeService
     */
    public function __construct(CountryService $service,
                                CityService $cityService,
                                StateService $stateService,
                                StoreService $storeService)
    {
        $this->service = $service;
        $this->cityService = $cityService;
        $this->stateService = $stateService;
        $this->storeService = $storeService;
    }

    /**
     * Add country index
     *
     * @return View
     */

    public function create()
    {
        return view('admin.country.admin_add_country',['country'=> $this->service->getAll()]);
    }


    /**
     * Country List
     *
     * @return View
     */

    public function index(){
        return view('admin.country.admin_table_country',['countries'=> $this->service->getAll()]);
       

    }

    /**
     * Edit Country Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('admin.country.admin_edit_country',[
                                                'country'=>$this->service->getById($id)
                                                ]);
        
    }

    /**
     * Update Country Data
     *
     * @param CountryRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CountryRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.country.index');
    }

    /**
     * 
     * @param CountryRequest $request
     */
    public function store(CountryRequest $request) 
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.country.index');
    }

     /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function destroy($id)
    {
        $response1= $this->cityService->hasChild('country_id',$id);
        $response2= $this->stateService->hasChild('country_id',$id);
        if(($response1==null) && ($response2==null))
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

}
