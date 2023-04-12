<?php

namespace Kerung\Http\Controllers\Admin;


use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Repository\ComboOfferRepositoryInterface;
use Kerung\Http\Requests\Admin\ComboOfferRequest;
use KerungRepo\Services\CategoryService;
use KerungRepo\Services\ComboOfferService;
use KerungRepo\Services\ComboTypeService;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;
use Notify;
use Redirect;

class ComboOfferController extends Controller
{
    /**
     * @var ComboOfferRepositoryInterface
     */
    protected $service;

    /**
     * @var ComboTypeService
     */
    protected $comboTypeService;

    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @var ProductService
     */
    protected $productService;

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
     * ComboOfferController constructor.
     *
     * @param ComboOfferService $service
     * @param ComboTypeService $comboTypeService
     * @param CategoryService $categoryService
     * @param ProductService $productService
     * @param StoreService $storeService
     * @param UserService $userService
     */
    public function __construct(ComboOfferService $service,
                                ComboTypeService $comboTypeService,
                                CategoryService $categoryService,
                                ProductService $productService,
                                StoreService $storeService,
                                UserService $userService)
    {
        $this->service = $service;
        $this->comboTypeService = $comboTypeService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->storeService = $storeService;
        $this->userService = $userService;
    }


    public function getComboOfferRelatedModelData()
    {
        $user = $this->userService->getUser();
        return $data = [
            'products' => $this->productService->getAll(),
            'categories'  => $this->categoryService->getAll(),
            'comboTypes' => $this->comboTypeService->getAll(),
            'userComboOffer' => $this->service->getStoreWithComboOfferAccToUser($user),
            'stores' => $this->storeService->getStoreAccToUser($user),
            'comboOffers' => $this->service->getComboOfferWithType(),
            'combooffers' => $this->service->getAll()
        
        ];
    }

    /**
     * List combo Offer index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.combooffer.admin_table_combooffer')
                ->with($this->getComboOfferRelatedModelData());
    }


    /**
     * Create Combo Offer
     *
     * @return mixed
     */
    public function create(){
        return view('admin.combooffer.admin_add_combooffer')
        ->with($this->getComboOfferRelatedModelData());
    }



    /**
     * Edit Combo Type
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $comboOffer = $this->service->getById($id);
        return view('admin.combooffer.admin_edit_combooffer')
        ->with('comboOffer',$comboOffer)
        ->with($this->getComboOfferRelatedModelData());
    }


    /**
     * Store Combo Offer
     *
     * @param ComboOfferRequest $request
     * @return mixed
     */
    public function store(ComboOfferRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.combooffer.index');
    }

    /**
     * Update Combo Offer Request
     * 
     * @param ComboOfferRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ComboOfferRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.combooffer.index');
    }

    /**
     * Destroy Combo Type
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
