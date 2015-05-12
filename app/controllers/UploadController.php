<?php

use Qiniu\Auth;

class UploadController extends \BaseController {

	public function getUpToken()
	{
		$accessKey = 'KHltWJvn82wXVCCcs2OI1FQYID7T8CcS1wJG9KLP';
		$secretKey = '-1ixiyPLCtQSIKm0PWyVGBSIy7SzFLrY6MH2Se4Q';
		$auth = new Auth($accessKey, $secretKey);

		$bucket = 'congcong';
		$upToken = $auth->uploadToken($bucket);

		return Response::json(array("uptoken" => $upToken));
	}
}






