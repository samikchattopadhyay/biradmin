<?php

class Retrieve_model extends CI_Model {
    
    private $_table = 'retrieve';
    private $_pkey = 'id';
    
    /**
     * 
     * @param number $userId
     * @param string $randomToken
     * @param number $validUpto
     * @return boolean|mixed
     */
    public function add($userId, $randomToken, $validUpto) {
        
        $sql = "INSERT INTO {$this->_table} 
        (user_id, retrieval_key, valid_upto) 
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE 
        retrieval_key=?,
        valid_upto=?";
        
        return $this->db->query($sql, array($userId, $randomToken, $validUpto, $randomToken, $validUpto));
    }
    
    /**
     * 
     * @param string $resetKey
     * @return boolean
     */
    public function findResetKey($resetKey) {
        
        $sql = "select
            user_id
        from {$this->_table}
        where retrieval_key = '{$resetKey}'
        and valid_upto <= NOW()";
        
        $query = $this->db->query($sql);
        $result = $query->row();
        
        return empty($result) ? false : $result->user_id;
    }
    
    /**
     * 
     * @param number $userId
     */
    public function removeResetKey($userId)
    {
        return $this->db->delete($this->_table, array('user_id' => $userId)); 
    }
}