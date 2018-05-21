<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('send_mail'))
{
    function send_mail($to, $cc, $bcc, $subject, $body, $templatePath = '', $templateData = array())
    {
        $CI =& get_instance();
        $CI->load->library('email');
        
        // Use config to get the from email and name
        $CI->email->from(
            $CI->config->item('from_email'), 
            $CI->config->item('from_name')
        );
        
        // Prepare the email
        $CI->email->to($to);
        $CI->email->cc($cc);
        $CI->email->bcc($bcc, 50); // Max number of email sent
        
        $CI->email->subject($subject);
        
        // Prepare the message body
        if (empty($body)) {
            $body = $CI->load->view($templatePath, $templateData, true);
        }
        
        $CI->email->message($body);
        
        echo $body; exit;
        
        return $CI->email->send();
    }
}