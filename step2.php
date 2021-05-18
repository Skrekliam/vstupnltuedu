<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інформаційна сторінка</title>
    <?php include('./bootstrapInfo.php') ?>
</head>

<body>
    <div class="container">





        <?php
        $savedData = $_POST;


        function checkConnection()
        {
            require('./connection.php');
            $result = mysqli_query($con, "SHOW TABLES");
            if ($result) {

                return  'success';
            } else {
                return 'danger';
            }
        }


        $alertStatus  = checkConnection();

        function sql($req, $str)
        {
            // require('./connection.php');
            // $s = mysqli_query($con, $req);
            // // print('after insert');
            require('./connection.php');


            $s = mysqli_query($con, $req);

            if (!$s) {

                // throw $e->getMessage();
                print_r($e->getMessage());
                echo '❌ <b>Дані про ' . $str . ' не відправлені</b> <br/>';
            } else {
                global $alertStatus;
                $alertStatus = 'success';
                echo '✔ Дані про ' . $str . ' відправлені <br/>';
            }
            return $s;




            // if (!$s) {

            // } else {
            //     echo '✔ Дані про ' . $str . ' відправлені <br/>';
            // }
            // $con = null;
            // return $s;
        }

        $Surname = $savedData['Surname'];
        $Name = $savedData['Name'];
        $FatherName = $savedData['FatherName'];
        $street =  $savedData['street'];
        $house =  $savedData['house'];
        $kvart =  $savedData['kvart'];
        $city =  $savedData['city'];
        $obl = $savedData['obl'];
        $zip = $savedData['zip'];
        $BDate = $savedData['BDate'];
        $phone = $savedData['phone'];
        $email = $savedData['email'];
        $stupin = intval($savedData['stupinRadio']);
        $formaNavch = intval($savedData['formaNavchRadio']);
        $institute = intval($savedData['instituteRadio']);
        $spec = $savedData['spec'];
        $prevStudy = $savedData['prevStudy'];
        $prevCol = $savedData['prevCol'];
        $yearEnd = $savedData['yearEnd'];

        // print_r($savedData);


        // $specRes = implode(',',array_values($spec));
        // print_r($savedData);
        // print_r($spec);
        // print_r(gettype($specRes));
        // echo $Surname, $Name, $FatherName, $stupin, $institute;


        // $result = "INSERT INTO abiturients(idAbit,Surname,Name,FatherName,isBachelour,Institute,Specialty) values (1,$Surname,$Name,$FatherName,$stupin,$institute,$spec)";
        $result = "INSERT INTO abiturients(Surname,Name,FatherName,isBachelour,Institute) values ('$Surname','$Name','$FatherName','$stupin','$institute')";

        echo "<div class='alert alert-" . $alertStatus . "' role='alert'>";

        sql($result, "особу");




        $select = "SELECT * FROM `abiturients` where Surname='$Surname' and Name='$Name' and FatherName='$FatherName' ORDER BY `idAbit` DESC LIMIT 1";

        // all data abiturient
        $req = sql($select, 'особовий номер');

        $f = mysqli_fetch_array($req);

        $id = $f['idAbit'];
        // print_r('id here ' . $id);

        $insAdd = "INSERT INTO address(`idaddress`,`street`,`house`,`kvart`,`city`,`obl`,`zip`) values ($id,'$street','$house','$kvart','$city','$obl','$zip')";

        sql($insAdd, "місце проживання");



        $insInfAbit = "INSERT INTO infoabit(`idInfoAbit`,`isOriginDocs`,`phone`,`email`,`formaNavch`) values ($id,0,'$phone','$email','$formaNavch')";

        sql($insInfAbit, "інформацію");




        for ($i = 0; $i < count($spec); $i++) {

            $insExam = "INSERT INTO exams(`idexams`,`specid`) values ($id,$spec[$i])";
            sql($insExam, "екзамен на спеціальність $spec[$i]");
        }
        echo '</div>';


        echo '<div style="align-items:center;text-align:center" class="alert alert-info" role="alert">
   Ваш номер<br/><p style="font-size:52px"><b>' . $id  . '</b></p>Запамятайте його, та скажіть в приймальній комісії
  </div>';

        ?>


    </div>
</body>

</html>