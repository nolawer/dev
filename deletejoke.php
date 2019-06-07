<?php

  try {
    include './includes/DatabaseConnection.php';
    include './includes/DatabaseFunctions.php';

    delete($pdo, 'joke', 'id', $_POST['id']);

    header('location: jokes.php');
  }
  catch (PDOException $e) {
    $title = '오류가 발생했습니다.';
    $output = '데이터베이스 오류:' . $e -> getMessage() . ', 위치: ' . $e -> getFile() . ':' . $e -> getLine();
  }

include './template/layout.html.php';

 ?>
