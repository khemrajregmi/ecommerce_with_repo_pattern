<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/24/16
 * Time: 10:49 AM
 */

namespace Kerung\Http\Controllers\Admin;


use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\CategoryRequest;
use KerungRepo\Services\CategoryService;
use KerungRepo\Services\ComboOfferService;

/**
 * Class CategoryController
 * @package app\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CategoryController extends Controller
{

    /**
     * Service Object
     *
     * @var object $service
     */
    private $service;

    /**
     * ComboOfferService Object
     *
     * @var object $comboOfferService
     */
    private $comboOfferService;

    /**
     * CategoryController constructor.
     * @param CategoryService $service
     */
    public function __construct(CategoryService $service,
                                ComboOfferService $comboOfferService)
    {
        $this->service = $service;
        $this->comboOfferService = $comboOfferService;
    }

    public function create()
    {
        return view('admin.category.admin_add_category',['categories'=> $this->service->parentCategory()]);
    }


    /**
     * Add Category index
     *
     * @return View
     */

    public function index(){
        return view('admin.category.admin_table_category',['category'=> $this->service->getAll()]);
       

    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('admin.category.admin_edit_category',[
                                                'category'=>$this->service->getById($id),
                                                'categories'=> $this->service->parentCategory()
                                                ]);
        
    }

    /**
     * Update Category Data
     *
     * @param CategoryRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        if(empty($data['top'])): $data['top'] = 0; else: $data['top'] = 1; endif;
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.category.index');
    }

    /**
     * 
     * @param CategoryRequest $request
     */
    public function store(CategoryRequest $request) 
    {
        $data = $request->all();
        if(empty($data['top'])): $data['top'] = 0; else: $data['top'] = 1; endif;
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.category.index');
    }

     /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function destroy($id)
    {
        $response= $this->comboOfferService->hasChild('category_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

    /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function show($id)
    {
        return view('admin.category.admin_show_category',[
                                                'category'=>$this->service->getById($id),
                                                'categories'=> $this->service->getAll()
                                                ]);
    }
}