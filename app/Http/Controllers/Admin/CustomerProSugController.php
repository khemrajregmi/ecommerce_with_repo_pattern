<?php

namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Jleon\LaravelPnotify\Notify;
use Kerung\Http\Controllers\Controller;
use Kerung\Http\Requests\Admin\CustomerProSugRequest;
use KerungRepo\Services\CustomerProSugService;

class CustomerProSugController extends Controller
{

    /**
     * Service Object
     *
     * @var object $service
     */
    private $service;

    /**
     * CustomerProSugController constructor.
     * @param CustomerProSugService $service
     */
    public function __construct(CustomerProSugService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        return view('admin.customerprosug.admin_add_customerprosug',['categories'=> $this->service->getAll()]);
    }


    /**
     * Add CustomerProSug index
     *
     * @return View
     */

    public function index(){
        return view('admin.customerprosug.admin_table_customerprosug',['customerprosug'=> $this->service->getAll()]);
       

    }

    /**
     * Edit Form Data
     *
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('admin.customerprosug.admin_edit_customerprosug',[
                                                'customerprosug'=>$this->service->getById($id)
                                                ]);
        
    }

    /**
     * Update CustomerProSug Data
     *
     * @param CustomerProSugRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CustomerProSugRequest $request, $id)
    {
        $data = $request->all();
        $this->service->update($id, $data);
        Notify::success('Data Updated Successfully.');
        return Redirect::route('admin.customerproductsuggestion.index');
    }

    /**
     * 
     * @param CustomerProSugRequest $request
     */
    public function store(CustomerProSugRequest $request) 
    {
        $data = $request->all();
        $this->service->store($data);
        Notify::success('Data Added Successfully.');
        return Redirect::route('admin.customerproductsuggestion.index');
    }

     /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function destroy($id)
    {
        $this->service->destroy($id);
        return 'deleted';
    }

    /**
     * Delete form Data
     * @param $id
     * @return mixed
     */
     public function show($id)
    {
        return view('admin.customerprosug.admin_show_customerprosug',
                ['customerprosug'=>$this->service->getById($id)]);
    }
}
