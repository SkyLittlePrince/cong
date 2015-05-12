<?php

class SkillController extends \BaseController {

	public function addSkill()
	{
		$name = Input::get('name');
		$user = User::find(Sentry::getUser()->id);
		if(!isset($name))
			return Response::json(array('errCode' => 1,'message' => '技能名不能为空!'));

		$skill = Skill::firstOrCreate(array('name' => $name));
		if($user->skills()->attach($skill->id))
		{
			return Response::json(array('errCode' => 0,'message' => '保存成功!'));
		}
		else
		{
			return Response::json(array('errCode' => 1,'message' => '该技能已存在!')); 
		}
	}

	public function deleteSkill()
	{
		$id = Input::get('id');
		$user = User::find(Sentry::getUser()->id);

		$id = intval($id);
		if($user->skills()->detach($id))
		{
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));
		}
		else
		{
			return Response::json(array('errCode' => 1,'message' => '删除失败!'));
		}

	}

}