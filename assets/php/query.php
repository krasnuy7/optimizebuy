<?php
require_once '../incudes/connection.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

if(isset($_POST['clientName'])){
    $clientName = $_POST['clientName'];
    $clientNumber = $_POST['clientNumber'];
    $oprava = '';
    $recept = '';
    if(file_exists('../../imgorder/' . $_FILES['oprava']['name'])){
        $str = 'abcdef';
        $shuffled = str_shuffle($str);
        $name = $shuffled.rand(1,1000) .$_FILES['oprava']['name'];
        move_uploaded_file($_FILES['oprava']['tmp_name'],'../../imgorder/' . $name);
        $oprava = $name;
    }else{
        $name = $_FILES['oprava']['name'];
        move_uploaded_file($_FILES['oprava']['tmp_name'],'../../imgorder/' . $name);
        $oprava = $name;
    }
    ///
        if(file_exists('../../imgorder/' . $_FILES['recept']['name'])){
        $str = 'abcdef';
        $shuffled = str_shuffle($str);
        $name = $shuffled.rand(1,1000) .$_FILES['recept']['name'];
        move_uploaded_file($_FILES['recept']['tmp_name'],'../../imgorder/' . $name);
        $recept = $name;
    }else{
        $name = $_FILES['recept']['name'];
        move_uploaded_file($_FILES['recept']['tmp_name'],'../../imgorder/' . $name);
        $recept = $name;
    }
    // создание строки запроса
    $query ="INSERT INTO myorder VALUES(NULL, '$clientName','$clientNumber','$oprava','$recept',current_timestamp())";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result){
        echo 'good';
    }
}

?>