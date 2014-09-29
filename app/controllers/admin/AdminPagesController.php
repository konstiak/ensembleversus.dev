<?php

class AdminPagesController extends \BaseController {

	/**
	 * Display a listing of members
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::all();

		// Title
        $title = Lang::get('admin/pages/title.page_management');

		return View::make('admin.pages.index', compact('pages','title'));
	}

	/**
	 * Show the form for editing the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::find($id);

		$title = Lang::get('admin/pages/title.edit_page');

		$images = PagesImage::where('slug','=', $page->slug)->get();

		return View::make('admin.pages.edit', compact('page','title', 'images'));
	}

	/**
	 * Update the specified member in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$page = Page::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Page::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		$page->update($data);

		Session::flash('success', Lang::get('admin/pages/messages.update.success'));

		return Redirect::route('admin.pages.index');
	}

	public function addImage() {
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'message' => 'Unauthorized attempt to create option'
            ) );
        }

		foreach (Input::file('image') as $image) {
			$imagename =  time() . $image->getClientOriginalName();
			$path = public_path() . '/images/';
			$uploadflag = $image->move($path, $imagename);

			$thumb = Image::make($path . $imagename);

			$thumb->resize(null, 50, function($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();
			});
			$thumbname = "thumb_" . $imagename;
			$uploadthumbflag = $thumb->save($path . "thumb/" . $thumbname);

			if ($uploadflag && $uploadthumbflag) {

				$pagesimage = new PagesImage();
				$pagesimage->slug = 'profile';
				$pagesimage->url = asset( 'images/' . $imagename);
				$pagesimage->thumbnail_url = asset('images/thumb/' . $thumbname);
				$pagesimage->path = public_path() . '/images/' . $imagename;
				$pagesimage->thumbnail_path = public_path() . '/images/thumb/thumb_' . $imagename;
				$pagesimage->save();

				$uploadedimages[] = $pagesimage;
			}
		}

		return Response::json([
			'success'=> true,
			'message'=> Lang::get('admin/pages/image.upload.success'),
			'images' => $uploadedimages]);
	}

	public function deleteImage($id) {
		$pagesimage = PagesImage::find($id);
		File::delete($pagesimage->path);
		File::delete($pagesimage->thumbnail_path);
		$pagesimage->delete();
	}
}
