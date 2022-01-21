<?php
class aiModel
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    /* === Exemple Code ===

    public function updateExemple($user_id, $username)
    {
        $this->db->query('UPDATE users SET username = :username WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':username', $username);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function fetchExemple($user_id)
    {
        $this->db->query('SELECT * FROM users WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        return $this->db->fetch();
    }

    */
    
    public function getHistory($limit = null)
    {
        if($limit === null){
            $this->db->query('SELECT text_history, is_human FROM ai_history ORDER BY history_id DESC');
        } else {
            $this->db->query('SELECT text_history, is_human FROM ai_history ORDER BY history_id DESC LIMIT :limit');
            $this->db->bind(':limit', $limit);
        }

        return $this->db->fetchAll();
    }

    public function addHistory($text, $is_human = 0)
    {
        $this->db->query('INSERT INTO ai_history (text_history, is_human) VALUES (:text, :is_human)');
        $this->db->bind(':text', $text);
        $this->db->bind(':is_human', $is_human);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
