<?php
class Email{
    public function send(array $content){
        $to = 'dussartguillaume.dev@gmail.com';

        $subject = 'New message for you!';

        $headers = "From: " . strip_tags($content['email']) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($content['email']) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message = '<html><body>';
        $message .= '<h1>New message:</h1>';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr style='background: #eee;'><td><strong>Prénom:</strong> </td><td>" . strip_tags($content['firstname']) . "</td></tr>";
        $message .= "<tr><td><strong>Nom:</strong> </td><td>" . strip_tags($content['lastname']) . "</td></tr>";
        $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($content['email']) . "</td></tr>";
        $message .= "<tr><td><strong>Society:</strong> </td><td>" . strip_tags($content['society']) . "</td></tr>";
        $message .= "<tr><td><strong>Telephone:</strong> </td><td>" . $content['phone'] . "</td></tr>";
        $message .= "<tr><td><strong>Message:</strong> </td><td>" . $content['message'] . "</td></tr>";
        $message .= "</table></body></html>";
        $mail = mail($to,$subject,$message,$headers);
        return $mail;
    }
}
