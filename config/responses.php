<?php

return [
	'create_failed' => [
		'code' 	    => 400,
		'message'   => 'Creating failed. Sorry, please contact your system admininistrator!'
	],
	'create_success' => [
		'code' 	    => 200,
		'message'   => 'Has been successfully added'
	],
	'update_failed' => [
		'code' 	    => 400,
		'message'   => 'Updating failed. Sorry, please contact your system admininistrator!'
	],
	'update_success' => [
		'code' 	    => 200,
		'message'   => 'Has been successfully updated'
	],
	'delete_failed' => [
		'code' 	    => 400,
		'message'   => 'Deleting failed. Sorry, please contact your system admininistrator!'
	],
	'delete_success' => [
		'code' 	    => 200,
		'message'   => 'Has been successfully deleted'
	],
	'email_verification' => [
		'verified' 	    	=> 'Email has been succesfully verified',
		'token_expired' 	=> 'Token has been expired',
		'already_verified' 	=> 'Email has been already verified',
	],
	'record_status' => [
		'not_exist' 	   	=> 'Record not found!',
		'code'				=> 404
	],
	'uploading_error' => [
		'message' 	   	=> 'Error in uploading image',
		'code'				=> 422
	],
];
