<?php
use Gregwar\Captcha\CaptchaBuilder;

class SellerPageController extends BaseController {

	public function indentEvaluation()
	{
		$indent_id = Input::get("indent_id");

		$indent = Indent::find($indent_id);
		$product = $indent->products[0];
		$shop = $product->shop;
		$seller = $shop->user;

		return View::make('tradingCenter.seller-center.indent-evaluation', array("indent" => $indent, "product" => $product, "seller" => $seller, "shop" => $shop));
	}

	public function productDetail()
	{
		$product_id = Input::get('product_id');
		$product = Product::with('shop','shop.tags','shop.user','pictures')->find($product_id);
		if(!isset($product))
			return Response::view('errors.missing', array(), 404); 

		$numOfItemsPerPage = 8;
		$evaluations = Evaluation::where('product_id',$product_id)
				->with('user')
				->paginate($numOfItemsPerPage);
		$sum = 0;
		foreach ($evaluations as $evaluation) 
		{
			$sum += $evaluation->score;
		}

		$aScore = ($sum == 0 ? 0 : round($sum / count($evaluations)));
		$product->aScore = $aScore;	

		return View::make('tradingCenter.seller-center.seller-product-detail',array('product' => $product,'evaluations' => $evaluations));
	}

	public function sellerStore()
	{
		$shop_id = Input::get("shop_id");

		$shop = Shop::where("id", "=", $shop_id)->with('tags')->first();

		$numOfItemsPerPage = 6;
		$productsRanking = DB::table('products')->where("shop_id", "=", $shop_id)->orderBy('sellNum', 'desc')->take(5)->get();
		$products = DB::table('products')->where("shop_id", "=", $shop_id)->paginate($numOfItemsPerPage);
		$numOfTotalItems = $products->getTotal();

		return View::make('tradingCenter.seller-center.seller-store', array("shop" => $shop, "products" => $products, "productsRanking" => $productsRanking, "numOfTotalItems" => $numOfTotalItems));
	}

	public function myIndents()
	{
		$indents = [];

		return View::make('tradingCenter.seller-center.my-indents', array("indents" => $indents));
	}

	public function myStore()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		$myShop = Shop::where("user_id", "=", $user_id)->with('tags','products')->first();

		if(!isset($myShop))
		{
			return View::make('errors.haveNoStore');
		}

		$shop = $myShop->toArray();

		return View::make('tradingCenter.seller-center.my-store', $shop);
	}

	public function register()
	{
		$builder = new CaptchaBuilder;
		$builder->build();

		$phrase = $builder->getPhrase();
		$_SESSION['phrase'] = $phrase;

		return View::make('tradingCenter.seller-center.register')->with('captcha', $builder);
	}
}
