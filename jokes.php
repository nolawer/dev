<?php

  try {
    include __DIR__ . './includes/DatabaseConnection.php';
    include __DIR__ . './includes/DatabaseFunctions.php';

    $result = findAll($pdo, 'joke');

    $jokes = [];

    foreach ($result as $joke) {
      $author = findbyid($pdo, 'author', 'id', $joke['authorid']);

      $jokes[] = [
        'id' => $joke['id'],
        'joketext' => $joke['joketext'],
        'jokedate' => $joke['jokedate'],
        'name' => $author['name'],
        'email' => $author['email']
      ];
    }

    $title = '글 목록';

    $totalJokes = total($pdo, 'joke');

    ob_start();

    include './template/jokes.html.php';

    $output = ob_get_clean();

  } catch (PDOException $e) {
    $output = '데이터베이스에 접속할 수 없습니다.'.
    $e -> getMessage() . ',위치:' .
    $e -> getFile() . '라인:' . $e -> getLine();
  }

  include __DIR__ . './template/layout.html.php';

 ?>
