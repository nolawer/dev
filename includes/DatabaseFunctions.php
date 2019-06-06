<?php

function query($pdo, $sql, $parameter=[]) {
  $query = $pdo->prepare($sql);
  $query->execute($parameter);

  return $query;
}

function totalJokes($pdo) {
  $query = query($pdo, 'SELECT COUNT(*) FROM `joke`');
  $row = $query->fetch();

  return $row;
}

function getJoke($pdo, $parameter) {
  $parameter = [':id'=>$id];
  $query = query($pdo, 'SELECT * FROM `joke` WHERE `id`=:id', $parameter);

  return $query->fetch();
}

function insertJoke($pdo, $joketext, $authorid) {
  $query = 'INSERT INTO `joke` (`joketext`, `jokedate`, `authorid`) VALUES (:joketext, CUDATE(), :authorid)';
  $parameter = [':joketext'=>$joketext, ':authorid'=>$authorid];
  query($pdo, $query, $parameter);
}

function deleteJoke($pdo, $id) {
  $query = 'DELETE FROM `joke` WHERE `id`=:id';
  $parameter = [':id'=>$id];
  query($pdo, $query, $parameter);
}

function updateJoke($pdo, $jokeid, $joketext, $authorid) {
  $query = 'UPDATE `joke` SET `joketext`=:joketext, `authorid`=:authorid WHERE `id`=:id';
  $parameter = [':id'=>$jokeid, ':joketext'=>$joketext, ':authorid'=>$authorid];
  query($pdo, $query, $parameter);
}

function allJoke($pdo) {
  $query = 'SELECT `joke`.`id`, `joketext`, `name`, `email` FROM `joke` INNER JOIN `author` ON `authorid`=`author`.`id`';
  $jokes = query($pdo, $query)

  return $jokes->fetchAll();
}
