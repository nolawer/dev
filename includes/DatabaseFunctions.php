<?php

function query($pdo, $sql, $parameter=[]) {
  $query = $pdo->prepare($sql);
  $query->execute($parameter);

  return $query;
}


// 날짜 포맷 변경 함수
function processDates($fields) {
  foreach ($fields as $key => $value) {
    if ($value instanceof DateTime) {
      $fields[$key] = $value->format('Y-m-d H:i:s');
    }
  }

  return $fields;
}


//공통함수----------------------------------------------------


// 테이블 모두 가져오기 공통 함수
function findAll($pdo, $table) {
  $result = query($pdo, 'SELECT * FROM `' . $table . '`');

  return $result->fetchAll();
}


// 삭제 공통 함수
function delete($pdo, $table, $primarykey, $id) {
  $parameter = [':id'=>$id];

  query($pdo, 'DELETE FROM `' . $table . '` WHERE `' . $primarykey . '` = :id', $parameter);
}


// 등록 공통 함수
function insert($pdo, $table, $fields) {
  $query = 'INSERT INTO `' . $table . '` (';

  foreach ($fields as $key => $value) {
    $query .= '`' . $key . '`' . ',';
  }

  $query = rtrim($query, ',');

  $query .= ') VALUES (';

  foreach ($fields as $key => $value) {
    $query .= ':' . $key . ',';
  }

  $query = rtrim($query, ',');

  $query .= ')';

  $fields = processDates($fields);

  query($pdo, $query, $fields);
}


// 업데이트 공통 함수
function update($pdo, $table, $primarykey, $fields) {
  $query = 'UPDATE `' . $table . '` SET ';

  foreach ($fields as $key => $value) {
    $query .= '`' . $key . '`' . '= :' . $key . ',';
  }

  $query = rtrim($query, ',');
  $query .= ' WHERE `' . $primarykey . '` = :primarykey';

  $fields = processDates($fields);

  $fields['primarykey'] = $fields['id'];

  query($pdo, $query, $fields);
}


// 특정 데이터 가져오기 공통 함수
function findbyid($pdo, $table, $primarykey, $value) {
  $query = 'SELECT * FROM `' . $table . '` WHERE `' . $primarykey . '` = :value';

  $parameter = ['value'=>$value];

  $query = query($pdo, $query, $parameter);

  return $query->fetch();
}


// 전체 데이터 갯수 함수
function total($pdo, $table) {
  $query = query($pdo, 'SELECT COUNT(*) FROM `' . $table . '`');
  $row = $query->fetch();

  return $row[0];
}
