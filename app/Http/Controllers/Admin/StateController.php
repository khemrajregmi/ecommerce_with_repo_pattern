<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\StateRequest;
use KerungRepo\Services\StateService;
use KerungRepo\Services\CountryService;
use KerungRepo\Services\CityService;
use KerungRepo\Services\AreaService;
use KerungRepo\Services\StoreService;

class StateController extends Controller
{
    /**
     * Service Object of State
     *
     * @var object $service
     */
    private $service;

    /**
     * Service Object of Country
     *
     * @var object $service
     */
    private $cService;

    /**
     * Service Object of City
     *
     * @var object $cityService
     */
    private $cityService;

    /**
     * Service Object of Area
     *
     * @var object $areaService
     */
    private $areaService;

    /**
     * StoreService Object
     *
     * @var object $storeService
     */
    private $storeService;

    /**
     * StateController constructor.
     * @param StateService $service
     * @param CountryService $contryService
     * @param CityService $cityService
     * @param AreaService $areaService
     * @param StoreService $storeService
     */
    public function __construct(
    	StateService $service,
    	CountryService $countryService,
        CityService $cityService,
        AreaService $areaService,
        StoreService $storeService)
    {
        $this->service = $service;
        $this->cService = $countryService;
        $this->cityService = $cityService;
        $this->areaService = $areaService;
        $this->storeService = $storeService;
    }

    /**
     * Add State index
     *
     * @return View
     */

    public function create()
    {
        return view('admin.state.admin_add_state',
        	['state'=> $this->service->getAll()],
        	['countries'=> $this->cService->getAll()]
        	);
    }


    /**
     *  State List
     *
     * @return View
     */

    public function index(){
        return view('admin.state.admin_table_state',
        	['states'=> $this->service->getAll()]
        	);
       

    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('admin.state.admin_edit_state',
        										['state'=>$this->service->getById($id)],
        										['countries'=> $this->cService->getAll()]
        										);
        
    }

    /**
     * Update State Data
     *
     * @param StateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(StateRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.state.index');
    }

    /**
     * Store the State List
     * 
     * @param StateRequest $request
     */
    public function store(StateRequest $request) 
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.state.index');
    }

     /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function destroy($id)
    {
        $response= $this->cityService->hasChild('state_id',$id);
        $response2= $this->areaService->hasChild('state_id',$id);
        $response1= $this->storeService->hasChild('state_id',$id);
        if(($response==null) && ($response1==null) && ($response2==null))
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
