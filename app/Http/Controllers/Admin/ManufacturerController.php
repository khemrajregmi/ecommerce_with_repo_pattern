<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/31/16
 * Time: 10:55 AM
 */

namespace Kerung\Http\Controllers\Admin;


use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\ManufacturerRequest;
use KerungRepo\Services\ManufacturerService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;
use KerungRepo\Services\ProductService;
use Jleon\LaravelPnotify\Notify;
use Redirect;

class ManufacturerController extends Controller
{
    /**
     *
     * @var ManufacturerService
     */
    protected $service;

    /**
     *  Stote  Object
     *
     * @var object $storeService
     */
    protected $storeService;

    /**
     *  user  Object
     *
     * @var $userService
     */
    protected $userService;

     /**
     *  Product  Object
     *
     * @var $productService
     */
    protected $productService;


     /**
     * Manufacturer constructor.
     * @param Manufacturer $service
     * @param StoreService $storeService
     * @param UserService $userService
     * @param ProductService $productService
     */
    public function __construct(
                                ManufacturerService $service,
                                StoreService $storeService,
                                UserService $userService,
                                ProductService $productService)
    {
        $this->service = $service;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->productService = $productService;
    }

    /**
     * Get All Data Related To Manufacturer
     *
     * @return array
     */
    public function getManufacturerRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userManufacturers' => $this->service->getStoreWithManufacturerAccToUser($user),
            'manufacturers' => $this->service->getAll(),
            'stores' => $this->storeService->getStoreAccToUser($user)
        );
    }


    /**
     * Index View of Manufacturer
     *
     * @return mixed
     */
    public function index()
    {

        return view('admin.manufacturer.admin_table_manufacturer')->with($this->getManufacturerRelatedModelData());
    }

    /**
     * Create Manufacturer
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.manufacturer.admin_add_manufacturer')->with($this->getManufacturerRelatedModelData());
    }

    /**
     * Update Manufacturer
     *
     * @param ManufacturerRequest $request
     * @return mixed
     */
    public function store(ManufacturerRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.manufacturer.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.manufacturer.admin_edit_manufacturer', ['manufacturer' => $this->service->getById($id)])->with($this->getManufacturerRelatedModelData());
    }


    /**
     * Update Manufacturer Data
     *
     * @param ManufacturerRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ManufacturerRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.manufacturer.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->productService->hasChild('manufacturer_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

}