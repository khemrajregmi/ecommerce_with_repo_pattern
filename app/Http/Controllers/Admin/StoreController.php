<?php

namespace Kerung\Http\Controllers\Admin;


use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\StoreRequest;
use Notify;
use Redirect;
use KerungRepo\Services\StateService;
use KerungRepo\Services\CityService;
use KerungRepo\Services\AreaService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

/**
 * Class StoreController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class StoreController extends Controller
{
    /**
     * Store service
     *
     * @var StoreService
     */
    protected $service;

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
     * Area Service
     *
     * @var areaService
     */
    protected $areaService;

    /**
     * @var UserService
     */
    protected $userService;


    /**
     * StoreController constructor.
     *
     * @param StoreService $service
     * @param StateService $stateService
     * @param CityService $cityService
     * @param AreaService $areaService
     * @param UserService $userService
     */
    public function __construct(
        StoreService $service,
        StateService $stateService,
        CityService $cityService,
        AreaService $areaService,
        UserService $userService
    ) {
        $this->service = $service;
        $this->stateService = $stateService;
        $this->cityService = $cityService;
        $this->areaService = $areaService;
        $this->userService = $userService;
    }


    public function getStoreRelatedModelData()
    {
        return $data = array(
            'states' => $this->stateService->getAll(),
            'cities' => $this->cityService->getAll(),
            'areas' => $this->areaService->getAll()
        );
    }

    /**
     * Index View of Store
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.store.admin_table_store', ['stores' => $this->service->getStoreWithCityAndArea()]);
    }

    /**
     * Create Store
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.store.admin_add_store')->with($this->getStoreRelatedModelData());
    }

    /**
     * Store the Store Data
     *
     * @param StoreRequest $request
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $store = $this->service->store($data);
        
        //after store creation we add super admin automatically to the store 
        $this->addSuperAdminToStore($store->store_id);
        
        
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.store.index');
    }

    /**
     * Add Super Admin To Store On Store Creations
     *
     * @param $store_id
     */
    public function addSuperAdminToStore($store_id)
    {
        $data = [
            'store' => $store_id,
            'user_id' => 1,
        ];
        $this->userService->addSuperAdminToStore($data);
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.store.admin_edit_store',
            ['store' => $this->service->getById($id)])->with($this->getStoreRelatedModelData());
    }


    /**
     * Update Store Data
     *
     * @param StoreRequest $request
     * @param $id
     * @return mixed
     */
    public function update(StoreRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.store.index');
    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return 'deleted';
    }

}
