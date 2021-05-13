<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Подача документів, Крок 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Подача документів в приймальну комісію.</h1>
            <h1 class="display-4">Крок другий. Після коледжу</h1>
            <a class="text-mutted" onclick="easyMode()" id="changeSize">
                Збільшити розмір полів
            </a>
            <hr />
        </div>
        <input list="obl" id="oblId" placeholder="Disctricts" />
        <datalist id="obl"> </datalist>

        <input list="univ" id="univId" placeholder="Univers" />
        <datalist id="univ"> </datalist>
        <p style="color: red; font-size: 25px" id="err"></p>



    </div>
</body>
<script src="./collegeScript.js"></script>

</html>