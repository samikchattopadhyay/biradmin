<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication {
    
    private $_config = array();
    
    /**
     * Setup the auth configurations
     */
    public function __construct($config) {
        $this->_config = $config;
        $this->CI =& get_instance();
        $this->CI->load->model('user_model');
    }
    
    /**
     * Sets the user data in SESSION
     * 
     * @param string $identity
     */
    private function _setIdentityInSession($identity) {
        $this->CI->session->set_userdata(array(
            'user' => $identity
        ));
    }
    
    /**
     * Login process
     * 
     * @param string $identity
     * @param string $credential
     * @param array $extraParams
     * @return boolean
     */
    public function login($identity, $credential, $extraParams = array())
    {
        if ($identity = $this->CI->user_model->isAuthorized($this->_config, $identity, $credential, $extraParams)) {
            $this->_setIdentityInSession($identity);
            return true;
        }
        
        return false;
    }
    
    /**
     * Checks if the user is logged in or not
     * 
     * @return boolean
     */
    public function isLogged() {
        $userData = $this->CI->session->userdata('user');
        return (count($userData) && isset($userData->id) && $userData->id);
    }

    /**
     * Clears user data from SESSION, thus, logging out the user
     */
    public function logout() {
        $this->CI->session->unset_userdata('user');
    }
    
    /**
     * 
     * @param string $email
     */
    public function isEmailExist($email) {
        
        if ($identity = $this->CI->user_model->isEmailExist($this->_config, $email)) {
            return $identity;
        }
        
        return false;
    }
    
    /**
     * 
     * @param mixed $identity
     * @return string
     */
    public function getRandomToken($identity) {
        
        $this->CI->load->library('Tokenmaker');
        $this->CI->load->model('retrieve_model');
        
        // Generate random token for this user identity
        $randomToken = md5($identity->id . $identity->email . $this->CI->tokenmaker->getToken());
        
        // Add new entry for 1 day of validity
        $validUpto = time() + (60 * 60 * 24 * 1);
        $this->CI->retrieve_model->add($identity->id, $randomToken, $validUpto);
        
        return $randomToken;
    }
    
    /**
     * 
     * @param string $resetKey
     */
    private function validateResetKey($resetKey) {
        
        $this->CI->load->model('retrieve_model');
        return $this->CI->retrieve_model->findResetKey($resetKey);
    }
    
    /**
     * 
     * @param string $resetKey
     * @param string $newPassword
     */
    public function resetPassword($resetKey, $newPassword) {
        
        // Get the user ID for which this key was registered
        if ($userId = $this->validateResetKey($resetKey)) {
            
            // Reset the old password with the new one
            $result = $this->CI->user_model->resetPassword($userId, $newPassword);
            
            if ($result) {
                
                // Remove the entry in retrieve table of this user_id
                $this->CI->retrieve_model->removeResetKey($userId);
                
                return true;
            }
        }
        
        return false;
    }
}