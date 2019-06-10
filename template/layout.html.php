<!DOCTYPE html>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./template/joke.css">
    <title><?=$title?></title>
  </head>
  <body>
    <header>
      <h1>글글글</h1>
    </header>
    <nav>
      <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./jokes.php">글 목록</a></li>
        <li><a href="./editjoke.php">글 등록</a></li>
      </ul>
    </nav>

    <main>
      <?=$output?>
    </main>

    <footer>
      2019
    </footer>
  </body>
</html>
