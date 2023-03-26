<?php
include '../model/database.php';

function get_vehicles($make_id, $type_id, $class_id, $order){
    global $db;
    if($order == 0 || $order == NULL){
        $query = get_query_price($make_id, $type_id, $class_id);
    }else{
        $query_array = get_query_year($make_id, $type_id, $class_id);
        $query = $query_array['query'];
    }
    $statement = $db->prepare($query);
    if($make_id){
        $statement->bindValue(':make_id', $make_id);
    }
    if($type_id){
        $statement->bindValue(':type_id', $type_id);
    }
    if($class_id){
        $statement->bindValue(':class_id', $class_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}


function get_query_year($make_id, $type_id, $class_id) {
    $where = array();
    $params = array();

    if ($make_id) {
        $where[] = "vehicles.make_id = :make_id";
        $params['make_id'] = $make_id;
    }

    if ($type_id) {
        $where[] = "vehicles.type_id = :type_id";
        $params['type_id'] = $type_id;
    }

    if ($class_id) {
        $where[] = "vehicles.class_id = :class_id";
        $params['class_id'] = $class_id;
    }

    if (count($where) === 0) {
        $query = 'SELECT * FROM vehicles ORDER BY year DESC';
    } else {
        $query = 'SELECT * FROM vehicles WHERE ' . implode(' AND ', $where) . ' ORDER BY year DESC';
    }

    return array('query' => $query, 'params' => $params);
}
function get_query_price($make_id = null, $type_id = null, $class_id = null){
    if(!$make_id && !$type_id && !$class_id){
    $query = 'SELECT * FROM vehicles ORDER BY price DESC';
    }
    else if (!$make_id && $type_id && $class_id){
    $query = 'SELECT * FROM vehicles WHERE (vehicles.type_id = :type_id AND vehicles.class_id = :class_id) ORDER BY price DESC';
    }
    else if ($make_id && !$type_id && $class_id){
    $query = 'SELECT * FROM vehicles WHERE (vehicles.make_id = :make_id AND vehicles.class_id = :class_id) ORDER BY price DESC';
    }
    else if ($make_id && $type_id && !$class_id){
    $query = 'SELECT * FROM vehicles WHERE (vehicles.make_id = :make_id AND vehicles.type_id = :type_id) ORDER BY price DESC';
    }
    else if ($make_id && !$type_id && !$class_id){
    $query = 'SELECT * FROM vehicles WHERE vehicles.make_id = :make_id ORDER BY price DESC';
    }
    else if (!$make_id && $type_id && !$class_id){
    $query = 'SELECT * FROM vehicles WHERE vehicles.type_id = :type_id ORDER BY price DESC';
    }
    else if (!$make_id && !$type_id && $class_id){
    $query = 'SELECT * FROM vehicles WHERE vehicles.class_id = :class_id ORDER BY price DESC';
    }
    else {
    $query = 'SELECT * FROM vehicles WHERE (vehicles.make_id = :make_id AND vehicles.type_id = :type_id AND vehicles.class_id = :class_id) ORDER BY price DESC';
    }
    return $query;
    }

function delete_vehicle($vehicle_id){
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id){
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES (:year, :model, :price, :type_id, :class_id, :make_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
   


try {
    $statement->execute();
} catch(PDOException $e) {
    error_log("Error inserting new vehicle into database: " . $e->getMessage());
    return false;
}

$statement->closeCursor();
return true;

}
?>