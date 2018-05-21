<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
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
            'credential_col' => 'password'
        ));
        
        // If not logged in user, then redirect to login page
        if (!$this->authentication->isLogged()) {
            redirect('/login', 'refresh');
        }
    }

	/**
	 * Dashboard 
	 */
	public function index()
	{
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
	    $this->load->view('dashboard/index', $this->data);
	}
}
