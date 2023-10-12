<?php namespace App\ThirdParty;

use SendGrid;
use SendGrid\Mail\Mail;
use Exception;

class EmailService
{
    public function sendEmail($from, $to, $subject, $content, $attachment = null)
    {
        $email = new Mail();
        $email->setFrom($from['email'], $from['name']);
        $email->setSubject($subject);
        $email->addTo($to['email'], $to['name']);
        $email->addContent("text/plain", $content);
        // Add more configurations if needed
        //$email->addAttachment($attachment['content'], $attachment['type'], $attachment['name'], $attachment['disposition']);

        $sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));

        try {
            return $sendgrid->send($email);
        } catch (Exception $e) {
            // Handle exception
            return false;
        }
    }
}
