
<?php

session_start();
var_dump($_SESSION);
if (!$_SESSION["login_user"]) {
    header("location: comission");
}


if (array_key_exists('closeSession', $_POST)) {
    echo 'clear';
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
    <?php include('./bootstrapInfo.php'); ?>
</head>

<body>
    <div class="container-fluid">



        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true">Список студентів</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="false">Студент</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="list" role="tabpanel" aria-labelledby="list-tab">
                <!-- start first -->

                <table class="abitList table caption-top">
                    <caption>
                        Виберіть кількість записів
                        <form action="abitListTable.php" method="post">
                            <select name="count">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="all">Всі</option>
                            </select>
                            <button type="submit">Вивід</button>
                        </form>
                    </caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Прізвище</th>
                            <th scope="col">Імя</th>
                            <th scope="col">По батькові</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php



                        // var_dump($_POST);

                        require './connection.php';
                        $limit = $_POST['count'] ? ($_POST['count'] === 'all' ? '' : 'LIMIT ' . $_POST['count']) : 'LIMIT 5';
                        $sql = "SELECT * FROM `abiturients` ORDER BY `idAbit` DESC $limit";
                        // echo $sql;
                        $result = mysqli_query($con, $sql);

                        // mysqli_close($conn);
                        // var_dump($result);
                        echo $_POST['count'];


                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {


                                echo   '<tr onClick="abitHandleClick(' . $row['idAbit'] . ')">
                                            <th scope="row">' . $row['idAbit'] . '</th>
                                            <td>' . $row['Surname'] . '</td>
                                            <td>' . $row['Name'] . '</td>
                                            <td>' . $row['FatherName'] . '</td>
                                        </tr>
                                    </tbody>


                                ';
                            }
                        } ?>
                </table>



                <!-- end first -->
            </div>
            <div class="tab-pane" id="student" role="tabpanel" aria-labelledby="student-tab">

                <iframe <?php echo 'src="./studentInfo.php/?id=' . $_GET['id'] . '"'; ?> frameborder="0"></iframe>

            </div>
            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
        </div>


    </div>



</body>
<script>
    window.onload = () => {
        // console.log(document.location);

        if(document.location.href.search('id')){
            // document.location.split('id=')[1];
            $('#myTab #student-tab').tab('show')
        }
    }

    $('#myTab a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
    function abitHandleClick(id){
        console.log(location);
        
        document.location.replace('/admin.php?id='+id);
        e.preventDefault()
    }
</script>


</html>
