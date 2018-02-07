<?php
//echo $_GET["fio"]."<br>".$_GET["age"];

require_once 'connect.php';

$fio = htmlspecialchars($_GET["fio"]);
$age = htmlspecialchars($_GET["age"]);


$link = mysqli_connect($host, $user, $password, $database)
or die("не соединил" . mysqli_error($link));
mysqli_set_charset($link,"utf8");

$query ="INSERT INTO  `person` (`fio`,`age`) VALUES ('$fio','$age')";
$boolinsert = mysqli_query($link, $query) or die("неудача " . mysqli_error($link));

$res = $link->query("SELECT num FROM `person` WHERE fio='$fio' AND age='$age' ORDER BY data DESC");
$row = $res->fetch_assoc();
$number = $row['num'];

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>заголовок</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class = "my-header">
        <h1 align="center">ваш номер</h1>
        <h1 class = "my-header" align="center"> <?php echo $number ?> </h1>
    </div>

    <div class = "list-group">
        <a class="btn btn-lg btn-primary btn-block" href="/rp/reg.html">назад</a>
    </div> <!-- /containe

</div> <!-- /container -->

</body>
</html>
