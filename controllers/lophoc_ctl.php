<?php

function getSVCuaLop($lop_id, $khoa_id, $conn)
{
  $sql = "SELECT masinhvien FROM lop_rec
          WHERE malophoc=:malop AND makhoahoc=:makhoa";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':malop',$lop_id);
  $stmt->bindParam(':makhoa',$khoa_id);
    
  $stmt->execute();
  if ($stmt->rowCount() >= 1) {
    $sinhvien = $stmt->fetchAll();
    return $sinhvien;
  } else {
    return 0;
  }
}

function getTenCuaKhoa($khoa_id, $conn) {
  $sql = "SELECT tenkhoahoc FROM khoahoc
          WHERE makhoahoc=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$khoa_id]);
  if ($stmt->rowCount() == 1) {
    $tenkhoa = $stmt->fetch();
    return $tenkhoa;
  } else {
    return 0;
  }
}
