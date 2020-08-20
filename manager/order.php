<?php 

require_once '../assets/incudes/connection.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

$query ="SELECT * FROM myorder order by id desc";
 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class='modal'>
      <div style='display: flex; justify-content: center; align-items: center;'> 
      <div class='content'>
        <img style='' class='modalIMG' src=''>
      </div>
      </div>
    </div>

 
    <div class="container">
    <h2 style='text-align:center'>Заказы</h2>

 
 <?php 
  if($result)
  { 
      $rows = mysqli_num_rows($result);
      for ($i = 0 ; $i < $rows ; ++$i){
        $row = mysqli_fetch_assoc($result);
        $oprava = $row['oprava'];
        $name = $row['name'];
        $phone = $row['phone'];
        $recept = $row['recept'];
        $time = $row['timedata'];
       echo "<div class='card'>";   
        echo "<ul>";
      echo "<li>Имя: $name</li>";
      echo "<li>Телефон: $phone </li>";
      echo "<li>Оправа<br><img data-srcmodal='../imgorder/$oprava' height='100' width='100' src='../imgorder/$oprava'></li>";
      echo "<li>Рецепт<br><img height='100' width='100' src='../imgorder/$recept'></li>";
      echo "</ul>";
      echo '</div>';
      }    
  }
  ?>        
    </div>
 




   <script src='manager.js'></script>
  </body>
</html>
