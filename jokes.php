<?php

  try {
    $pdo = new PDO('mysql:host=localhost; dbname=ijdb; charset=utf8', 'ijdbuser','nomark08151!');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT `joketext` FROM `joke`';
    $result = $pdo -> query($sql);

    while ($row = $result -> fetch()) {
      $jokes[] = $row['joketext'];
    }

    $title = '글 목록';

    ob_start();

    include './template/jokes.html.php';

    $output = ob_get_clean();

  } catch (PDOException $e) {
    $output = '데이터베이스에 접속할 수 없습니다.'.
    $e -> getMessage() . ',위치:' .
    $e -> getFile() . '라인:' . $e -> getLine();
  }

  include './template/layout.html.php';



 ?>
