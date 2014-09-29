<?php

class ContactController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /contact
	 *
	 * @return Response
	 */
	public function sendMail()
	{
		$input = array(
            'name'    => Input::get( 'name' ),
            'email' => Input::get( 'email' ), 
            'content' => Input::get( 'message' ),
            'date_time' => date("F j, Y, g:i a"),
			'userIpAddress' => Request::getClientIp(),
        );
	
		Mail::send('emails.contact', $input, function($message)
		{
    		$message->from('info@ensembleversus.cz', 'Ensemble Versus');

    		$message->to('konstiak@gmail.com');

    		$message->subject('contact form');
    		
		});


		Session::flash('success', Lang::get('messages.contact.success'));

		return Redirect::to('contact-us');
	}

}