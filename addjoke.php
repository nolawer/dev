<?php
if (isset($_POST['joketext'])){
  try {
    include_once './includes/DatabaseConnection.php';
    include_once './includes/DatabaseFunctions.php';

    insertJoke($_POST['joketext'], 1);

    header('location: jokes.php');
  }
  catch (PDOException $e) {
    $title = '오류가 발생했습니다.';
    $output = '데이터베이스 오류:' . $e -> getMessage() . ', 위치: ' . $e -> getFile() . ':' . $e -> getLine();
  }
}
else {
  $title = '글 등록';

  ob_start();

  include './template/addjoke.html.php';

  $output = ob_get_clean();
}

include './template/layout.html.php';

 ?>
