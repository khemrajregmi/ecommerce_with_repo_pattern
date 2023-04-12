<?php


/**
 * Created by sublime.
 * User: khem
 * Date: 8/31/16
 * Time: 3:49 AM
 */

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\ReviewRequest;
use KerungRepo\Services\ReviewService;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\UserService;

/**
 * Class ReviewController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regimi <khemrr067@gmail.com>
 */
class ReviewController extends Controller
{
    /**
     * 
     * Service Object
     *
     * @var object $service
     */
    protected $service;

    /**
     * 
     * Product Object
     *
     * @var object $pService
     */
    protected $pService;

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
     * Review constructor.
     *
     * @param ReviewService $service
     * @param ProductService $productservice
     */
    public function __construct(
                                ReviewService $service,
                                 ProductService $productservice,
                                StoreService $storeService,
                                UserService $userService)
    {
        $this->service = $service;
        $this->pService = $productservice;
        $this->storeService = $storeService;
        $this->userService = $userService;
    }


     /**
     * Get All Data Related To Review
     *
     * @return array
     */
    public function getReviewRelatedModelData()
    {
        $user = $this->userService->getUser();
        $stores = $this->storeService->getStoreAccToUser($user);
        return $data = 
        array(
            'userReviews' => $this->service->getStoreWithReviewAccToUser($user),
            'reviews' => $this->service->getAll(),
            'stores' => $stores,
            'products' => $this->pService->getProductAccToStore($stores)
        );
    }

    /**
     * Add Review Create
     *
     * @return View
     */
    public function create()
    {
        return view('admin.review.admin_add_review')->with($this->getReviewRelatedModelData());
    }


    /**
     * List Review index
     *
     * @return View
     */

    public function index()
    {
        return view('admin.review.admin_table_review')->with($this->getReviewRelatedModelData());
    }


    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.review.admin_edit_review', 
            ['review' => $this->service->getById($id)])->with($this->getReviewRelatedModelData());
    }

    /**
     *
     * @param ReviewRequest $request
     */
    public function store(ReviewRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.review.index');

    }

    /**
     * Update Review Data
     *
     * @param ReviewRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ReviewRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id,$data);
         Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.review.index');
    }

    /**
     *Update Review Data
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
