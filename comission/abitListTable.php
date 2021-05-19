<head>

    <?php 
    session_start();

    if (!$_SESSION["login_user"]) {
        header("location: login.php");
    }
    
    
    
    
    
    include('../bootstrapInfo.php'); ?>
</head>



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

                        require '../connection.php';
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



        <?php








?>
<script>
    function abitHandleClick(id){
        console.log(location);
        
        document.location.replace('/admin.php?id='+id);
        e.preventDefault()
    }
</script>