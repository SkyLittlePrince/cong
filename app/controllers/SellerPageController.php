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

		$shop_id = $product->shop_id;
		$otherProducts = Product::where("shop_id", "=", $shop_id)->where("id", "<>", $product_id)->take(10)->get();

		return View::make('tradingCenter.seller-center.seller-product-detail',array('product' => $product, 'evaluations' => $evaluations, "otherProducts" => $otherProducts));
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
		$user = Sentry::getUser();

		$myShop = Shop::where('user_id',$user->id)->first();

		if(!isset($myShop))
		{
			return View::make('errors.haveNoStore');
		}

		$numOfItemsPerPage = 3;

		$indents = Indent::whereHas('products',function($q) use ($myShop)
		{
			$q->where('shop_id',$myShop->id);
		})
		->with('products')
		->orderBy('status')
		->paginate($numOfItemsPerPage);

		//return Response::json($indents);

		// $products = Shop::find($myShop->id)->products;

		// foreach ($products as $key => $product) {
		// 	foreach ($product->indents as $key => $indent) {
		// 		$indent->product = $indent->products[0];
		// 	}
		// 	$indents = array_merge($indents, $product->indents->toArray());
		// }

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

		$myShop = Shop::where("user_id", "=", $user_id)->with('tags','products.pictures')->first();

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
