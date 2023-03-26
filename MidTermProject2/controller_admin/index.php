<?php
require('../model/database.php');
require('../model/classes.php');
require('../model/makes.php');
require('../model/types.php');
require('../model/vehicles.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_SPECIAL_CHARS);
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_SPECIAL_CHARS);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_SPECIAL_CHARS);

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}
$order = filter_input(INPUT_POST, 'order', FILTER_VALIDATE_INT);
if(!$order){
    $order = filter_input(INPUT_GET, 'order', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action');
if(!$action){
    $action = filter_input(INPUT_GET, 'action');
    if(!$action){
        $action = 'list_vehicles';
    }
}

switch($action) {
    case "addVehicleForm":
        $class_name = get_class_name($class_id);
        $make_name = get_make_name($make_id);
        $type_name = get_type_name($type_id);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('../controller_admin/addVehicleForm.php');
        break;
    case "list_makes":
        $makes = get_makes();
        include('../controller_admin/makeList.php');
        break;
    case "list_types":
        $types = get_types();
        include('../controller_admin/typeList.php');
        break;
    case "list_classes":
        $classes = get_classes();
        include('../controller_admin/classList.php');
        break;
    case "add_make":
        add_make($make_name);
        header("Location: .?action=list_makes");
        break;
    case "add_type":
        add_type($type_name);
        header("Location: .?action=list_types");
        break;
    case "add_class":
        add_class($class_name);
        header("Location: .?action=class_types");
        break;
    case "add_vehicle":
        if($year && $model && $price && $type_id && $class_id && $make_id){
            add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
            header("Location: .?action=list_vehicles");
        } else {
            $error = "Invalid item data. Check all fields and try again.";
            include('../view/error.php');
            exit();
        }
        break;
    case "delete_make":
        if($make_id){
            try{
                delete_make($make_id);
            } catch (Exception $e) {
                $error = "Can't delete a make if items exist with the make.";
                include('../view/error.php');
                exit();
            }
            header("Loaction: .?action=list_makes");
        }
        break;
        case "delete_type":
        if($type_id){
            try{
                delete_type($type_id);
                header("Location: .?action=list_types");
            } catch (Exception $e) {
                $error = "Can't delete a type if items exist with the type.";
                include('../view/error.php');
                exit();
            }
            header("Loaction: .?action=list_types");
        }
        break;
        case "delete_class":
        if($class_id){
            try{
                delete_class($class_id);
                header("Location: .?action=list_classes");
            } catch (Exception $e) {
                $error = "Can't delete a class if items exist with the class.";
                include('../view/error.php');
                exit();
            }
            header("Loaction: .?action=list_classes");
        }
        break;
    case "delete_vehicle":
        if ($vehicle_id) {
            delete_vehicle($vehicle_id);
            header("Location: .?make_id=$make_id&class_id=$class_id&type_id=$type_id&order=$order");
        } else {
            $error = "Missing or incorrect assignment id.";
            include('..view/error.php');
        }
        break;
    default:
        $class_name = get_class_name($class_id);
        $make_name = get_make_name($make_id);
        $type_name = get_type_name($type_id);
        $classes = get_classes();
        $makes = get_makes();
        $types = get_types();
        $vehicles = get_vehicles($make_id, $type_id, $class_id, $order);
        include('../controller_admin/adVehicleList.php');
}