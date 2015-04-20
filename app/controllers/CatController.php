<?php

class CatController extends BaseController {

  public function index()
  {
    return Response::json(array('errCode' => 0,'data' => Cat::getNestedList('name')));
  }
}
