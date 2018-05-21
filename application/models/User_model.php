<?php

class User_model extends CI_Model {
    
    private $_table = 'users';
    private $_pkey = 'id';
    
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
}