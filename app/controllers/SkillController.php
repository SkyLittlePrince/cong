<?php

class SkillController extends \BaseController {

	public function addSkill()
	{
		$name = Input::get('name');
		$user = User::find(Sentry::getUser()->id);
		if(!isset($name) || $name == "")
			return Response::json(array('errCode' => 1,'message' => '技能名不能为空!'));

		$skill = Skill::firstOrCreate(array('name' => $name));

		try
		{
			$user->skills()->save($skill);
			return Response::json(array('errCode' => 0,'skill_id' => $skill->id));
		}
		catch(Exception $e)
		{
			return Response::json(array('errCode' => 1,'message' => '该技能已存在!')); 
		}
	}

	public function deleteSkill()
	{
		$id = Input::get('id');
		$user = User::find(Sentry::getUser()->id);

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