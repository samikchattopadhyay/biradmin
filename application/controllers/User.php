<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
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
        
        // If not logged in user, then redirect to login page
        if (!$this->authentication->isLogged()) {
            redirect('/login', 'refresh');
        }
    }
    
    /**
     * Checks if the username is available to use
     * 
     * @param string $username
     * @return boolean
     */
    public function isUsernameAvailable($username) {
        $res = $this->user_model->isUsernameExist($username);
        if ($res) {
        $this->validation->set_message('isUsernameAvailable', 'This username is already taken');
    }
    
    /**
     * Add a new user in database
     */
    public function add() 
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        if ($this->request == 'GET') {
            
        }
        
        elseif ($this->request == 'POST') {
            
            // Prepare the add user form elements
            // for validation
            $this->form_validation->set_rules('username', 'Username', 'required|callback_isUsernameAvailable');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('fullname', 'Full name', 'required');
            
            // validate the form
            if ($this->form_validation->run() != FALSE) {
                
                $userData = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'email' => $this->input->post('email'),
                    'role' => $this->input->post('role'),
                    'status' => $this->input->post('status'),
                    'fullname' => $this->input->post('fullname'),
                );
                
                if ($this->user_model->createNewUser($userData)) {
                    
                    // Prepare the success message
                    $this->data['info'] = 'User created successfully';
                    
                    // Refresh the page (Destroys previous form post)
                    redirect('/users/add', 'refresh');
                    
                } else {
                    $this->data['info'] = 'Sorry! Failed';
                }
                
            }
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
        
        // This line will load the file
        // views/dashboard/index
        $this->load->view('user/add', $this->data);
        
    }
    
    public function lists() {
        
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
        
        // This line will load the file
        // views/dashboard/index
        $this->load->view('user/list', $this->data);
        
    }
}