<?php

function getGiangVienTheoId($giangvien_id, $conn)
{
  $sql = "SELECT * FROM giangvien
            WHERE magiangvien=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$giangvien_id]);

  if ($stmt->rowCount() == 1) {
    $giangvien = $stmt->fetch();
    return $giangvien;
  } else {
    return 0;
  }
}

function getLopCuaGiangVien($giangvien_id, $conn)
{
  $sql = "SELECT id_c,malophoc,makhoahoc FROM lophoc
          WHERE magiangvien=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$giangvien_id]);
  if ($stmt->rowCount() >= 1) {
    $lophoc = $stmt->fetchAll();
    return $lophoc;
  } else {
    return 0;
  }
}

function themBaiGiang($id_baigiang) {
  return "./worker/thembaigiang.php?id=$id_baigiang";
}
function suaBaiGiang($id_baigiang) {
  return "./worker/suabaigiang.php?id=$id_baigiang";
}
function xoaBaiGiang($id_baigiang) {
  return true;
}
