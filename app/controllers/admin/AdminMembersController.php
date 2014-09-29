<?php

class AdminMembersController extends \BaseController {

	/**
	 * Display a listing of members
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = Member::all();

		// Title
        $title = Lang::get('admin/members/title.member_management');

		return View::make('admin.members.index', compact('members','title'));
	}

	/**
	 * Show the form for creating a new member
	 *
	 * @return Response
	 */
	public function create()
	{

		$title = Lang::get('admin/members/title.create_a_new_member');

		return View::make('admin.members.create', compact('title'));
	}

	/**
	 * Store a newly created member in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		switch ($data['voice']) {
    		case 'soprano':
        		$data['voice_no']=1;
        	break;
    		case 'mezzosoprano':
        		$data['voice_no']=2;
        	break;
    		case 'alto':
        		$data['voice_no']=3;
        	break;
    		case 'contralto':
        		$data['voice_no']=4;
        	break;
    		case 'tenor':
        		$data['voice_no']=5;
        	break;
    		case 'countertenor':
        		$data['voice_no']=6;
        	break;
    		case 'baritone':
        		$data['voice_no']=7;
        	break;
    		case 'bass':
        		$data['voice_no']=8;
        	break;
		}

		Member::create($data);
		
		Session::flash('success', Lang::get('admin/members/messages.create.success'));

		return Redirect::route('admin.members.index');
	}

	/**
	 * Display the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$member = Member::findOrFail($id);

		return View::make('admin.members.show', compact('member'));
	}

	/**
	 * Show the form for editing the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$member = Member::find($id);

		$title = Lang::get('admin/members/title.edit_member');

		return View::make('admin.members.edit', compact('member','title'));
	}

	/**
	 * Update the specified member in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$member = Member::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		switch ($data['voice']) {
    		case 'soprano':
        		$data['voice_no']=1;
        	break;
    		case 'mezzosoprano':
        		$data['voice_no']=2;
        	break;
    		case 'alto':
        		$data['voice_no']=3;
        	break;
    		case 'contralto':
        		$data['voice_no']=4;
        	break;
    		case 'tenor':
        		$data['voice_no']=5;
        	break;
    		case 'countertenor':
        		$data['voice_no']=6;
        	break;
    		case 'baritone':
        		$data['voice_no']=7;
        	break;
    		case 'bass':
        		$data['voice_no']=8;
        	break;
		}

		$member->update($data);

		Session::flash('success', Lang::get('admin/members/messages.update.success'));

		return Redirect::route('admin.members.index');
	}

	/**
	 * Remove the specified member from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Member::destroy($id);

		Session::flash('success', Lang::get('admin/members/messages.delete.success'));

		return Redirect::route('admin.members.index');
	}
}
