<?php

class Member extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['first_name', 'second_name', 'voice', 'voice_no', 'active', 'member_from', 'member_to' ];

}