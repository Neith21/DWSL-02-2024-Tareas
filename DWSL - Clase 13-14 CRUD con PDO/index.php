<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("./conf/conf.php");

    $object = new Connection();
    $connection = $object->Connect();

    $consult = "SELECT * FROM customer";
    $preparation = $connection->prepare($consult);
    $preparation->execute();

    $customers = $preparation->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container mt-5">
        <h2>Lista de Clientes</h2>
        <a href="customerRegistration.php" class="btn btn-success" style="margin-left: 10px;">Add customer</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>DUI</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td><?php echo $customer['id']; ?></td>
                        <td><?php echo $customer['name']; ?></td>
                        <td><?php echo $customer['phone']; ?></td>
                        <td><?php echo $customer['dui']; ?></td>
                        <td><?php echo $customer['email']; ?></td>
                        <td><?php echo $customer['address']; ?></td>
                        <td>
                            <a href="customerEdit.php?id=<?php echo $customer['id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="customerDelete.php?id=<?php echo $customer['id']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>