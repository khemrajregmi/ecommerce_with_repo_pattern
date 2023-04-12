<?php

/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/08/16
 * Time: 10:49 AM
 */
namespace Kerung\Http\Controllers\Home;
use Illuminate\Http\Request;

use Response;
use Session;
use Kerung\Http\Requests;
use Kerung\Http\Controllers\Controller;
use KerungRepo\Services\ProductService;
use KerungRepo\Services\CategoryService;
use KerungRepo\Services\ProductRelatedService;
use KerungRepo\Services\BannerImageService;
use KerungRepo\Services\ManufacturerService;
use KerungRepo\Services\FeatureProductService;
use KerungRepo\Services\ReviewService;
use KerungRepo\Services\SettingService;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


/**
 * Class HomeController
 *
 * @package Kerung\Http\Controllers\Home
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class HomeController extends Controller
{

    /**
     * Product Service
     *
     * @var service
     */
    protected $service;


    /**
     * Manufacturer Service
     *
     * @var mService
     */
    protected $mService;


    /**
     * Category Service
     *
     * @var cService
     */
    protected $cService;

    /**
     * BannerImage Service
     *
     * @var bimgService
     */
    protected $bimgService;

    /**
     * Review Service
     *
     * @var revService
     */
    protected $revService;

    /**
     * ProductRelatedService Service
     *
     * @var productRelatedService
     */
    protected $productRelatedService;

    /**
     * Setting service
     *
     * @var SettingService
     */
    protected $settingService;

    /**
     * FeatureProductService service
     *
     * @var featureService
     */
    protected $fpService;


	
    public function __construct(
                ProductService $service,
                CategoryService $categoryService,
                BannerImageService $bannerImageservice,
                ReviewService $reviewService,
                ProductRelatedService $productRelatedService,
                SettingService $settingService,
                ManufacturerService $manufacturerService,
                FeatureProductService $fpService ) 
    {
        $this->service = $service;
        $this->cService = $categoryService;
        $this->bimgService = $bannerImageservice;
        $this->revService = $reviewService;
        $this->productRelatedService = $productRelatedService;
        $this->settingService = $settingService;
        $this->mService = $manufacturerService;
        $this->fpService = $fpService;
    }

    /**
     * Get Product Related Model
     *
     * @return array
     */
    public function getProductRelatedModelData()
    {
        return $data = array(
            'products' => $this->service->productPagination(),
            'banner_image' => $this->bimgService->getAll(),
            'manufacturers' => $this->mService->getAll(),
            'featured_prod' => $this->fpService->getAll()
        );
    }


    /**
     * HomePage Index
     *
     * @return mixed
     */
    public function index()
    {
        return view('home.homepage')->with($this->getProductRelatedModelData());
    }


    /**
     * Get Product List
     *
     * @return mixed
     */
    public function getProductList()
    {
        return view('home.product.product_list')->with($this->getProductRelatedModelData());
    }


    /**
     * Get single Product
     *
     * @param $id - Product id
     * @return mixed
     */
    public function singleProduct($slug)
    {
        // dd('lflsfdjlas');
        $code ='config';
        $key = 'reviews';
        $this->service->updateViewCount($slug);
        $settings = $this->settingService->getSettingByCode($code);
        $result = array_key_exists('config_captcha_page', $settings)?
        in_array($key,$settings['config_captcha_page']) ? 'true' : 'false': 'false';
        $productDetail=$this->service->getBySlug($slug);
        $id = $productDetail->product_id;
        return view('home.product.product_singleproduct') 
        ->with('product' , $this->service->getBySlug($slug))
        ->with('reviews', $this->revService->getReview($id))
        ->with('relatedproduct', $this->productRelatedService->getRelatedProductId($id))
        ->with('result',$result);
    }


    /**
     * Product Quick View Ajax Response
     *
     * @param $id - Product Id
     * @return mixed
     */
    public function quickView($id)
    {
        $product = $this->service->getById($id);
        $productDetail = [
            'name' => $product->name,
            'description' => $product->meta_description,
            'price' => $product->price,
            'image' => $product->image,
            'product_id' => $id
        ];
        return response()->json($productDetail);
    }

    /**
     * @return mixed
     */
    public function about()
    {
        return view('home.pages.about');
    }

    /**
     * Category wise Product
     *
     * @param $categorySlug
     * @param $subCategorySlug
     * @return View
     */
    public function categoryProduct($categorySlug , $subCategorySlug)
    {   
        $category = $this->cService->getCategoryByCategorySlug($subCategorySlug);
        $products = $this->service->getProductsByCategory($category);
        return view('home.product.product_list',
        ['products' => $products],
        ['parent_categories' => $this->cService->parentCategory()]);
    }

    /**
     * Search Product
     * @param $request
     * @return View
     */
    public function searchProduct(Request $request)
    {
        $search=$request->get('search');
        return view('home.product.product_list', 
            ['products' => $this->service->getBySearch($search)],
            ['parent_categories' => $this->cService->parentCategory()]);

    }


    /**
     * Add Compare
     * @param $request
     * @return mixed
     */
    public function addCompare(Request $request)
    {   
       
        $id = $request->productId;
        $productDetail = $this->service->getById($id);
        $id = $productDetail->product_id;
        $choice[$id] = $id;
        if(session()->get('compare')==null)
        {
            session()->put('compare',$choice);
            $count = count(session()->get('compare'));
            return $count;
        }
        else
        {
            $getChoice= session()->get('compare');
            $array =array_merge($getChoice,  $choice); 
            session()->put('compare', $array);
            $count = count(session()->get('compare'));
            return $count;
        }

    }

    /**
     * compare
     *
     * @return View
     */
    public function compare()
    {
        $value = session()->get('compare');
        if(count(session()->get('compare'))==0)
        {
            Session::flash('success', 'You have no Item in Compare List');
            return Redirect::route('product.list');
        }
        else
        {
            foreach ($value as $val) {
                $products[] = $this->service->getById($val);
            }
            return view('home.compare',compact('products',$products));
        }
    }

     /**
     * Remove Compare
     * @param $request
     * @return View
     */
    public function removeCompare(Request $request)
    {   
        $id = $request->id;
        $value = session()->get('compare');
        foreach ($value as $key => $val) {
          if ($val==$id) {
            unset($value[$key]);
          }
        }
        Session::put('compare',$value);
       return 'success';
    }


    /**
     * Get Sign In Index
     *
     * @return mixed
     */
    public function getSigninIndex()
    {
        return view('home.signin');
    }


    /**
     * Get Sign Up Index
     *
     * @return mixed
     */
    public function getSignupIndex()
    {
        return view('home.signup');
    }


    /**
     * FAQ
     *
     * @return View
     */
    public function faq()
    {
        return view('home.pages.faq');
    }

    /**
     * Store
     *
     * @return View
     */
    public function ourStores()
    {
        return view('home.store.list');
    }

    /**
     * Store
     *
     * @return View
     */
    public function storeDetail()
    {
        return view('home.store.detail');
    }

  /**
     * Store
     *
     * @return View
     */
    public function storeDetails()
    {
        return view('home.pages.storedetails');
    }

    /**
     * Terms and Condition
     *
     * @return View
     */
    public function termsCondition()
    {
        return view('home.pages.termsandcondition');
    }

    /**
     * Terms and Condition
     *
     * @return View
     */
    public function shippingReturn()
    {
        return view('home.pages.shipping');
    }

    /**
     * Terms and Condition
     *
     * @return View
     */
    public function privacyPolicy()
    {
        return view('home.pages.privacypolicy');
    }



    /**
     * Terms and Condition
     *
     * @return View
     */
    public function onlineSupport()
    {
        return view('home.pages.online_support');
    }




    /**
     * Terms and Condition
     *
     * @return View
     */
    public function callCentre()
    {
        return view('home.pages.callcentre');
    }


      /**
     * How it works
     *
     * @return View
     */
    public function howitWorks()
    {
        return view('home.pages.howitworks');
    }

     /**
     * Help
     *
     * @return View
     */
    public function help()
    {
        return view('home.pages.help');
    }


        /**
     * Help
     *
     * @return View
     */
    public function product()
    {
        return view('home.pages.product');
    }



        /**
     * Help
     *
     * @return View
     */
    public function sitemap()
    {
        return response()->view('home.pages.sitemap')->header('Content-Type', 'text/xml');
        // return view('home.pages.sitemap');
    }


    

    

    
   
}

