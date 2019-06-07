<?php
include './includes/DatabaseConnection.php';
include './includes/DatabaseFunctions.php';

try {
  if (isset($_POST['joketext'])) {

    update($pdo, 'joke', 'id', [
      'id' => $_POST['id'],
      'joketext' => $_POST['joketext'],
      'authorid' => 1
    ]);

    header('location: jokes.php');
  }
  else {
    $joke = findbyid($pdo, 'joke', 'id', $_GET['id']);

    $title = '글 수정';

    ob_start();

    include './template/editjoke.html.php';

    $output = ob_get_clean();
  }
}
catch (PDOException $e) {
  $title = '오류가 발생했습니다.';
  $output = '데이터베이스 오류:' . $e -> getMessage() . ', 위치: ' . $e -> getFile() . ':' . $e -> getLine();
}

include './template/layout.html.php';

 ?>
