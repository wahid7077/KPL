<?php

require_once('connection.php');

if (empty($_GET)) {
  $query = mysqli_query($connection, "SELECT * FROM data");

  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array(
      'id' => $row['id'],
      'nama' => $row['nama'],
      'nik' => $row['nik'],
      'jenis_kelamin' => $row['jenis_kelamin']
    ));
  }

  echo json_encode(
    array('Data Kependudukan Calungan' => $result)
  );
} else {
  $query = mysqli_query($connection, "SELECT * FROM data WHERE id=" . $_GET['id']);

  $result = array();
  while ($row = $query->fetch_assoc()) {
    $result = array(
        'id' => $row['id'],
        'nama' => $row['nama'],
        'nik' => $row['nik'],
        'jenis_kelamin' => $row['jenis_kelamin']
    );
  }

  echo json_encode(
    $result
  );
}