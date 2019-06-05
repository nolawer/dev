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
  $parameter = [':joketext'=>$joketext, ':authorid'=>$authorid];
  query($pdo, 'INSERT INTO `joke` (`joketext`,`jokedate`,`authorid`)
  VALUES (:joketext, CURDATE(), :authorid)', $parameter);
}

function deleteJoke($pdo, $id) {
  $parameter = [':id'=>$id];
  query($pdo, 'DELETE FROM `joke` WHERE `id`=:id', $parameter);
}

function updateJoke($pdo, $jokeid, $joketext, $authorid) {
  $parameter = [':id'=>$jokeid, ':joketext'=>$joketext, ':authorid'=>$authorid];
  query($pdo, 'UPDATE `joke` SET `joketext`=:joketext, `authorid`=:authorid WHERE `id`=:id', $parameter);
}
