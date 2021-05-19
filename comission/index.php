<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логін</title>
    <?php include("../bootstrapInfo.php") ?>
</head>

<body>
<form action="comission" method="POST">
    <div class="container">
        <div class="input-group mb-3">
            <label for="basic-url">Логін</label>
            <div class="input-group mb-3">

                <input type="text" class="form-control" name="login" aria-describedby="basic-addon3">
            </div>
            <label for="basic-url">Пароль</label>
            <div class="input-group mb-3">

                <input type="text" class="form-control" name="password" aria-describedby="basic-addon3">
            </div>
            <button class="btn btn-primary btn-lg btn-block " type="submit">Увійти</button>
        </div>
    </div>
</form>


</body>

</html>

<?php
session_start();
if($_SESSION){
    session_unset();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    require "../connection.php";
    $myusername = mysqli_real_escape_string($con, $_POST['login']);
    $mypassword = mysqli_real_escape_string($con, $_POST['password']);
    
    $sql = "SELECT idadmins FROM admins WHERE adminslogin = '$myusername' and adminspassword = '$mypassword'";
    $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // $active = $row['active'];

    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    echo 'her2 ' . $count;

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        
//http://".$_SERVER['HTTP_HOST']."
        header("location: ./abitListTable.php");
    } else {
        $error = "Your Login Name or Password is invalid";
        echo $error;

    }
}



?>