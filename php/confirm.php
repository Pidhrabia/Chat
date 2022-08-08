<?php
    require_once "db.php";
 
    // Проверка есть ли хеш
    if ($_GET['hash']) {
        $hash = $_GET['hash'];
        // Получаем id и подтверждено ли Email
         if ( $result = $mysql->query("SELECT `id_user`, `email_confirmed` FROM `user` WHERE `hash` = '$hash'")) {
            while( $row = mysqli_fetch_assoc($result) ) { 
                // Проверяет получаем ли id и Email подтверждён ли 
                if ($row['email_confirmed'] == 1) {
                    // Если всё верно, то делаем подтверждение
                    $mysql->query("UPDATE `user` SET `email_confirmed`= 0 WHERE `id_user`=". $row['id_user'] );
                    $success = "Email успішно підтверджено";
                    header("location: ../login/login.php");
                } else {
                    $error = "Щось пішло не так";
                }
            } 
        } else {
            $error = "Щось пішло не так";
        }
    } else {
        $error = "Щось пішло не так";
    }

    echo $error;
?>