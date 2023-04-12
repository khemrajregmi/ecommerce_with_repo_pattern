<?php

namespace Kerung\Http\Controllers\Admin;


use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\ComboTypeService;
use Kerung\Http\Requests\Admin\ComboTypeRequest;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;
use KerungRepo\Services\ComboOfferService;
use Notify;
use Redirect;

class ComboTypeController extends Controller
{
    /**
     * @var ComboTypeService
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
     *  Comboffer  Object
     *
     * @var $userService
     */
    protected $comboOfferService;

    /**
     * ComboTypeController constructor.
     * @param ComboTypeService $service
     * @param StoreService $storeService
     * @param UserService $userService
     */
    public function __construct(ComboTypeService $service,
                                StoreService $storeService,
                                UserService $userService,
                                ComboOfferService $comboOfferService)
    {
        $this->service = $service;
        $this->storeService = $storeService;
        $this->userService = $userService;
        $this->comboOfferService = $comboOfferService;
    }


    /**
     * Get All Data Related To Combo Type
     *
     * @return array
     */
    public function getComboTypeRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = 
        array(
            'userComboType' => $this->service->getStoreWithComboTypeAccToUser($user),
            'combotypes' => $this->service->getAll(),
            'stores' => $this->storeService->getStoreAccToUser($user)
        );
    }

    /**
     * Create Combo Type
     *
     * @return mixed
     */
    public function create(){
        return view('admin.combotype.admin_add_combotype')
                ->with($this->getComboTypeRelatedModelData());
    }





    /**
     * List ComboType index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.combotype.admin_table_combotype')
                ->with($this->getComboTypeRelatedModelData());
    }


    /**
     * Edit Combo Type
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.combotype.admin_edit_combotype',
            ['comboType' => $this->service->getById($id)])
            ->with($this->getComboTypeRelatedModelData());
    }


    /**
     * Store Combo Type
     *
     * @param ComboTypeRequest $request
     * @return mixed
     */
    public function store(ComboTypeRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.combotype.index');
    }

    /**
     * Update Combo Type
     *
     * @param ComboTypeRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ComboTypeRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.combotype.index');
    }

    /**
     * Destroy Combo Type
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->comboOfferService->hasChild('combo_type_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }
}
