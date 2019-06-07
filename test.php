<?php
$array = [
  'id' => 1,
  'joketext' => 'Q : 빈 배열이 집에 못들어오는 이유는? A: 키가 없어서.'
];

$query = 'UPDATE `joke` SET ';

foreach ($array as $key => $value) {
  $query .= '`' . $key . '`' . ' = :' . $key . ' , ';
}

$query = rtrim($query, ' , ');
$query .= ' WHERE `id` = :primarykey';

echo $query;

$array = [
  'id' => 1,
  'authorid' => 4
];

$query = 'UPDATE `joke` SET ';

foreach ($array as $key => $value) {
  $query .= '`' . $key . '`' . '= :' . $key . ' , ';
}

$query = rtrim($query, ' , ');
$query .= ' WHERE `id` = :primarykey';

echo $query;

?>
