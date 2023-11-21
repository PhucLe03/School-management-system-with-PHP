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
  $sql = "SELECT * FROM lophoc
          WHERE magiangvien=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$giangvien_id]);
  if ($stmt->rowCount() == 1) {
    $lophoc = $stmt->fetch();
    return $lophoc;
  } else {
    return 0;
  }
}
