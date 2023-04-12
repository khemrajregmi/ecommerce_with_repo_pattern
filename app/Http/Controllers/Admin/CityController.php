<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/19/16
 * Time: 11:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\CityRequest;
use KerungRepo\Services\CityService;
use KerungRepo\Services\CountryService;
use KerungRepo\Services\StateService;
use KerungRepo\Services\AreaService;
use Kerung\Models\State;
use KerungRepo\Services\StoreService;

/**
 * Class CityController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class CityController extends Controller
{
     /**
     * City Service 
     *
     * @var object $service
     */
    private $service;

    /**
     * Country Service
     *
     * @var object $cService
     */
    protected $cService;

    /**
     * State Service
     *
     * @var object $stateService
     */
    protected $stateService;

    /**
     * Area Service
     *
     * @var object $areaService
     */
    protected $areaService;

    /**
     * StoreService Object
     *
     * @var object $storeService
     */
    private $storeService;

    /**
     * CityController constructor.
     * 
     * @param CityService $service
     * @param CountryService $countryService
     * @param StateService $stateService
     * @param AreaService $areaService
     * @param StoreService $storeService
     */
    public function __construct(CityService $service,
                                CountryService $countryService,
                                StateService $stateService,
                                AreaService $areaService,
                                StoreService $storeService)
    {
        $this->service = $service;
        $this->cService = $countryService;
        $this->stateService = $stateService;
        $this->areaService = $areaService;
        $this->storeService = $storeService;
    }

    public function create()
    {
        return view('admin.city.admin_add_city',
            ['countries'=> $this->cService->getAll()],
            ['states'=> $this->stateService->getAll()]
            );
    }


    /**
     * Add City index
     *
     * @return View
     */

    public function index(){
        return view('admin.city.admin_table_city',['cities'=> $this->service->getAll()]);
       

    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('admin.city.admin_edit_city',
            ['countries'=> $this->cService->getAll()],
            ['city'=>$this->service->getById($id)]);
        
    }

    /**
     * Update City Data
     *
     * @param CityRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CityRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.city.index');
    }

    /**
     * 
     * @param CityRequest $request
     */
    public function store(CityRequest $request) 
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.city.index');
    }

     /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function destroy($id)
    {
        $response= $this->areaService->hasChild('city_id',$id);
        $response1= $this->storeService->hasChild('city_id',$id);
        if(($response==null) && ($response1==null))
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';

    }

    /**
     * Get All States By Country Id
     *
     * @param $countryId
     * @return mixed
     */
     public function getAllStatesByCountryId($countryId)
    {
        return $this->service->getAllStatesByCountryId($countryId);
    }
}
