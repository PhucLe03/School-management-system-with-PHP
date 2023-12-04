<?php

include "includer.php";

function getInfoAD($id, $conn)
{
    $sql = "SELECT * FROM in4admin
             WHERE maadmin=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 1) {
        $sinhvien = $stmt->fetch();
        return $sinhvien;
    } else {
        return 0;
    }
}

// Tat ca lop hoc
function getTatCaLop($conn)
{
  $sql = "SELECT * FROM all_lophoc";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  if ($stmt->rowCount() > 1) {
    $lops = $stmt->fetchAll();
    return $lops;
  } else {
    return 0;
  }
}

// Tat ca sinh vien 
function getTatCaSinhVien($conn)
{
  $sql = "SELECT * FROM in4sinhvien";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $sinhvien = $stmt->fetchAll();
    return $sinhvien;
  } else {
    return 0;
  }
}

// Tat ca giang vien 
function getTatCaGiangVien($conn)
{
  $sql = "SELECT * FROM in4giangvien";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $sinhvien = $stmt->fetchAll();
    return $sinhvien;
  } else {
    return 0;
  }
}

// Tat ca khoa hoc
function getTatCaKhoahoc($conn)
{
  $sql = "SELECT * FROM khoahoc";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $khoahoc = $stmt->fetchAll();
    return $khoahoc;
  } else {
    return 0;
  }
}

function getSVKhacLop($id_lophoc, $conn) {
  $sql = "SELECT * FROM `in4sinhvien`
          WHERE masinhvien NOT IN
          (
            SELECT masinhvien FROM lop_rec
            WHERE id_lophoc = ?
          );";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_lophoc]);

  if ($stmt->rowCount() >= 1) {
    $sinhvien = $stmt->fetchAll();
    return $sinhvien;
  } else {
    return 0;
  }
}




