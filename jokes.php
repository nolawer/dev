<?php

  try {
    include './includes/DatabaseConnection.php';
    include './includes/DatabaseConnection.php';

    $jokes = allJoke($pdo);

    $title = '글 목록';

    $totalJokes = totalJokes($pdo);

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
