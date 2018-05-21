<?php

class User_model extends CI_Model {
    
    private $_table = 'users';
    private $_pkey = 'id';
    
    /**
     * Checks if the user credentials given is correct
     * 
     * @param mixed $config
     * @param string $identity
     * @param string $credential
     * @param array $extraParams
     * @return mixed|boolean
     */
    public function isAuthorized($config, $identity, $credential, $extraParams = array()) {
        
        $identity = $this->db->escape($identity);
        $credential = $this->db->escape($credential);
        
        // Check if identity and credential column 
        // values matches the posted data
        $sql = "select
            id,
            username,
            email,
            fullname,
            role
        from {$this->_table}
        where {$config['identity_col']} = {$identity}
        and {$config['credential_col']} = md5(concat({$credential}, salt)) ";
        if (count($extraParams)) {
            $sql .= " and $extraParams";
        }
        
        $query = $this->db->query($sql);
        $result = $query->row();
        
        if ($result && count($result)) {
            return $result;
        }
        
        return false;
    }
    
    /**
     * Check if the email given exists in database
     * 
     * @param string $email
     */
    public function isEmailExist($config, $email) {
        
        $email = $this->db->escape($email);
        
        // Check if email already registered
        $sql = "select
            id,
            username,
            email,
            fullname,
            role
        from {$this->_table}
        where {$config['email_col']} = {$email}";
        
        $query = $this->db->query($sql);
        $result = $query->row();
        
        if ($result && count($result)) {
            return $result;
        }
        
        return false;
    }
    
    /**
     * Reset the users password with the new password given
     * 
     * @param number $userId
     * @param string $newPassword
     */
    public function resetPassword($userId, $newPassword) 
    {
        $CI =& get_instance();
        $CI->load->library('Tokenmaker');
        
        $salt = $CI->tokenmaker->getToken(10);
        $this->db->where($this->_pkey, $userId);
        return $this->db->update($this->_table, array(
            'salt' => $salt,
            'password' => md5($newPassword . $salt),
        ));
    }

    /**
     * Create a new user
     * 
     * @param mixed $userData
     */
    public function createNewUser($userData)
    {
        $CI =& get_instance();
        $CI->load->library('Tokenmaker');
        
        // Prepare the salt
        $salt = $CI->tokenmaker->getToken(10);
        $userData['salt'] = $salt;
        
        // Add salt with the password and create hash
        $passwordHash = md5($userData['password'] . $salt);
        
        // Put the password hash back
        $userData['password'] = $passwordHash;
        
        return $this->db->insert($this->_table, $userData);
    }
    
    
    function isUsernameExist($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->_table);
        return $query->num_rows() > 0;
    }
}