<?php

class MembersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /members
	 *
	 * @return Response
	 */
	public function index()
	{
		$all_members = Member::where('active', '1')
			->orderBy('voice_no', 'asc')
            ->get();

		$members = array(
			'soprano' => array(),
			'mezzosoprano' => array(),
			'alto' => array(),
			'contralto' => array(),
			'tenor' => array(),
			'countertenor' => array(),
			'baritone' => array(),
			'bass' => array(),
		);

        foreach ($all_members as $member) {
        	array_push($members[$member->voice],$member);
        }
		
		// Title
        $title = Lang::get('members.members_list');

		return View::make('site.members.index', compact('members','title'));
	}

	/**
	 * Display the specified resource.
	 * GET /members/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

}