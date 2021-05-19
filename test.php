<?php
        //Enter your code here, enjoy!
function spliceLong($str){
    $expstr = explode(' ',$str);
    $cnt = 0;
    $len = 0;

    foreach($expstr as &$i){
        if($cnt < 70){
            $len = $len + 1;
            $cnt = $cnt + strlen($i);
            echo $len . ' --- ' . $cnt . '<br />';
        }
    }
    $first = implode(' ',array_slice($expstr,0,$len));
    $sec =  implode(' ',array_slice($expstr,$len, count($expstr)-$len));
    return [$first,$sec];
}

$str = "Військовий коледж сержантського складу Національної академії сухопутних військ";

[$f,$s] = spliceLong($str);
echo $f . ' ' . $s;

phpinfo();
?>