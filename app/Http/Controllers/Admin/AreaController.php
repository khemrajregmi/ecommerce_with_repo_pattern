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
use Kerung\Http\Requests\Admin\AreaRequest;
use KerungRepo\Services\CityService;
use KerungRepo\Services\AreaService;
use KerungRepo\Services\StateService;
use KerungRepo\Services\StoreService;

/**
 * Class AreaController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class AreaController extends Controller
{
     /**
     * Area Service 
     *
     * @var object $service
     */
    private $service;

    /**
     * City Service
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
     * StoreService Object
     *
     * @var object $storeService
     */
    private $storeService;

    /**
     * AreaController constructor.
     *
     * @param AreaService $service
     * @param CityService $cityService
     * @param StateService $stateService
     * @param StoreService $storeService
     */
    public function __construct(AreaService $service,
                                CityService $cityService,
                                StateService $stateService,
                                StoreService $storeService)
    {
        $this->service = $service;
        $this->cService = $cityService;
        $this->stateService = $stateService;
        $this->storeService = $storeService;
    }

    public function create()
    {
        return view('admin.area.admin_add_area',
            ['cities'=> $this->cService->getAll()],
            ['states'=> $this->stateService->getAll()]
            );
    }


    /**
     * Add Area index
     *
     * @return View
     */

    public function index(){
        return view('admin.area.admin_table_area',['areas'=> $this->service->getAll()]);
       

    }

    /**
     * Edit Area Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('admin.area.admin_edit_area',
            ['area'=>$this->service->getById($id)],
            ['states'=> $this->stateService->getAll()]);
        
    }

    /**
     * Update Area Data
     *
     * @param AreaRequest $request
     * @param $id
     * @return mixed
     */
    public function update(AreaRequest $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.area.index');
    }

    /**
     * 
     * @param AreaRequest $request
     */
    public function store(AreaRequest $request) 
    {
        $data = $request->all();
        // dd($data);
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.area.index');
    }

     /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function destroy($id)
    {
        $response= $this->storeService->hasChild('location_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }


    /**
     * Get All City By State ID
     * @param $stateId
     * @return mixed
     */
    public function getAllCityByStateId($stateId)
    {
        $city_list = $this->service->getAllCityByStateId($stateId);
        return $city_list;
    }

    /**
     * Get All Areas By City ID
     * @param $stateId
     * @return mixed
     */
    public function getAllAreaByCityId($stateId)
    {
        $area_list = $this->service->getAllAreaByCityId($stateId);
        return $area_list;
    }
}
