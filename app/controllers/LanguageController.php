<?php

class LanguageController extends \BaseController {

public function select($lang)
    {
    	if($lang != "auto" && in_array($lang , Config::get('app.available_language'))) {
        	App::setLocale($lang);
        	Session::put('locale', $lang);
    	}

        return Redirect::back();
    }
}