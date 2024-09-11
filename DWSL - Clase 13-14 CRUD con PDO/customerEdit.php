<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Customer Edition</title>
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

    <div class="container mt-5">
        <h2>Editar Cliente</h2>
        <form action="controls.php" method="POST">
            <input type="hidden" name="flag" value="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="name" value="<?php echo $customer['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input class="form-control" type="text" name="phone" value="<?php echo $customer['phone']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="dui" class="form-label">DUI</label>
                <input class="form-control" type="text" name="dui" value="<?php echo $customer['dui']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" value="<?php echo $customer['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <input class="form-control" type="text" name="address" value="<?php echo $customer['address']; ?>">
            </div>
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</body>

</html>