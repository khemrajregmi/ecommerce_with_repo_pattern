<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/1/16
 * Time: 11:33 AM
 */

namespace Kerung\Http\Controllers\Admin;


use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\LengthClassRequest;
use KerungRepo\Services\LengthClassService;
use KerungRepo\Services\ProductService;
use Jleon\LaravelPnotify\Notify;
use Illuminate\Support\Facades\Redirect;

/**
 * Class LengthClassController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class LengthClassController extends Controller
{
    /**
     * LengthClass service
     *
     * @var LengthClassService
     */
    protected $service;

    /**
     * Product service
     *
     * @var object $productService
     */
    protected $productService;

    public function __construct(LengthClassService $service,
                                ProductService $productService)
    {
        $this->service = $service;
        $this->productService = $productService;
    }


    /**
     * Index View of Length Class
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.lengthclass.admin_table_lengthclass', ['lengthclasses' => $this->service->getAll()]);
    }

    /**
     * Create Length Class
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.lengthclass.admin_add_lengthclass');
    }

    /**
     * Store the Length Class Data
     *
     * @param LengthClassRequest $request
     * @return mixed
     */
    public function store(LengthClassRequest $request)
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.lengthclass.index');
    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.lengthclass.admin_edit_lengthclass', ['lengthclass' => $this->service->getById($id)]);
    }


    /**
     * Update LengthClass Data
     *
     * @param LengthClassRequest $request
     * @param $id
     * @return mixed
     */
    public function update(LengthClassRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.lengthclass.index');
    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $response= $this->productService->hasChild('length_class_id',$id);
        if($response==null)
        {
            $this->service->destroy($id);
            return 'deleted';
        }
        else
            return 'cannot_deleted';
    }

}