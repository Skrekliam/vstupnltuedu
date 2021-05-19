<div class="container">




    <?php
    $link = 2;
    require './admin.php';

    ?>

    <div class="form-check form-switch">
        <input class="form-check-input" onclick="trigBig()" type="checkbox" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">Великі таблиці</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" onclick="trigBack()" type="checkbox" id="flexSwitchCheckDefault1">
        <label class="form-check-label"  for="flexSwitchCheckDefault1">Темний фон</label>
    </div>

    <?php

    function switchformaNavch($id)
    {
        switch ($id) {
            case 0:
                return 'Денна';
                break;
            case 1:
                return 'Заочна(дистанційна)';
                break;
            case 2:
                return 'Вечірня';
                break;
            default:
                return 'Помилка';
                break;
        }
    }

    function switchisBachelour($id)
    {
        if ($id == 0) {
            return 'Бакалавр';
        } else {
            return 'Магістр';
        }
    }

    function switchInstitute($id)
    {
        $instituteTableSql = "SELECT * FROM `institutes` where `idInstitutes`='$id'";
        $instituteTableRes = sqlStr($instituteTableSql);

        $instituteTable = mysqli_fetch_assoc($instituteTableRes);

        return $instituteTable['InstituteNameUk'];
    }

    function switchSpecialty($id)
    {
        $specialtyTableSql = "SELECT * FROM `specialty` where `idSpecialty`='$id'";
        $specialtyTableRes = sqlStr($specialtyTableSql);

        $specialtyTable = mysqli_fetch_assoc($specialtyTableRes);

        return $specialtyTable['specialtyNameUk'];
    }


    function sqlStr($str)
    {
        require '../connection.php';
        $result = mysqli_query($con, $str);
        return $result;
    }
    // var_dump($_GET);
    require '../bootstrapInfo.php';

    $id = $_GET['id'];

    // echo $sql;
    // mysqli_close($conn);
    // var_dump($result);
    // echo $_POST['count'];
    // Таблиця абітурієнт
    $abitTableSql = "SELECT * FROM `abiturients` where `idAbit`='$id'";
    $abitTableRes = sqlStr($abitTableSql);

    echo "<div class=' tables'>";
    $abitTable = mysqli_fetch_assoc($abitTableRes);
    echo '<table class=" table caption-top table-fit table-bordered"><caption>Абітурієнт</caption>
    <tr><th>Поле</th><th>Значення</th></tr>
    <tr><td>Прізвище</td><td>' . $abitTable['Surname'] . '</td></tr>
    <tr><td>Імя</td><td>' . $abitTable['Name'] . '</td></tr>
    <tr><td>По батькові</td><td>' . $abitTable['FatherName'] . '</td></tr>
    <tr><td>Ступінь навчання</td><td>' . switchisBachelour($abitTable['isBachelour']) . '</td></tr>
    <tr><td>Інститут</td><td>' . switchInstitute($abitTable['Institute']) . '</td></tr>

    </table>';

    // таблиця адреса

    $addressTableSql = "SELECT * FROM `address` where `idaddress`='$id'";
    $addressTableRes = sqlStr($addressTableSql);


    $addressTable = mysqli_fetch_assoc($addressTableRes);
    echo '<table class="table caption-top table-fit table-bordered"><caption>Адреса</caption>
    <tr><th>Поле</th><th>Значення</th></tr>
    <tr><td>Вулиця</td><td>' . $addressTable['street'] . '</td></tr>
    <tr><td>Будинок</td><td>' . $addressTable['house'] . '</td></tr>
    <tr><td>Квартира</td><td>' . $addressTable['kvart'] . '</td></tr>
    <tr><td>Місто</td><td>' . $addressTable['city'] . '</td></tr>
    <tr><td>Область</td><td>' . $addressTable['obl'] . '</td></tr>
    <tr><td>Індекс</td><td>' . $addressTable['zip'] . '</td></tr>

    </table>';


    // Інформація про абіт

    $infoTableSql = "SELECT * FROM `infoabit` where `idInfoAbit`='$id'";
    $infoTableRes = sqlStr($infoTableSql);


    $infoTable = mysqli_fetch_assoc($infoTableRes);
    echo '<table class="table caption-top table-fit table-bordered"><caption>Інформація</caption>
    <tr><th>Поле</th><th>Значення</th></tr>
    <tr><td>Оригінал документів</td><td>' . $infoTable['isOriginDocs'] . '</td></tr>
    <tr><td>Номер телефону</td><td>' . $infoTable['phone'] . '</td></tr>
    <tr><td>Email</td><td>' . $infoTable['email'] . '</td></tr>
    <tr><td>Форма навчання</td><td>' . switchformaNavch($infoTable['formaNavch'])  . '</td></tr>

    </table>';



    // Exams
    $examsTableSql = "SELECT * FROM `exams` where `idexams`='$id'";
    $examsTableRes = sqlStr($examsTableSql);




    echo '<table class="table caption-top table-fit table-bordered"><caption>Екзамени</caption>
    <tr><th>Код</th><th>Назва</th></tr>';
    while ($examsTable = mysqli_fetch_assoc($examsTableRes)) {
        echo '
        <tr><td>' . $examsTable['specid'] . '</td><td>' . switchSpecialty($examsTable['specid']) . '</td></tr>';
    }

    echo '</table></div>';

    ?>
    <!-- 
echo '<table><caption>Абітурієнт</caption>
    <tr><th></th><th></th></tr>
    <tr><td></td><td></td></tr>
    </table>'; -->

    <script>


    </script>


</div>