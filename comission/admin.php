<?php

session_start();
// var_dump($_SESSION);
if (!$_SESSION["login_user"]) {
    header("location: http://".$_SERVER['HTTP_HOST']."/comission");
}


if (array_key_exists('closeSession', $_POST)) {
    // echo 'clear';
    session_destroy();
    header("location: comission");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вступна кампанія</title>
    <?php include('../bootstrapInfo.php'); ?>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                <span id="time" style="align-items:right;font-weight:bold;color:#fff" class="navbar-text"></span>
                
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $link===1 ?  'active' : '' ?>" aria-current="page" href="./abitListTable.php">Список студентів</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $link===2 ? 'active' : '' ?>" href="#">Інформація про студента <span class="badge bg-secondary"><?php echo $_GET['id'] ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $link===3 ? 'active' : '' ?>" href="./settings.php">Налаштування</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " onclick="handleExit()">Вихід</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script>
    window.onload = () => {
        let time;
        setInterval(() => {
            time = new Date().toLocaleTimeString();
            document.querySelector('#time').innerHTML = time;
        }, 1000)
        const ls = localStorage;
        if (!ls.getItem('tableBig')) 
            ls.setItem('tableBig', 'false');
        if (!ls.getItem('tableBack')) 
        ls.setItem('tableBack', 'false');

        

    }

    const handleExit = () => {
        location.replace('/comission');
    }
</script>

</html>