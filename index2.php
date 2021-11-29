<?php

require_once 'db.php';
global $DBLink;
$email = $_GET('email');
$result = mysqli_query($DBLink, "SELECT * FROM users WHERE email='" . $email . "'");
$result = mysqli_fetch_assoc($result);
$msg = "Здравствуйте, " . $result['name'] . ". Вы вошли с логином " . $email;


?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework7</title>
    <style rel="stylesheet">
        body {
            padding: 0 calc(50% - 1140px / 2);
            display: inline-block;
        }


    </style>
</head>
<body>

    <div class='msg'><?php echo $msg ?></div>

</body>
</html> 

