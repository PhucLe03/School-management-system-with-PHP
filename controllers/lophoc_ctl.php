<?php

function getSinhVienCuaLop($lop_id, $khoa_id, $conn)
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

function getSoLuongSinhVienCuaLop($lop_id, $khoa_id, $conn)
{
  $sql = "SELECT masinhvien FROM lop_rec
          WHERE malophoc=:malop AND makhoahoc=:makhoa";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':malop',$lop_id);
  $stmt->bindParam(':makhoa',$khoa_id);
    
  $stmt->execute();
  if ($stmt->rowCount() >= 1) {
    return $stmt->rowCount();
  } else {
    return 0;
  }
}

function getGiangVienCuaLop($lop_id, $khoa_id, $conn)
{
  $sql = "SELECT magiangvien FROM lophoc
          WHERE malophoc=:malop AND makhoahoc=:makhoa";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':malop',$lop_id);
  $stmt->bindParam(':makhoa',$khoa_id);
    
  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $giangvien = $stmt->fetch();
    return $giangvien;
  } else {
    return 0;
  }
}

function getLopCuaSinhVien($sinhvien_id, $conn)
{
  $sql = "SELECT malophoc,makhoahoc FROM lop_rec
          WHERE masinhvien=?";
  $stmt = $conn->prepare($sql);    
  $stmt->execute([$sinhvien_id]);

  if ($stmt->rowCount() >= 1) {
    $lophoc = $stmt->fetchAll();
    return $lophoc;
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
