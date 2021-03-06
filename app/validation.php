<?php

class ValidationValidator extends Illuminate\Validation\Validator {

    public function validateOldPwd($attribute, $value, $parameters)
    {
    	$info = Input::all();

    	try {
       		$user = \DB::select('Call Connexion(?, ?, ?, ?)', [Auth::User()->id, $info['ancienMotdePasse'], '123', '123']);
       	} catch (Exception $e) {
       		return false;
       	}

        if(isset($user[0]))
            return true;

        return false;
    }

}

Validator::resolver(function($translator, $data, $rules, $messages)
{
    return new ValidationValidator($translator, $data, $rules, $messages);
});