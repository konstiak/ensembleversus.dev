<?php

class Page extends \Eloquent {

		// Add your validation rules here
	public static $rules = [
		'title' => 'required',
		'content' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'content'];

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}
}