<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    private $data;
    private $request;
    
    /**
     * Constructor function
     */
    public function __construct() {
        
        parent::__construct();
        $this->request = $this->input->server('REQUEST_METHOD');
        $this->load->library('Authentication', array(
            'identity_col' => 'username',
            'credential_col' => 'password',
            'email_col' => 'email'
        ));
    }

	/**
	 * Login Page 
	 */
	public function login()
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    
	    // If already logged in user, then redirect to dashboard
	    if ($this->authentication->isLogged()) {
	        redirect('/dashboard', 'refresh');
	    }
	    
	    // Add the comma separated list of
	    // required css/js resources. The
	    // css resources will be loaded in
	    // the header and the js  will be
	    // loaded in the footer section
	    $this->data['css'] = array(
	        'bootstrap', // path already entered in application/config/assets.php file
	        'custom.css' // need to give the full path inside the css directory
	    );
	    
	    $this->data['js'] = array(
	        'bootstrap',
	        'login-validation.js'
	    );
	    
	    if ($this->request == 'GET') {
	        
	    } 
	    
	    // Gets executed when the login form
	    // gets submitted (POST request)
	    elseif ($this->request == 'POST') {
	        
	        // Prepare the login form elements
	        // for validation
	        $this->form_validation->set_rules('username', 'Username', 'required');
	        $this->form_validation->set_rules('password', 'Password', 'required');
	        
	        // validate the form
	        if ($this->form_validation->run() != FALSE) {
	            
	            // filter the form vlaues
	            
	            $identity = $this->input->post('username');
	            $credential = $this->input->post('password');
	            $extraParams = "status = 'ACTIVE'";
	            
	            // If validation and filtration is OK, then ...
	            if ($this->authentication->login($identity, $credential, $extraParams)) {
	                
	                // Redirect to the dashboard
	                redirect('/dashboard', 'refresh');
	            } else {
	                $this->data['info'] = 'Sorry! Invalid login';
	            }
	        }
	    }
	    
	    // This line will load the file
	    // views/auth/login
	    $this->load->view('auth/login', $this->data);
	}
	
	/**
	 * Logout action
	 */
	public function logout()
	{
        $this->authentication->logout();
        
        // Redirect to login page again
        redirect('/login', 'refresh');
	}

	/**
	 * Retrieve forgotten password
	 */
	public function forgotPassword() 
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    
	    // If already logged in user, then redirect to dashboard
	    if ($this->authentication->isLogged()) {
	        redirect('/dashboard', 'refresh');
	    }
	    
	    // Add the comma separated list of
	    // required css/js resources. The
	    // css resources will be loaded in
	    // the header and the js  will be
	    // loaded in the footer section
	    $this->data['css'] = array(
	        'bootstrap', // path already entered in application/config/assets.php file
	        'custom.css' // need to give the full path inside the css directory
	    );
	    
	    $this->data['js'] = array(
	        'bootstrap',
	        'login-validation.js'
	    );
	    
	    // if GET, the show the view
	    if ($this->request == 'GET') {
	        
	    }
	    
	    elseif ($this->request == 'POST') {
	        
	        // Prepare the login form elements
	        // for validation
	        $this->form_validation->set_rules('email', 'Email', 'required');
	        
	        // validate the form
	        if ($this->form_validation->run() != FALSE) {
	            
	            $email = $this->input->post('email');
	        
    	        // if POST, check the existance of this email using authentication
	            if ($identity = $this->authentication->isEmailExist($email)) {
    	            
	                // if found, generate a retrieval key, and store this key
	                $retrievalKey = $this->authentication->getRandomToken($identity);
	                
	                // prepare a link for retrival with this key
	                $retrievalUrl = base_url() . 'reset-password/?key=' . $retrievalKey;
	                
	                // and send via email, and show message
	                $this->load->helper('send_mail');
	                
	                // Prepare the template data
	                $templateData['full_name'] = $identity->fullname;
	                $templateData['reset_link'] = $retrievalUrl;
	                $templateData['from_name'] = $this->config->item('from_name');
	                
	                $cc = $bcc = $body = '';
	                $subject = "Reset your password";
	                
	                $result = send_mail($identity->email, $cc, $bcc, $subject, $body, 'templates/emails/auth/forgot-password', $templateData);
	                if ($result) {
	                    $this->data['info'] = 'Successfully sent password reset link to your email.';
	                }
	                
	            } else {
    	        
    	           $this->data['info'] = 'Sorry! Invalid email';
	            }
	        }
	    }
	    
	    // This line will load the file
	    // views/auth/login
	    $this->load->view('auth/forgot-password', $this->data);
	}
	
	/**
	 * User comes to this link from the email sent to him
	 * to reset his password
	 */
	public function resetPassword() {
	    
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    
	    // If already logged in user, then redirect to dashboard
	    if ($this->authentication->isLogged()) {
	        redirect('/dashboard', 'refresh');
	    }
	    
	    // Add the comma separated list of
	    // required css/js resources. The
	    // css resources will be loaded in
	    // the header and the js  will be
	    // loaded in the footer section
	    $this->data['css'] = array(
	        'bootstrap', // path already entered in application/config/assets.php file
	        'custom.css' // need to give the full path inside the css directory
	    );
	    
	    $this->data['js'] = array(
	        'bootstrap',
	        'login-validation.js'
	    );
	    
	    // If key not provided
	    $key = $this->input->get('key', false);
	    if ($key) {
	        
	        // if GET, the show the view
	        if ($this->request == 'GET') {
	            
	        }
	        
	        elseif ($this->request == 'POST') {
	            
	            // Prepare the login form elements
	            // for validation
	            $this->form_validation->set_rules('new_password', 'New Password', 'required');
	            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
	            
	            // validate the form
	            if ($this->form_validation->run() != FALSE) {
	                
	                $newPassword = $this->input->post('new_password');
	                
	                // validate the key using authentication class
	                if ($this->authentication->resetPassword($key, $newPassword)) {
	                    
	                    // on success redirect to login with session flash message
	                    redirect('/login');
	                } else {
	                    // on error display error message in the view
	                    $this->data['info'] = 'Sorry! Failed';
	                }
	            }
	        }
	        
	    } else {
	        $this->data['info'] = 'Sorry! Password reset key is missing.';
	    }
	    
	    // This line will load the file
	    // views/auth/reset-password
	    $this->load->view('auth/reset-password', $this->data);
	}
}
