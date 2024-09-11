<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="controls.php" method="POST">
        <div class="form-control">
            <input type="text" name="flag" value="1" hidden>
            <input class="form-control" type="text" name="name" id="" placeholder="Name">
            <br>
            <input class="form-control" type="text" name="phone" id="" placeholder="Phone">
            <br>
            <input class="form-control" type="text" name="dui" id="" placeholder="DUI">
            <br>
            <input class="form-control" type="text" name="email" id="" placeholder="E-mail">
            <br>
            <input class="form-control" type="text" name="address" id="" placeholder="Address">
            <br>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</body>
</html>