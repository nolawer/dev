<?php
include './includes/DatabaseConnection.php';
include './includes/DatabaseFunctions.php';

try {
  if (isset($_POST['joketext'])) {
    updateJoke($pdo, $POST['id'], $_POST['joketext'], 1);

    header('location: jokes.php');
  }
  else {
    $joke = getJoke($pdo, $_GET['id']);

    $title = '유머 글 수정';

    ob_start();

    include './template/editjoke.html.php';

    $output = ob_get_clean();
  }
}
catch {
  $title = '오류가 발생했습니다.';
  $output = '데이터베이스 오류:' . $e -> getMessage() . ', 위치: ' . $e -> getFile() . ':' . $e -> getLine();
}

include './template/layout.html.php';

 ?>
