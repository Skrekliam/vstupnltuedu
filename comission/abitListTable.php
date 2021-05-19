<head>

    <?php
    $link = 1;
    include './admin.php';
    // session_start();

    // if (!$_SESSION["login_user"]) {
    //     header("location: login.php");
    // }





    // include('../bootstrapInfo.php'); 
    ?>
</head>


<div class="container">
    <table class="abitList table caption-top table-lg">
        <caption>
            Виберіть кількість записів
            <div class="col-xl-3">
                <form action="abitListTable.php" method="post">
                    <div class="input-group">

                        <select name="count" class="form-select">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="all">Всі</option>
                        </select>
                        <button type="submit" class="btn btn-outline-primary">Вивід</button>
                    </div>
                    <p>Пошук за ID</p>
                    <div class="input-group">
                        <span class="input-group-text">ID:</span>
                        <input type="text" id="ID" onkeydown="handleEnter(event)" class="form-control" />
                        <button type="button" class="btn btn-outline-primary" onclick="handleID()">Пошук</button>
                    </div>

                </form>
            </div>

        </caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Прізвище</th>
                <th scope="col">Імя</th>
                <th scope="col">По батькові</th>
            </tr>
        </thead>
        <tbody class="table-striped">
            <?php



            // var_dump($_POST);

            require '../connection.php';
            $limit = $_POST['count'] ? ($_POST['count'] === 'all' ? '' : 'LIMIT ' . $_POST['count']) : 'LIMIT 5';
            $sql = "SELECT * FROM `abiturients` ORDER BY `idabiturients` DESC $limit";
            // echo $sql;
            $result = mysqli_query($con, $sql);

            // mysqli_close($conn);
            // var_dump($result);
            echo $_POST['count'];


            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {


                    echo   '<tr onClick="abitHandleClick(' . $row['idabiturients'] . ')">
                                            <th scope="row">' . $row['idabiturients'] . '</th>
                                            <td>' . $row['Surname'] . '</td>
                                            <td>' . $row['Name'] . '</td>
                                            <td>' . $row['FatherName'] . '</td>
                                        </tr>
                                    </tbody>


                                ';
                }
            } ?>
    </table>


</div>
<?php








?>
<script>
    

    function abitHandleClick(id) {
        console.log(location);

        document.location.replace('studentInfo.php?id=' + id);
        e.preventDefault()
    }

    function handleID() {
        let id = document.querySelector("#ID").value.replace(/[^0-9]/g, '');
        document.location.replace('studentInfo.php?id=' + id);
    }
    window.onload = () => {
        let table = document.getElementsByTagName('table')[0];
        const ls = localStorage;
        if (ls.getItem('tableBack') === 'true') {
            table.classList.add("table-dark");
            // table.classList.toggle("table-striped");

        } else {
            table.classList.remove("table-dark");
            // table.classList.toggle("table-striped");
        }
    }

    function handleEnter(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            handleID();
        }

    }
</script>