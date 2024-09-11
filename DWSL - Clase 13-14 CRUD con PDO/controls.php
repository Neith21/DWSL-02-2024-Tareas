<?php

include_once("./conf/conf.php");
$object = new Connection();
$connection = $object->Connect();

$option = isset($_POST['flag']) ? $_POST['flag']:"";
$name = isset($_POST['name']) ? $_POST['name']:"";
$phone = isset($_POST['phone']) ? $_POST['phone']:"";
$dui = isset($_POST['dui']) ? $_POST['dui']:"";
$email = isset($_POST['email']) ? $_POST['email']:"";
$address = isset($_POST['address']) ? $_POST['address']:"";
$id = isset($_POST['id']) ? $_POST['id']:"";

if ($option == 1) {
    $consult = "INSERT INTO customer(name,phone,dui,email,address)
                VALUES(:n, :p, :d, :e, :a)";
    $result = $connection->prepare($consult);
    $result->bindParam(':n', $name);
    $result->bindParam(':p', $phone);
    $result->bindParam(':d', $dui);
    $result->bindParam(':e', $email);
    $result->bindParam(':a', $address);

    $execute = $result->execute();
    return_index($execute);

} else if ($option ==2) {
    $consult = "UPDATE customer SET
                    name = :n,
                    phone = :p,
                    dui = :d,
                    email = :e,
                    address = :a
                WHERE id = :i";
    $result = $connection->prepare($consult);
    $result->bindParam(':n', $name);
    $result->bindParam(':p', $phone);
    $result->bindParam(':d', $dui);
    $result->bindParam(':e', $email);
    $result->bindParam(':a', $address);
    $result->bindParam(':i', $id);

    $execute = $result->execute();
    return_index($execute);

} else if ($option == 3) {
    $consult = "DELETE FROM customer WHERE id = :i";
    $result = $connection->prepare($consult);
    $result->bindParam(':i', $id);

    $execute = $result->execute();
    return_index($execute);

}

function return_index($execute) {
    if ($execute) {
        header('Location: index.php');
    } else {
        echo "error";
    }
}

$con -> close();

?>