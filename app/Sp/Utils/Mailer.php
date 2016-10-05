<?php

namespace Sp\Utils;

use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Queue\InteractsWithQueue;
use \Illuminate\Mail\Mailer as Mail;


class Mailer {

    //External user mail
    //contenuto update mail
    //nuova segnalazione mail
    //nuova candidatura mail


    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }


    public function sendMailArticleApproved($article)
    {
        logger('sending article approved email');
        $subject = "Il tuo articolo '". $article->title. "'è stato approvato ";
        $view = "emails.articles.published";
        $data = compact('article');

        $this->sendTo($article->user->email, $subject, $view, $data);

    }

    public function sendTo($recipient, $subject, $view, $data = [])
    { 
        $this->mail->queue($view, $data, function($message) use($recipient, $subject){
            $message->to($recipient)->subject($subject);
        });
    }

}
