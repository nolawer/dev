<?php
try {
    $pdo = new PDO('mysql:host=localhost; dbname=ijdb; charset=utf8', 'ijdbuser','nomark08151!');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $output = '데이터베이스 접속 성공!';
} catch (PDOException $e) {
    $output = '데이터베이스에 접속할 수 없습니다.'.
    $e -> getMessage() . ',위치:' .
    $e -> getFile() . '라인:' . $e -> getLine();
}

include './template/output.html.php';

?>
