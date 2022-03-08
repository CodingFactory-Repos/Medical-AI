<?php

/**
 * Class Database
 * Gère les requêtes à la bdd
 */
class Database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    /**
     * Database constructor.
     * Établi la connection à la bdd
     */

    // Permet d’écrire des requêtes
    public function sendRequest($query, $bindings = [], $return = "fetchAll")
    {
        // Create a array with all information to send to the api.
        $data = [
            'user' => $this->dbUser,
            'password' => $this->dbPass,
            'database' => $this->dbName,
            'query' => $query,
            'return' => $return,
        ];

        if (!empty($bindings)) {
            $data['bindings'] = json_encode($bindings);
        }

        $ch = curl_init($this->dbHost);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // If server doesn't respond, die error.
        if (empty($response) && $response != "0") {
            die('Erreur de connection au serveur de base de données. Verifiez les paramètres de connexion. <br>' . $this->dbHost . '<br>' . $this->dbUser . '<br>' . $this->dbPass . '<br>' . $this->dbName . '<br>Resultat : ' . $response);
        }

        // Return the response.
        $result = json_decode($response, true);

        if (isset($result['success']) && $result['success'] == false) {
            die($result['message']);
        }

        return $result;
    }
}