<?php
if (isset($_POST['joketext'])){
  try {
    include './includes/DatabaseConnection.php';
    include './includes/DatabaseFunctions.php';

    $date = new DateTime();

    insert($pdo, 'joke', [
      'joketext' => $_POST['joketext'],
      'authorid' => 1,
      'jokedate' => new DateTime()
    ]);

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
