<?php

class MessageController extends BaseController {

	public function message() {

		$result = MessagesModel::afficherMessages();
		return View::make('message.index')->withMessages($result);
	}

	public function sendMessageIndex() {
		return View::make('message.send');
	}

	public function sendMessage() {
		$info = Input::all();

        $result = MessagesModel::EnvoieMessage(
            trim($info['titre']),
            trim($info['message']),
            Auth::User()->id
        );
        return Redirect::route('message')->withSuccess("Le message à bien été envoyé.");
	}

    public function delMessage($id) {
        if (MessagesModel::supprimerMessage($id))
            return Redirect::route('message')->withSuccess("Le message à bien été supprimer.");

        return Redirect::route('message')->withFail("Le message n'a pas été supprimer.");
    }

}