<?php

require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("не соединил" . mysqli_error($link));
mysqli_set_charset($link,"utf8");

if ($_POST["update"]==1) {


    $res = $link->query("SELECT  SUM(`count`) FROM `check`");
    if (FALSE === $res) die("Select sum failed: " . mysqli_error($link));
    $row = mysqli_fetch_row($res);
    $number['num'] = $row[0];
    echo json_encode($number);


    mysqli_close($link);
}elseif ($_POST["update"]==-1)
{
    $all = array();
    $res = $link->query("select `person`.`num`,`person`.`fio`,`person`.`age`, max(`check`.`count`) as max, count(`check`.`count`) as N ,sum(`check`.`count`) as sum from `person` join `check` on `person`.`num` = `check`.`person_fk` group by `person`.`fio` order by `person`.`fio` asc");
    if (FALSE === $res) die("Select sum failed: " . mysqli_error($link));

    while ($row = mysqli_fetch_assoc($res)) {
        $all[] = $row;
    }

    $res2 = $link->query("SELECT  SUM(`count`) FROM `check`");
    if (FALSE === $res2) die("Select sum failed: " . mysqli_error($link));
    $get = mysqli_fetch_row($res2);

    $ret['num'] = $get[0];
    $ret['all'] = $all;

    echo json_encode($ret);
}
else
    echo "sorry";
?>