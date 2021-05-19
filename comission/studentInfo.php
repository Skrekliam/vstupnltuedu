<div class="container">




    <?php
    $link = 2;
    require './admin.php';

    ?>


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
                return '-';
                break;
        }
    }

    function switchisBachelour($id)
    {
        if ($id == 0) {
            return 'Бакалавр';
        } else if ($id == 1) {
            return 'Магістр';
        } else {
            return '-';
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
    $abitTableSql = "SELECT * FROM `abiturients` where `idabiturients`='$id'";
    $abitTableRes = sqlStr($abitTableSql);

    echo "<div id='bigSwitch' class=' '>";
    $abitTable = mysqli_fetch_assoc($abitTableRes);
    echo '<table class=" table caption-top table-fit table-bordered"><caption>Абітурієнт</caption>
    <tr><th>Поле</th><th>Значення</th></tr>
    <tr  onclick="changeField(`abiturients`,`Surname`)"><td>Прізвище</td><td>' . $abitTable['Surname'] . '</td></tr>
    <tr  onclick="changeField(`abiturients`,`Name`)"><td>Імя</td><td>' . $abitTable['Name'] . '</td></tr>
    <tr  onclick="changeField(`abiturients`,`FatherName`)"><td>По батькові</td><td>' . $abitTable['FatherName'] . '</td></tr>
    <tr  onclick="changeField(`abiturients`,`isBachelour`)"><td>Ступінь навчання</td><td>' . switchisBachelour($abitTable['isBachelour']) . '</td></tr>
    <tr  onclick="changeField(`abiturients`,`Institute`)"><td>Інститут</td><td>' . switchInstitute($abitTable['Institute']) . '</td></tr>

    </table>';

    // таблиця адреса

    $addressTableSql = "SELECT * FROM `address` where `idaddress`='$id'";
    $addressTableRes = sqlStr($addressTableSql);


    $addressTable = mysqli_fetch_assoc($addressTableRes);
    echo '<table class="table caption-top table-fit table-bordered"><caption>Адреса</caption>
    <tr><th>Поле</th><th>Значення</th></tr>
    <tr onclick="changeField(`address`,`street`)"><td>Вулиця</td><td>' . $addressTable['street'] . '</td></tr>
    <tr onclick="changeField(`address`,`house`)"><td>Будинок</td><td>' . $addressTable['house'] . '</td></tr>
    <tr onclick="changeField(`address`,`kvart`)"><td>Квартира</td><td>' . $addressTable['kvart'] . '</td></tr>
    <tr onclick="changeField(`address`,`city`)"><td>Місто</td><td>' . $addressTable['city'] . '</td></tr>
    <tr onclick="changeField(`address`,`obl`)"><td>Область</td><td>' . $addressTable['obl'] . '</td></tr>
    <tr onclick="changeField(`address`,`zip`)"><td>Індекс</td><td>' . $addressTable['zip'] . '</td></tr>

    </table>';


    // Інформація про абіт

    $infoTableSql = "SELECT * FROM `infoabit` where `idinfoabit`='$id'";
    $infoTableRes = sqlStr($infoTableSql);


    $infoTable = mysqli_fetch_assoc($infoTableRes);
    echo '<table class="table caption-top table-fit table-bordered"><caption>Інформація</caption>
    <tr><th>Поле</th><th>Значення</th></tr>
    <tr  onclick="changeField(`infoabit`,`isOriginDocs`)"><td>Оригінал документів</td><td>' . $infoTable['isOriginDocs'] . '</td></tr>
    <tr  onclick="changeField(`infoabit`,`phone`)"><td>Номер телефону</td><td>' . $infoTable['phone'] . '</td></tr>
    <tr  onclick="changeField(`infoabit`,`email`)"><td>Email</td><td>' . $infoTable['email'] . '</td></tr>
    <tr  onclick="changeField(`infoabit`,`formaNavch`)"><td>Форма навчання</td><td>' . switchformaNavch($infoTable['formaNavch'])  . '</td></tr>

    </table>';



    // Exams
    $examsTableSql = "SELECT * FROM `exams` where `idexams`='$id'";
    $examsTableRes = sqlStr($examsTableSql);






    echo '<table class="table caption-top table-fit table-bordered"><caption>Екзамени</caption>
    <tr><th>Код</th><th>Назва</th></tr>';
    while ($examsTable = mysqli_fetch_assoc($examsTableRes)) {
        echo '
        <tr onclick="changeField(`Не працює`,`Допишіть вручну`)"><td >' . $examsTable['specid'] . '</td><td>' . switchSpecialty($examsTable['specid']) . '</td></tr>';
    }

    echo '</table></div>';

// Інформація про абіт

$collageSql = "SELECT * FROM `collageinfo` where `idcollageinfo`='$id'";
$collageRes = sqlStr($collageSql);


$collage = mysqli_fetch_assoc($collageRes);
echo '<table class="table caption-top table-fit table-bordered"><caption>Коледж</caption>
<tr><th>Поле</th><th>Значення</th></tr>
<tr  onclick="changeField(`collage`,`obl`)"><td>Область</td><td>' . $collage['obl'] . '</td></tr>
<tr  onclick="changeField(`collage`,`col`)"><td>Назва НЗ</td><td>' . $collage['col'] . '</td></tr>
<tr  onclick="changeField(`collage`,`year`)"><td>Рік закінчення</td><td>' . $collage['year'] . '</td></tr>

</table>';





    ?>

    <div class="container">
        <table class="table caption-top table-bordered">
            <caption>Зміна значення</caption>
            <thead>
                <th>Таблиця</th>
                <th>Поле</th>
                <th>Індекс</th>
                <th>Нове значення</th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td id="chTable"></td>
                    <td id="chField"></td>
                    <td id="id"><?php echo $id ?></td>
                    <td><input id="chInput" class="form-control" type="text" required></td>
                    <td><button id="update" class="btn btn-outline-success" type="button">Оновити</button></td>
                </tr>
            </tbody>

        </table>
    </div>

    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Друк заяви</h5>
            <p class="card-text">Заява бакалавр на молодшого спеціаліста.</p>
            <a target="_blank" href="./zayava_mol_spec/2-n-10112.php?id=<?php echo $id; ?>" class="btn btn-primary w-50">Друк</a>
        </div>
    </div>





    <script>
        window.onload = () => {
            let tables = document.getElementsByTagName('table');
            const ls = localStorage;
            console.log(tables);
            for (table of tables) {


                if (ls.getItem('tableBack') === 'true') {
                    table.classList.add("table-dark");

                } else {
                    table.classList.remove("table-dark");
                }

            };
            const bigSel = document.querySelector("#bigSwitch");
            if (ls.getItem('tableBig') === 'false') {
                bigSel.classList.add("tables");

            } else {
                bigSel.classList.remove("tables");
            }
        }

        function changeField(tableName, fieldName) {
            document.querySelector('#chTable').innerHTML = tableName;
            document.querySelector('#chField').innerHTML = fieldName;
        }


        $('#update').click(() => {
            let tbl = document.querySelector('#chTable').innerHTML;
            let fld = document.querySelector('#chField').innerHTML;
            let id = document.querySelector('#id').innerHTML;
            let newVal = document.querySelector('#chInput').value;

            $.ajax({
                url: './updateField.php',
                data: {
                    table: tbl,
                    field: fld,
                    id: id,
                    val: newVal
                },
                success: function(str) {
                    alert(str);
                    location.reload();
                }
            });

        });
    </script>


</div>