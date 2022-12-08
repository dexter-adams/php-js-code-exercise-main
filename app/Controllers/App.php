<?php
/**
 * App main class - provides DB connection and request helper our CRUD functions.
 */

namespace App\Controllers;

class App {
    public function __construct(  ) {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "57TihW7EekXw8967zGKc";
        $this->dbname = "appDB";
        $this->db = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function request( $path, $http_method, $data ) {
        // Existing app request actions

        switch ( $http_method ) {
            case 'GET':
                $statement = "
                    SELECT 
                        id, title, body, from, to, created, updated
                    FROM
                        messages
                    WHERE id = ?;
                ";
                try {
                    $statement = $this->db->query( $statement );
                    $res       = $statement->fetchAll( \PDO::FETCH_ASSOC );

                    return $res;
                }
                catch( \PDOException $e ) {
                    exit( $e->getMessage() );
                }
            case 'POST':
                $statement = "
                    INSERT INTO messages 
                        (id, title, body, from, to, created, updated)
                    VALUES
                        ($data->id, $data->title, $data->from, $data->created, $data->updated);
                ";
                try {
                    $statement = $this->db->query( $statement );
                    $res       = $statement->fetchAll( \PDO::FETCH_ASSOC );

                    return $res;
                }
                catch( \PDOException $e ) {
                    exit( $e->getMessage() );
                }
            case 'PUT':
                $statement = "
                    UPDATE messages
                    SET 
                        id = $data->id,
                        title  = $data->title,
                        body = $data->body,
                        from = $data->from,
                        to = $data->to,
                        created = $data->created,
                        updated = $data->updated,
                    WHERE id = $data->id;
                ";
                try {
                    $statement = $this->db->query( $statement );
                    $res       = $statement->fetchAll( \PDO::FETCH_ASSOC );

                    return $res;
                }
                catch( \PDOException $e ) {
                    exit( $e->getMessage() );
                }
            case 'DELETE':
                $statement = "
                    DELETE FROM messages
                    WHERE id = :id;
                ";
                try {
                    $statement = $this->db->query( $statement );
                    $res       = $statement->fetchAll( \PDO::FETCH_ASSOC );

                    return $res;
                }
                catch( \PDOException $e ) {
                    exit( $e->getMessage() );
                }
        }
    }
}
