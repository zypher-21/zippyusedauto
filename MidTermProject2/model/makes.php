<?php
include '../model/database.php';

if (!function_exists('get_makes')) {
    function get_makes(){
        global $db;
        if (!$db) {
            throw new Exception("Database connection not found.");
        }
        $query = 'SELECT * FROM makes ORDER BY make_id';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }
}

if (!function_exists('get_make_name')) {
    function get_make_name($make_id){
        global $db;
        $query = 'SELECT * FROM makes WHERE make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $make = $statement->fetch();
        $statement->closeCursor();
        if($make){
            $make_name= $make['make_name'];
        } else {
            $make_name = 'NULL';
        }
        return $make_name;
    }
}

if (!function_exists('delete_make')) {
    function delete_make($make_id){
        global $db;
        $query = 'DELETE FROM makes WHERE make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }
}

if (!function_exists('add_make')) {
    function add_make($make_name){
        global $db;
        $query = 'INSERT INTO makes (make_name) VALUES (:make_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_name', $make_name);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }
}
?> 