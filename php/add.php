<?php

require_once 'connect.php';

$num = htmlspecialchars($_GET["num"]);
$count = htmlspecialchars($_GET["count"]);


$link = mysqli_connect($host, $user, $password, $database)
or die('<a href="/rp/add.html">назад</a> <br> не соединил' . mysqli_error($link));
mysqli_set_charset($link,"utf8");

$query ="INSERT INTO  `check` (`person_fk`,`count`) VALUES ('$num','$count')";
$boolinsert = mysqli_query($link, $query) or die('<a href="/rp/add.html">назад</a> <br> неудача... <br>' . mysqli_error($link));

if  ($boolinsert){
    header('Location: /rp/add.html');
} else {
    echo $boolinsert;
}
echo "<br><a href='/rp/add.html'>назад</a><br>";

mysqli_close($link);


?>