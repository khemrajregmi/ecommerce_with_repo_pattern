<?php
namespace Kerung\Http\ViewComposers;

use Illuminate\View\View;
use KerungRepo\Services\WishListService;
use KerungRepo\Services\CartService;
use KerungRepo\Services\CategoryService;
use Session;

use Gloudemans\Shoppingcart\Facades\Cart;

class HeaderComposer
{
	/**
	 * @var WishListService
	 */
	protected $service;

	 /**
     * Cart Service
     *
     * @var CartService
     */
    protected $cService;

     /**
     * Category Service
     *
     * @var categoryService
     */
    protected $categoryService;


	/**
	 * HeaderComposer constructor.
	 * @param WishListService $service
	 */
    public function __construct(WishListService $service,
                				CategoryService $categoryService,
                                CartService $cartService)
    {
    	$this->service = $service;
    	$this->cService = $cartService;
    	$this->categoryService = $categoryService;
    }

	/**
	 * @param View $view
	 */
	public function compose(View $view)
	{
		// Cart::destroy();
		// dd($this->cService->getTotal());
	   $view->with('count',count( $this->service->getAll()))
	   		->with('totalcompare', count(session()->get('compare')))
	   		->with('totalAmount', $this->cService->getTotal())
	   		->with('getCartItems', $this->cService->getCartItems())
	   		->with('totalCartItem', $this->cService->totalItemInCart())
	   		->with('categories', $this->categoryService->getAllEnable())
            ->with('parent_categories', $this->categoryService->parentCategory())
            ->with('top_categories', $this->categoryService->topCategory());
	}

	

}	