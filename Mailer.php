<?php
namespace cf;
/**
 * Description of Mailer
 *
 * @author Puchky Juraj
 */
class Mailer {
    private $to;
    private $subject;
    private $message;
    private $additional_headers = "";
    function __construct($from,$to,$subject,$message) {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->additional_headers .= "From: $from\r\n";
    }
    public function send() {
       return mail($this->to, $this->subject, $this->message, $this->additional_headers);
    }
}
