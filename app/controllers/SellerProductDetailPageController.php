<?php

class SellerProductDetailPageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sellerproductdetailpage
	 *
	 * @return Response
	 */
	public function index()
	{
		$product_id = Input::get('product_id');
		$product = Product::with('shop','shop.tags','shop.user','pictures')->find($product_id);
		if(!isset($product))
			return Response::view('errors.missing', array(), 404); 

		$numOfItemsPerPage = 8;
		$evaluations = Evaluation::where('product_id',$product_id)
				->with('user')
				->paginate($numOfItemsPerPage);

		return View::make('tradingCenter.seller-center.seller-product-detail',array('product' => $product,'evaluations' => $evaluations));
	}

	

}