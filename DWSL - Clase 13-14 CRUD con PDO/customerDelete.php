<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Customer Deletion</title>
</head>
<body>
<?php

include_once("./conf/conf.php");

    $object = new Connection();
    $connection = $object->Connect();

    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $consult = "SELECT * FROM customer WHERE id= :i";
    $preparation = $connection->prepare($consult);
    $preparation->bindParam(':i', $id, PDO::PARAM_INT);
    $preparation->execute();

    $customer = $preparation->fetch(PDO::FETCH_ASSOC);
?>

<form action="controls.php" method="POST">
    <div class="form-group">
        <input type="hidden" name="flag" value="3">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <dl class="row">
            <dt class="col-sm-2">Name</dt>
            <dd class="col-sm-10">
                <p class="form-control-static"><?php echo $customer['name']; ?></p>
            </dd>
            <dt class="col-sm-2">Phone</dt>
            <dd class="col-sm-10">
                <p class="form-control-static"><?php echo $customer['phone']; ?></p>
            </dd>
            <dt class="col-sm-2">DUI</dt>
            <dd class="col-sm-10">
                <p class="form-control-static"><?php echo $customer['dui']; ?></p>
            </dd>
            <dt class="col-sm-2">Email</dt>
            <dd class="col-sm-10">
                <p class="form-control-static"><?php echo $customer['email']; ?></p>
            </dd>
            <dt class="col-sm-2">Address</dt>
            <dd class="col-sm-10">
                <p class="form-control-static"><?php echo $customer['address']; ?></p>
            </dd>
        </dl>

        <button class="btn btn-danger" type="submit">Delete</button>
    </div>
</form>

</body>
</html>
