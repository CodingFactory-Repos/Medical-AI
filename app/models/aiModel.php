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
        $bind = [];

        if ($limit === null) {
            $query = 'SELECT a_text_history, a_is_human FROM ai_history ORDER BY a_id DESC';
        } else {
            $query = 'SELECT a_text_history, a_is_human FROM ai_history ORDER BY a_id DESC LIMIT :limit';

            $bind = [
                ':limit' => $limit
            ];
        }

        return $this->db->sendRequest($query, $bind, 'fetchAll');
    }

    public function addHistory($text, $is_human = 0)
    {
        $query = 'INSERT INTO ai_history (a_text_history, a_is_human) VALUES (:text, :is_human)';

        $bind = [
            ':text' => $text,
            ':is_human' => $is_human
        ];

        return $this->db->sendRequest($query, $bind, 'execute');
    }
}
