  <?php



$date = new DateTime();

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
    function spliceLong($str){
        $expstr = explode(' ',$str);
        $cnt = 0;
        $len = 0;
    
        foreach($expstr as &$i){
            if($cnt < 130){
                $len = $len + 1;
                $cnt = $cnt + strlen($i);
            }
        }
        $first = implode(' ',array_slice($expstr,0,$len));
        $sec =  implode(' ',array_slice($expstr,$len, count($expstr)-$len));
        return [$first,$sec];
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
    require '../../connection.php';
    $result = mysqli_query($con, $str);
    return $result;
}
$id=137;
// Таблиця абітурієнт
$abitTableSql = "SELECT * FROM `abiturients` where `idabiturients`='$id'";
$abitTableRes = sqlStr($abitTableSql);

$abitTable = mysqli_fetch_assoc($abitTableRes);

// таблиця адреса
$addressTableSql = "SELECT * FROM `address` where `idaddress`='$id'";
$addressTableRes = sqlStr($addressTableSql);

$addressTable = mysqli_fetch_assoc($addressTableRes);

// Інформація про абіт

$infoTableSql = "SELECT * FROM `infoabit` where `idinfoabit`='$id'";
$infoTableRes = sqlStr($infoTableSql);


$infoTable = mysqli_fetch_assoc($infoTableRes);

// Exams
$examsTableSql = "SELECT * FROM `exams` where `idexams`='$id'";
$examsTableRes = sqlStr($examsTableSql);

//collage
$collageSql = "SELECT * FROM `collageinfo` where `idcollageinfo`='$id'";
$collageRes = sqlStr($collageSql);


$collage = mysqli_fetch_assoc($collageRes);



?>  




<!DOCTYPE html>
<!-- Created by pdf2htmlEX (https://github.com/coolwanglu/pdf2htmlex) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="base.min.css" />
    <link rel="stylesheet" href="fancy.min.css" />
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="./zayavastyles.css" />
    <script src="compatibility.min.js"></script>
    <script src="theViewer.min.js"></script>
    <script>
        try {
            theViewer.defaultViewer = new theViewer.Viewer({});
        } catch (e) {}
    </script>
    <title></title>
</head>

<body>
    <div id="sidebar">
        <div id="outline">
        </div>
    </div>
    <div id="page-container">
        <div id="pf1" class="pf w0 h0" data-page-no="1">
            <div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" alt="" src="bg1.png" />
                <div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">ЗАТВЕРДЖЕНО</div>
                <div class="t m0 x1 h2 y2 ff1 fs0 fc0 sc0 ls0 ws0">Наказ<span class="ff2"> </span>Міністерства<span class="ff2"> </span>освіти</div>
                <div class="t m0 x1 h2 y3 ff1 fs0 fc0 sc0 ls0 ws0">і<span class="ff2"> </span>науки<span class="ff2"> </span>України</div>
                <div class="t m0 x1 h2 y4 ff2 fs0 fc0 sc0 ls0 ws0">13 <span class="ff1">лютого</span> 2019 <span class="ff1">року</span> <span class="ff1">№</span> 179</div>
                <div class="t m0 x2 h3 y5 ff3 fs0 fc0 sc0 ls0 ws0">Форма<span class="ff4"> </span>№<span class="ff4"> </span>Н-1.01.1.2</div>
                <div class="t m0 x3 h4 y6 ff1 fs1 fc0 sc0 ls0 ws0">Першочерговий<span class="ff2"> </span>вступ<span class="ff2"> </span></div>
                <div class="t m0 x0 h4 y7 ff1 fs1 fc0 sc0 ls0 ws0">Керівнику<span class="ff2 user-text"><!-- first --->     Національного Лісотехнічого Університету України</span></div>
                <div class="t m0 x4 h5 y8 ff1 fs2 fc0 sc0 ls0 ws0">(найменування<span class="ff2"> </span>закладу<span class="ff2"> </span>вищої<span class="ff2"> </span>освіти)</div>
                <div class="t m0 x0 h4 y9 ff1 fs1 fc0 sc0 ls0 ws0">вступника<span class="ff2 user-text"><!-- name,surname --->    <?php
                // name surname
                echo $abitTable['Surname'].' '.$abitTable['Name'].' '.$abitTable['FatherName'] 
                 
                 ?>  </span></div>
                <div class="t m0 x5 h5 ya ff1 fs2 fc0 sc0 ls0 ws0">(прізвище,<span class="ff2"> </span>ім’я,<span class="ff2"> </span>по<span class="ff2"> </span>батькові)</div>
                <div class="t m0 x5 h6 yb ff3 fs3 fc0 sc0 ls0 ws0">ЗАЯВА</div>
                <div class="t m0 x0 h4 yc ff1 fs1 fc0 sc0 ls0 ws0">Прошу<span class="ff2"> </span>допустити<span class="ff2"> </span>мене<span class="ff2"> </span>до<span class="ff2"> </span>участі<span class="ff2"> </span>в<span class="ff2"> </span>конкурсному<span class="ff2"> </span>відборі<span class="ff2"> </span>на<span class="ff2"> </span>навчання<span class="ff2"> </span>за<span class="ff2 user-text"> <!--formaNavch-->      <?php echo switchformaNavch($infoTable['formaNavch']) ?>      </span>формою<span class="ff2"> </span>здобуття<span class="ff2"> </span>освіти</div>
                <div class="t m0 x6 h5 yd ff2 fs2 fc0 sc0 ls0 ws0"> <span class="ff1">(денна,</span> <span class="ff1">заочна</span> <span class="ff1">(дистанційна),</span> <span class="ff1">вечірня)</span></div>
                <div class="t m0 x0 h4 ye ff1 fs1 fc0 sc0 ls0 ws0">для<span class="ff2"> </span>здобуття<span class="ff2"> </span>ступеня<span class="ff2 user-text"><!-- stupin -->   <?php
                // stupin osv
                echo switchisBachelour($abitTable['isBachelour']) 
                
                ?>  </span></div>
                <div class="t m0 x7 h5 yf ff1 fs2 fc0 sc0 ls0 ws0">(бакалавр<span class="ff2"> </span>або<span class="ff2"> </span>магістр)</div>
                <div class="t m0 x0 h4 y10 ff1 fs1 fc0 sc0 ls0 ws0">на<span class="ff2"> </span>основі<span class="ff2"> </span>освітньо-кваліфікаційного<span class="ff2"> </span>рівня<span class="ff2"> </span>молодшого<span class="ff2"> </span>спеціаліста</div>
                <div class="t m0 x0 h7 y11 ff1 fs1 fc0 sc0 ls0 ws0">конкурсна<span class="ff2"> </span>пропозиція<span class="ff2"> <span class="fs4"><!-- exams -->   <?php 
                //exams
                echo '__________________________________________________'

                ?>  </span></span></div>
                <div class="t m0 x8 h5 y12 ff1 fs2 fc0 sc0 ls0 ws0">(назва<span class="ff2"> </span>конкурсної<span class="ff2"> </span>пропозиції<span class="ff2"> </span>державною<span class="ff2"> </span>мовою)</div>
                <div class="t m0 x0 h7 y13 ff1 fs1 fc0 sc0 ls0 ws0">спеціальність/напрям<span class="ff2 fs4 user-text">   <?php
                $examsTableRes = sqlStr($examsTableSql);
                while ($examsTable = mysqli_fetch_assoc($examsTableRes)) 
                { 
                    
                        echo $examsTable['specid'] . ', ' ;
                        
                    }
                
                
                ?>  </span></div>
                <div class="t m0 x9 h5 y14 ff1 fs2 fc0 sc0 ls0 ws0">(код<span class="ff2"> </span>та<span class="ff2"> </span>найменування<span class="ff2"> </span>спеціальності,<span class="ff2"> </span>спеціалізації<span class="ff2"> </span>спеціальностей<span class="ff2"> 014, 015, 035, 275)</span></div>
                <div class="t m0 x0 h7 y15 ff2 fs4 fc0 sc0 ls0 ws0 user-text">  <?php 
                    
                    $examsTableRes = sqlStr($examsTableSql);
                    $lim = 0;
                    while ($examsTable = mysqli_fetch_assoc($examsTableRes)) 
                    { 
                        if($lim<2){
                            echo switchSpecialty($examsTable['specid']).', ' ;
                            $lim = $lim + 1;  
                        }
                    }   

                ?>  </div>
                <div class="t m0 xa h5 y16 ff1 fs2 fc0 sc0 ls0 ws0">(назва<span class="ff2"> </span>спеціалізації<span class="ff2"> </span>та/або<span class="ff2"> </span>освітньої<span class="ff2"> </span>програми<span class="ff2"> </span>державною<span class="ff2"> </span>мовою)</div>
                <div class="t m0 xb h4 y17 ff2 fs1 fc0 sc0 ls0 ws0"> <span class="_ _0"> </span><span class="ff1">Претендую</span> <span class="_ _0"> </span><span class="ff1">на</span> <span class="_ _0"> </span><span class="ff1">участь</span> <span class="_ _0"> </span><span class="ff1">у</span> <span class="_ _0"> </span><span class="ff1">конкурсі</span> <span class="_ _0"> </span><span class="ff1">на</span> <span class="_ _0"> </span><span class="ff1">місця</span> <span class="_ _0"> </span><span class="ff1">за</span> <span class="_ _0"> </span><span class="ff1">кошти</span> <span class="_ _0"> </span><span class="ff1">державного</span> <span class="_ _0"> </span><span class="ff1">або</span> <span class="_ _0"> </span><span class="ff1">регіонального</span> <span class="_ _0"> </span><span class="ff1">бюджету</span> <span class="_ _0"> </span><span class="ff1">і</span> <span class="_ _0"> </span><span class="ff1">на</span> <span class="_ _0"> </span><span class="ff1">участь</span> <span class="_ _0"> </span><span class="ff1">у</span> </div>
                <div class="t m0 x0 h4 y18 ff1 fs1 fc0 sc0 ls0 ws0">конкурсі<span class="ff2"> <span class="_ _1"> </span></span>на<span class="ff2"> <span class="_ _1"> </span></span>місця<span class="ff2"> <span class="_ _1"> </span></span>за<span class="ff2"> <span class="_ _1"> </span></span>кошти<span class="ff2"> <span class="_ _1"> </span></span>фізичних<span class="ff2"> <span class="_ _1"> </span></span>та/або<span class="ff2"> <span class="_ _1"> </span></span>юридичних<span class="ff2"> <span class="_ _1"> </span></span>осіб<span class="ff2"> <span class="_ _1"> </span></span>у<span class="ff2"> <span class="_ _1"> </span></span>разі<span class="ff2"> <span class="_ _1"> </span></span>неотримання<span class="ff2"> <span class="_ _1"> </span></span>рекомендації<span class="ff2"> <span class="_ _1"> </span></span>за<span class="ff2"> <span class="_ _1"> </span></span>цією<span class="ff2"> <span class="_ _1"> </span></span>конкурсною<span class="ff2"> </span></div>
                <div class="t m0 x0 h4 y19 ff1 fs1 fc0 sc0 ls0 ws0">пропозицією<span class="ff2"> </span>за<span class="ff2"> </span>кошти<span class="ff2"> </span>державного<span class="ff2"> </span>або<span class="ff2"> </span>регіонального<span class="ff2"> </span>бюджету.</div>
                <div class="t m0 xb h4 y1a ff2 fs1 fc0 sc0 ls0 ws0"> <span class="_ _2"></span><span class="ff1">Претендую</span> <span class="_ _2"></span><span class="ff1">на</span> <span class="_ _2"></span><span class="ff1">участь</span> <span class="_ _2"></span><span class="ff1">у</span> <span class="_ _2"></span><span class="ff1">конкурсі</span> <span class="_ _2"></span><span class="ff1">виключно</span> <span class="_ _2"></span><span class="ff1">на</span> <span class="_ _2"></span><span class="ff1">місця</span> <span class="_ _2"></span><span class="ff1">за</span> <span class="_ _2"></span><span class="ff1">кошти</span> <span class="_ _2"></span><span class="ff1">фізичних</span> <span class="_ _2"></span><span class="ff1">та/або</span> <span class="_ _2"></span><span class="ff1">юридичних</span> <span class="_ _2"></span><span class="ff1">осіб,</span> <span class="_ _2"></span><span class="ff1">повідомлений</span> </div>
                <div class="t m0 x0 h4 y1b ff1 fs1 fc0 sc0 ls0 ws0">про<span class="ff2"> </span>неможливість<span class="ff2"> </span>переведення<span class="ff2"> </span>в<span class="ff2"> </span>межах<span class="ff2"> </span>вступної<span class="ff2"> </span>кампанії<span class="ff2"> </span>на<span class="ff2"> </span>місця<span class="ff2"> </span>за<span class="ff2"> </span>кошти<span class="ff2"> </span>державного<span class="ff2"> </span>або<span class="ff2"> </span>регіонального<span class="ff2"> </span>бюджету.</div>
                <div class="t m0 x8 h6 y1c ff3 fs3 fc0 sc0 ls0 ws0">Про<span class="ff4"> </span>себе<span class="ff4"> </span>повідомляю</div>
                <div class="t m0 x0 h4 y1d ff1 fs1 fc0 sc0 ls0 ws0">Відповідний<span class="ff2"> <span class="_ _3"> </span></span>ступінь<span class="ff2"> <span class="_ _3"> </span></span>вищої<span class="ff2"> <span class="_ _3"> </span></span>освіти<span class="ff2"> <span class="_ _3"> </span></span>за<span class="ff2"> <span class="_ _3"> </span></span>бюджетні<span class="ff2"> <span class="_ _3"> </span></span>кошти:<span class="ff2"> <span class="_ _3"> </span></span>ніколи<span class="ff2"> <span class="_ _3"> </span></span>не<span class="ff2"> <span class="_ _3"> </span></span>здобувався<span class="ff2"> <span class="_ _4"> </span>; <span class="_ _3"> </span></span>вже<span class="ff2"> <span class="_ _3"> </span></span>здобутий<span class="ff2"> <span class="_ _3"> </span></span>раніше<span class="ff2"> <span class="_ _4"> </span>; </span></div>
                <div class="t m0 x0 h4 y1e ff1 fs1 fc0 sc0 ls0 ws0">вже<span class="ff2"> </span>здобувався<span class="ff2"> </span>раніше<span class="ff2"> </span>(навчання<span class="ff2"> </span>не<span class="ff2"> </span>завершено)<span class="ff2"> </span></div>
                <div class="t m0 x0 h4 y1f ff1 fs1 fc0 sc0 ls0 ws0">Закінчив(ла)<span class="ff2 user-text">   <?php 
                [$f,$s] = spliceLong($collage['col']);
                echo $f;

                ?>  </span></div>
                <div class="t m0 xc h5 y20 ff1 fs2 fc0 sc0 ls0 ws0">(повне<span class="ff2"> </span>найменування<span class="ff2"> </span>закладу<span class="ff2"> </span>освіти,<span class="ff2"> </span>рік<span class="ff2"> </span>закінчення)</div>
                <div class="t m0 x0 h4 y21 ff2 fs1 fc0 sc0 ls0 ws0 "><span class="user-text">  <?php echo $s . ', '.$collage['year']  ?>  </span>. <span class="ff1">Іноземна</span> <span class="ff1">мова,</span> <span class="ff1">яку</span> <span class="ff1">вивчав(ла)</span> ____________________</div>
                <div class="c x0 y22 w2 h8">
                    <div class="t m0 xd h9 y23 ff1 fs5 fc0 sc0 ls0 ws0">№<span class="ff2"> </span></div>
                    <div class="t m0 xe h9 y24 ff1 fs5 fc0 sc0 ls0 ws0">з/п</div>
                </div>
                <div class="c xf y22 w3 h8">
                    <div class="t m0 x10 h9 y25 ff1 fs5 fc0 sc0 ls0 ws0">Конкурсний<span class="ff2"> </span>предмет*</div>
                </div>
                <div class="c xc y22 w4 h8">
                    <div class="t m0 x11 h9 y25 ff1 fs5 fc0 sc0 ls0 ws0">Рік</div>
                </div>
                <div class="c x12 y22 w5 h8">
                    <div class="t m0 xd h9 y25 ff1 fs5 fc0 sc0 ls0 ws0">Бал</div>
                </div>
                <div class="c x13 y22 w6 h8">
                    <div class="t m0 xe h9 y23 ff1 fs5 fc0 sc0 ls0 ws0">№<span class="ff2"> </span></div>
                    <div class="t m0 xe h9 y24 ff1 fs5 fc0 sc0 ls0 ws0">з/п</div>
                </div>
                <div class="c x14 y22 w7 h8">
                    <div class="t m0 x15 h9 y25 ff1 fs5 fc0 sc0 ls0 ws0">Складова<span class="ff2"> </span>конкурсного<span class="ff2"> </span>бала</div>
                </div>
                <div class="c x16 y22 w8 h8">
                    <div class="t m0 x11 h9 y25 ff1 fs5 fc0 sc0 ls0 ws0">Бал</div>
                </div>
                <div class="c x0 y26 w2 ha">
                    <div class="t m0 x17 h9 y27 ff2 fs5 fc0 sc0 ls0 ws0">1</div>
                </div>
                <div class="c xf y26 w3 ha">
                    <div class="t m0 x15 h9 y28 ff1 fs5 fc0 sc0 ls0 ws0">Українська<span class="ff2"> </span>мова<span class="ff2"> </span>і<span class="ff2"> </span>література</div>
                </div>
                <div class="c xc y26 w4 ha">
                    <div class="t m0 xd h9 y27 ff2 fs5 fc0 sc0 ls0 ws0">20___</div>
                </div>
                <div class="c x13 y26 w6 ha">
                    <div class="t m0 x17 h9 y28 ff2 fs5 fc0 sc0 ls0 ws0">2</div>
                </div>
                <div class="c x14 y26 w7 ha">
                    <div class="t m0 x15 h9 y28 ff1 fs5 fc0 sc0 ls0 ws0">Середній<span class="ff2"> </span>бал<span class="ff2"> </span>додатка<span class="ff2"> </span>до<span class="ff2"> </span>диплома</div>
                </div>
                <div class="t m0 x0 h5 y29 ff1 fs2 fc0 sc0 ls0 ws0">*Для<span class="ff2"> </span>спеціальності<span class="ff2"> 051 </span>«Економіка»<span class="ff2"> </span>та<span class="ff2"> </span>галузі<span class="ff2"> </span>знань<span class="ff2"> 07 </span>«Управління<span class="ff2"> </span>та<span class="ff2"> </span>адміністрування»</div>
                <div class="t m0 x0 h4 y2a ff1 fs1 fc0 sc0 ls0 ws0">На<span class="ff2"> </span>час<span class="ff2"> </span>навчання<span class="ff2"> </span>поселення<span class="ff2"> </span>в<span class="ff2"> </span>гуртожиток:<span class="ff2"> </span>потребую<span class="ff2"> <span class="_ _5"> </span>; </span>не<span class="ff2"> </span>потребую<span class="ff2"> <span class="_ _5"> </span>. </span>Стать:<span class="ff2"> </span>чоловіча<span class="ff2"> <span class="_ _5"> </span>; </span>жіноча<span class="ff2"> </span></div>
                <div class="t m0 x0 h4 y2b ff1 fs1 fc0 sc0 ls0 ws0">Громадянство:<span class="ff2"> </span>Україна<span class="ff2"> <span class="_ _5"> </span>; </span>інша<span class="ff2"> </span>країна:<span class="ff2"> _________________________________________________________________</span></div>
                <div class="t m0 x0 h4 y2c ff1 fs1 fc0 sc0 ls0 ws0">Дата<span class="ff2"> </span>і<span class="ff2"> </span>місце<span class="ff2"> </span>народження:<span class="ff2"> ______________________________________________________________________________</span></div>
                <div class="t m0 x0 h4 y2d ff2 fs1 fc0 sc0 ls0 ws0 ">__________</div>
                <div class="t m0 x0 h4 y2e ff1 fs1 fc0 sc0 ls0 ws0">Місце<span class="ff2"> </span>проживання:<span class="ff2"> </span>вулиця<span class="user-text">  <?php 
                
                echo $addressTable['street'];
                
                ?>  </span>,<span class="ff2"> </span>будинок<span class="ff2"><span class="user-text">  <?php 
                
                echo $addressTable['house'];
                
                ?>  </span>, </span>квартира<span class="ff2"><span class="user-text">  <?php 
                
                echo $addressTable['kvart'];
                
                ?>  </span>, </span>місто/селище/село<span class="ff2"><span class="user-text">  <?php 
                
                echo $addressTable['city'];
                
                ?>  </span>, </span></div>
                <div class="t m0 x0 h4 y2f ff1 fs1 fc0 sc0 ls0 ws0 ">,<span class="ff2"> </span>область<span class="ff2"><span class="user-text">  <?php 
                
                echo $addressTable['obl'];
                
                ?>  </span>, </span>індекс<span class="user-text">  <?php 
                
                echo $addressTable['zip'];
                
                ?>  </span>,<span class="ff2"> </span>домашній,<span class="ff2"> </span>мобільний<span class="ff2"> </span>телефони<span class="ff2"> </span></div>
                <div class="t m0 x0 h4 y30 ff2 fs1 fc0 sc0 ls0 ws0"><span class="user-text">  <?php 
                
                echo '+380' . $infoTable['phone'];
                
                ?>  </span><span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>__<span class="_ _6"></span>, <span class="_ _6"></span><span class="ff1">ел<span class="_ _6"></span>ек<span class="_ _6"></span>тр<span class="_ _6"></span>он<span class="_ _6"></span>на<span class="_ _6"></span><span class="ff2"> <span class="ff1">п<span class="_ _6"></span>ош<span class="_ _6"></span>та<span class="_ _6"></span><span class="ff2"> <span class="user-text">  <?php 
                
                echo  $infoTable['email'];
                
                ?>  </span></div>
                <div class="t m0 x0 h4 y31 ff1 fs1 fc0 sc0 ls0 ws0">Додаткова<span class="ff2"> </span>інформація:<span class="ff2"> ________________________________________________________________________________</span></div>
                <div class="t m0 x0 h4 y32 ff2 fs1 fc0 sc0 ls0 ws0 ">__________</div>
                <div class="t m0 x0 h4 y33 ff2 fs1 fc0 sc0 ls0 ws0 ">__________</div>
                <div class="t m0 x18 h9 y34 ff1 fs5 fc0 sc0 ls0 ws0">Попереджений(а),<span class="ff2"> <span class="_ _2"> </span></span>що<span class="ff2"> <span class="_ _1"> </span></span>подання<span class="ff2"> <span class="_ _2"></span></span>мною<span class="ff2"> <span class="_ _1"> </span></span>недостовірних<span class="ff2"> <span class="_ _2"></span></span>персональних<span class="ff2"> <span class="_ _2"> </span></span>даних,<span class="ff2"> <span class="_ _1"> </span></span>даних<span class="ff2"> <span class="_ _2"></span></span>про<span class="ff2"> <span class="_ _2"> </span></span>спеціальні<span class="ff2"> <span class="_ _1"> </span></span>умови<span class="ff2"> <span class="_ _2"> </span></span>зарахування,<span class="ff2"> <span class="_ _1"> </span></span>здобуту<span class="ff2"> </span></div>
                <div class="t m0 x0 h9 y35 ff1 fs5 fc0 sc0 ls0 ws0">раніше<span class="ff2"> </span>освіту<span class="ff2"> </span>є<span class="ff2"> </span>підставою<span class="ff2"> </span>для<span class="ff2"> </span>скасування<span class="ff2"> </span>наказу<span class="ff2"> </span>про<span class="ff2"> </span>моє<span class="ff2"> </span>зарахування<span class="ff2"> </span>до<span class="ff2"> </span>числа<span class="ff2"> </span>студентів.</div>
                <div class="t m0 x18 h9 y36 ff1 fs5 fc0 sc0 ls0 ws0">З<span class="ff2"> <span class="_ _2"></span></span>правилами<span class="ff2"> <span class="_ _2"></span></span>прийому,<span class="ff2"> <span class="_ _2"></span></span>ліцензією<span class="ff2"> <span class="_ _2"></span></span>та<span class="ff2"> <span class="_ _2"></span></span>сертифікатом<span class="ff2"> <span class="_ _2"></span></span>про<span class="ff2"> <span class="_ _2"></span></span>акредитацію<span class="ff2"> <span class="_ _2"></span></span>напряму<span class="ff2"> <span class="_ _2"></span></span>підготовки<span class="ff2"> <span class="_ _2"></span>/ <span class="_ _2"></span></span>спеціальності<span class="ff2"> <span class="_ _2"></span>/ <span class="_ _2"></span></span>освітньої<span class="ff2"> <span class="_ _2"></span></span>програми<span class="ff2"> </span></div>
                <div class="t m0 x0 h9 y37 ff1 fs5 fc0 sc0 ls0 ws0">ознайомлений(а).</div>
                <div class="t m0 x18 h9 y38 ff1 fs5 fc0 sc0 ls0 ws0">Ознайомлений(а),<span class="ff2"> <span class="_ _1"> </span></span>що<span class="ff2"> <span class="_ _1"> </span></span>обробка<span class="ff2"> <span class="_ _2"> </span></span>персональних<span class="ff2"> <span class="_ _1"> </span></span>даних,<span class="ff2"> <span class="_ _1"> </span></span>передбачених<span class="ff2"> <span class="_ _1"> </span></span>для<span class="ff2"> <span class="_ _2"> </span></span>вступу<span class="ff2"> <span class="_ _1"> </span></span>на<span class="ff2"> <span class="_ _1"> </span></span>навчання<span class="ff2"> <span class="_ _1"> </span></span>та<span class="ff2"> <span class="_ _2"> </span></span>отримання<span class="ff2"> <span class="_ _1"> </span></span>освітніх<span class="ff2"> <span class="_ _1"> </span></span>послуг,<span class="ff2"> <span class="_ _1"> </span></span>в<span class="ff2"> </span></div>
                <div class="t m0 x0 h9 y39 ff1 fs5 fc0 sc0 ls0 ws0">тому<span class="ff2"> <span class="_ _2"></span></span>числі<span class="ff2"> <span class="_ _7"></span></span>в<span class="ff2"> <span class="_ _7"></span></span>Єдиній<span class="ff2"> <span class="_ _2"></span></span>державній<span class="ff2"> <span class="_ _7"></span></span>електронній<span class="ff2"> <span class="_ _2"></span></span>базі<span class="ff2"> <span class="_ _7"></span></span>з<span class="ff2"> <span class="_ _2"></span></span>питань<span class="ff2"> <span class="_ _7"></span></span>освіти,<span class="ff2"> <span class="_ _2"></span></span>а<span class="ff2"> <span class="_ _7"></span></span>також<span class="ff2"> <span class="_ _2"></span></span>інформації,<span class="ff2"> <span class="_ _7"></span></span>що<span class="ff2"> <span class="_ _2"></span></span>стосується<span class="ff2"> <span class="_ _7"></span></span>участі<span class="ff2"> <span class="_ _2"></span></span>в<span class="ff2"> <span class="_ _7"></span></span>конкурсному<span class="ff2"> <span class="_ _2"></span></span>відборі<span class="ff2"> </span></div>
                <div class="t m0 x0 h9 y3a ff1 fs5 fc0 sc0 ls0 ws0">для<span class="ff2"> <span class="_ _2"></span></span>інформування<span class="ff2"> <span class="_ _2"></span></span>громадськості<span class="ff2"> <span class="_ _7"></span></span>про<span class="ff2"> <span class="_ _2"> </span></span>перебіг<span class="ff2"> <span class="_ _2"></span></span>вступної<span class="ff2"> <span class="_ _2"></span></span>кампанії<span class="ff2"> <span class="_ _2"></span></span>до<span class="ff2"> <span class="_ _7"></span></span>закладів<span class="ff2"> <span class="_ _2"> </span></span>освіти,<span class="ff2"> <span class="_ _2"></span></span>здійснюється<span class="ff2"> <span class="_ _2"></span></span>відповідно<span class="ff2"> <span class="_ _2"></span></span>до<span class="ff2"> <span class="_ _7"></span></span>законодавства<span class="ff2"> <span class="_ _2"> </span></span>про<span class="ff2"> </span></div>
                <div class="t m0 x0 h9 y3b ff1 fs5 fc0 sc0 ls0 ws0">захист<span class="ff2"> </span>персональних<span class="ff2"> </span>даних.</div>
                <div class="t m0 x0 h4 y3c ff2 fs1 fc0 sc0 ls0 ws0">  <?php echo date('d   m   Y',date_timestamp_get($date)) ?>  <span class="ff1"> року<span class="_ _8"> </span></span>_______________________________</div>
                <div class="t m0 x3 h9 y3d ff1 fs5 fc0 sc0 ls0 ws0">(підпис)</div>
            </div>
            <div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div>
        </div>
        <div id="pf2" class="pf w0 h0" data-page-no="2">
            <div class="pc pc2 w0 h0">
                <div class="c x19 y3e w9 hb">
                    <div class="t m0 x1a hc y3f ff2 fs3 fc0 sc0 ls0 ws0">2</div>
                </div>
                <div class="t m0 x1b hc y40 ff1 fs3 fc0 sc0 ls0 ws0">Примітки:</div>
                <div class="t m0 x1b hc y41 ff2 fs3 fc0 sc0 ls0 ws0">1.<span class="_ _9"> </span><span class="ff1">Ця</span> <span class="_ _2"></span><span class="ff1">форма</span> <span class="_ _1"></span><span class="ff1">використовується</span> <span class="_ _2"></span><span class="ff1">для</span> <span class="_ _2"></span><span class="ff1">допуску</span> <span class="_ _2"></span><span class="ff1">до</span> <span class="_ _1"></span><span class="ff1">участі</span> <span class="_ _2"></span><span class="ff1">в</span> <span class="_ _2"></span><span class="ff1">конкурсі</span> <span class="_ _2"></span><span class="ff1">щодо</span> <span class="_ _1"></span><span class="ff1">вступу</span> <span class="_ _2"></span><span class="ff1">до</span> <span class="_ _2"></span><span class="ff1">закладу</span> </div>
                <div class="t m0 x0 hc y42 ff1 fs3 fc0 sc0 ls0 ws0">освіти<span class="ff2"> <span class="_ _2"></span></span>для<span class="ff2"> <span class="_ _1"></span></span>здобуття<span class="ff2"> <span class="_ _2"></span></span>ступеня<span class="ff2"> <span class="_ _2"></span></span>бакалавра<span class="ff2"> <span class="_ _2"></span></span>(магістра<span class="ff2"> <span class="_ _1"></span></span>медичного,<span class="ff2"> <span class="_ _2"></span></span>фармацевтичного<span class="ff2"> <span class="_ _2"></span></span>або<span class="ff2"> <span class="_ _2"></span></span>ветеринарного<span class="ff2"> </span></div>
                <div class="t m0 x0 hc y43 ff1 fs3 fc0 sc0 ls0 ws0">спрямувань)<span class="ff2"> <span class="_ _a"> </span></span>на<span class="ff2"> <span class="_ _a"> </span></span>основі<span class="ff2"> <span class="_ _a"> </span></span>освітньо-кваліфікаційного<span class="ff2"> <span class="_ _a"> </span></span>рівня<span class="ff2"> <span class="_ _a"> </span></span>молодшого<span class="ff2"> <span class="_ _a"> </span></span>спеціаліста.<span class="ff2"> <span class="_ _a"> </span></span>Форму<span class="ff2"> <span class="_ _a"> </span></span>заповнює<span class="ff2"> </span></div>
                <div class="t m0 x0 hc y44 ff1 fs3 fc0 sc0 ls0 ws0">вступник<span class="ff2"> </span>і<span class="ff2"> </span>особисто<span class="ff2"> </span>подає<span class="ff2"> </span>у<span class="ff2"> </span>паперовій<span class="ff2"> </span>формі<span class="ff2"> </span>до<span class="ff2"> </span>приймальної<span class="ff2"> </span>комісії<span class="ff2"> </span>закладу<span class="ff2"> </span>вищої<span class="ff2"> </span>освіти.</div>
                <div class="t m0 x1b hc y45 ff2 fs3 fc0 sc0 ls0 ws0">2.<span class="_ _9"> </span><span class="ff1">У</span> <span class="_ _3"> </span><span class="ff1">поле</span> <span class="_ _3"> </span><span class="ff1">«Додаткова</span> <span class="_ _3"> </span><span class="ff1">інформація»</span> <span class="_ _b"> </span><span class="ff1">можуть</span> <span class="_ _b"> </span><span class="ff1">вносит<span class="_ _7"></span>ися</span> <span class="_ _b"> </span><span class="ff1">додаткові</span> <span class="_ _b"> </span><span class="ff1">дані</span> <span class="_ _3"> </span><span class="ff1">про</span> <span class="_ _3"> </span><span class="ff1">вступника,</span> </div>
                <div class="t m0 x0 hc y46 ff1 fs3 fc0 sc0 ls0 ws0">включаючи<span class="ff2"> <span class="_ _c"> </span></span>назви<span class="ff2"> <span class="_ _0"> </span></span>та<span class="ff2"> <span class="_ _c"> </span></span>реквізити<span class="ff2"> <span class="_ _c"> </span></span>документів,<span class="ff2"> <span class="_ _c"> </span></span>які<span class="ff2"> <span class="_ _c"> </span></span>є<span class="ff2"> <span class="_ _c"> </span></span>підставою<span class="ff2"> <span class="_ _c"> </span></span>для<span class="ff2"> <span class="_ _c"> </span></span>вступу<span class="ff2"> <span class="_ _c"> </span></span>за<span class="ff2"> <span class="_ _c"> </span></span>співбесідою<span class="ff2"> <span class="_ _c"> </span></span>або<span class="ff2"> <span class="_ _c"> </span></span>для<span class="ff2"> </span></div>
                <div class="t m0 x0 hc y47 ff1 fs3 fc0 sc0 ls0 ws0">першочергового<span class="ff2"> </span>зарахування.<span class="ff2"> </span>У<span class="ff2"> <span class="_ _7"></span></span>поле<span class="ff2"> </span>також<span class="ff2"> </span>вноситься<span class="ff2"> </span>інформація<span class="ff2"> </span>про<span class="ff2"> </span>наявність<span class="ff2"> <span class="_ _7"></span></span>права<span class="ff2"> </span>на<span class="ff2"> </span>повторне<span class="ff2"> </span></div>
                <div class="t m0 x0 hc y48 ff1 fs3 fc0 sc0 ls0 ws0">безоплатне<span class="ff2"> </span>здобуття<span class="ff2"> </span>ступеня<span class="ff2"> </span>вищої<span class="ff2"> </span>освіти.</div>
                <div class="t m0 x1b hc y49 ff2 fs3 fc0 sc0 ls0 ws0">3.<span class="_ _9"> </span><span class="ff1">Заклад</span> <span class="_ _a"> </span><span class="ff1">вищої</span> <span class="_ _a"> </span><span class="ff1">освіти</span> <span class="_ _a"> </span><span class="ff1">в</span> <span class="_ _a"> </span><span class="ff1">Правилах</span> <span class="_ _a"> </span><span class="ff1">прийому</span> <span class="_ _a"> </span><span class="ff1">може</span> <span class="_ _0"> </span><span class="ff1">передбачати</span> <span class="_ _1"> </span><span class="ff1">встановлення</span> <span class="_ _a"> </span><span class="ff1">локальних</span> </div>
                <div class="t m0 x0 hc y4a ff1 fs3 fc0 sc0 ls0 ws0">пріоритетностей<span class="ff2"> <span class="_ _d"> </span></span>для<span class="ff2"> <span class="_ _d"> </span></span>вступу<span class="ff2"> <span class="_ _d"> </span></span>на<span class="ff2"> <span class="_ _d"> </span></span>основі<span class="ff2"> <span class="_ _d"> </span></span>здобутого<span class="ff2"> <span class="_ _d"> </span></span>раніше<span class="ff2"> <span class="_ _d"> </span></span>освітнього<span class="ff2"> <span class="_ _d"> </span></span>ступеня<span class="ff2"> <span class="_ _d"> </span></span>або<span class="ff2"> <span class="_ _d"> </span></span>освітньо-</div>
                <div class="t m0 x0 hc y4b ff1 fs3 fc0 sc0 ls0 ws0">кваліфікаційного<span class="ff2"> </span>рівня<span class="ff2"> </span>(в<span class="ff2"> </span>такому<span class="ff2"> </span>разі<span class="ff2"> </span>поле<span class="ff2"> </span>«Пріоритетність»<span class="ff2"> </span>може<span class="ff2"> </span>бути<span class="ff2"> </span>додане<span class="ff2"> </span>до<span class="ff2"> </span>форми<span class="ff2"> </span>заяви).</div>
                <div class="t m0 x1b hc y4c ff2 fs3 fc0 sc0 ls0 ws0">4.<span class="_ _9"> </span><span class="ff1">Формат</span> <span class="ff1">бланка</span> – <span class="ff1">А4</span> (210<span class="_ _e"> </span>297 <span class="ff1">мм),</span> 1 <span class="ff1">або</span> 2 <span class="ff1">сторінки.</span></div>
                <div class="c x1c y4d wa hd">
                    <div class="t m0 x15 h2 y4e ff1 fs0 fc0 sc0 ls0 ws0">Генеральний<span class="ff2"> </span>директор<span class="ff2"> </span></div>
                    <div class="t m0 x15 h2 y4f ff1 fs0 fc0 sc0 ls0 ws0">директорату<span class="ff2"> </span>вищої<span class="ff2"> </span>освіти</div>
                    <div class="t m0 x15 h2 y50 ff1 fs0 fc0 sc0 ls0 ws0">і<span class="ff2"> </span>освіти<span class="ff2"> </span>дорослих</div>
                </div>
                <div class="c x1d y4d wb hd">
                    <div class="t m0 x1e h2 y4f ff1 fs0 fc0 sc0 ls0 ws0">О.<span class="ff2"> </span>І.<span class="ff2"> </span>Шаров</div>
                </div>
                <div class="c x1f y51 wc he">
                    <div class="t m0 x1a hf y52 ff5 fs3 fc0 sc0 ls0 ws0"></div>
                </div>
            </div>
            <div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div>
        </div>
    </div>
    <div class="loading-indicator">

    </div>
</body>

</html>