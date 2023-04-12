<?php

/**
 * Created by sublime.
 * User: khem
 * Date: 26/12/16
 * Time: 11:49 AM
 */


namespace Kerung\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;
use KerungRepo\Services\ImportExportService;
use KerungRepo\Services\StoreService;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\CategoryService;
use KerungRepo\Services\ManufacturerService;
use Kerung\Http\Requests\Admin\ProductImportRequest;
use Kerung\Http\Requests\Admin\CategoryImportRequest;
use Kerung\Http\Requests\Admin\ManufacturerImportRequest;
use Excel;

/**
 * Class ProductController
 * @package Kerung\Http\Controllers\Admin
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ImportExportController extends Controller
{

	/**
     * Product Service
     *
     * @var ProductService
     */
    protected $service;

    /**
     * ImportExport Service
     *
     * @var importExportService
     */
    protected $importExportService;

    /**
     * Store Service 
     *
     * @var StoreService
     */
    protected $storeService;

    /**
     * Category Service
     *
     * @var CategoryService
     */
    protected $cService;

    /**
     * @var ManufacturerService
     */
    protected $mService;


    /**
    * ImportExport constructor.
    * @param StoreService $storeService
    * @param ImportExportService $importExportService
    * @param ProductService $service
    * @param ManufacturerService $mService
    * @param CategoryService $cService
    */
    public function __construct(ProductService $service,
    							ImportExportService $importExportService,
    							StoreService $storeService,
                                ManufacturerService $mService,
                                CategoryService $cService) 
    {
        $this->service = $service;
        $this->importExportService = $importExportService;
        $this->storeService = $storeService;
        $this->cService = $cService;
        $this->mService = $mService;
    }

    /**
     * Product Import and Export
     * @return mixed
     */
    public function importExport()
    {
        return view('admin.product.admin_importexport_product')
        		->with('stores',$this->storeService->getAll());
    }

    /**
     * File Export 
     * @param $type
     * @return mixed
     */
    public function downloadExcel($type)
    {
        $data= $this->service->getAll()->toArray();
        return $this->importExportService->productExport($data,$type);
        
    }

    /**
     * Import file 
     * @param ProductImportRequest $request
     * @return mixed
     */
    public function importExcel(ProductImportRequest $request)
    {
    	$store=$request->all();
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$this->importExportService->productImport($path,$store);
            Notify::success('File Sucessfully Imported !!!');
            return view('admin.product.admin_importexport_product')
            ->with('stores',$this->storeService->getAll());
		}

        Notify::success('Opps Something Went wrong Please Check the file');
        return view('admin.product.admin_importexport_product')
                ->with('stores',$this->storeService->getAll());
	}

    /**
     * Category Import and Export
     * @return mixed
     *
     */
    public function importExportCategory()
    {
        return view('admin.category.admin_importexport_category');
    }


     /**
     * File Export 
     * @param $type
     * @return mixed
     */
    public function downloadExcelCategory($type)
    {
        $data= $this->cService->getAll()->toArray();
        return $this->importExportService->categoryExport($data,$type);
        
    }

    /**
     * Import Categoy File
     * @param CategoryImportRequest $request
     * @return mixed
     */
    public function importExcelCategory(CategoryImportRequest $request)
    {
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $this->importExportService->categoryImport($path);
            Notify::success('File Sucessfully Imported !!!');
            return view('admin.category.admin_importexport_category');
        }

        Notify::success('OOPS! Somthing went wrong plese check your file !!!');
        return view('admin.category.admin_importexport_category');
    }


    /**
     * Return View file for Manufacturer Import and Export
     * @return mixed
     */
    public function importExportManufacturer()
    {
        return view('admin.manufacturer.admin_importexport_manufacturer')
                ->with('stores',$this->storeService->getAll());
    }


     /**
     * File Export Manufacturer
     * @param $type
     * @return mixed
     */
    public function downloadExcelManufacturer($type)
    {
        $data= $this->mService->getAll()->toArray();
        return $this->importExportService->manufacturerExport($data,$type);
        
    }

    /**
     * Import Manufacture File
     * @param ManufacturerImportRequest $request
     * @return mixed
     */
    public function importExcelManufacturer(ManufacturerImportRequest $request)
    {   
        $store=$request->all();
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $this->importExportService->manufacturerImport($path,$store);
            Notify::success('File Sucessfully Imported !!!');
            return view('admin.manufacturer.admin_importexport_manufacturer')
                ->with('stores',$this->storeService->getAll());
        }

        Notify::success('OOPS! Somthing went wrong plese check your file !!!');
        return view('admin.manufacturer.admin_importexport_manufacturer')
                ->with('stores',$this->storeService->getAll());
    }



}
