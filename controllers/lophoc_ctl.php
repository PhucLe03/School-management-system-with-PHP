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
  // ! WARNING: DO NOT TOUCH THIS
  $sql = "SELECT id,magiangvien FROM lophoc
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

function getLopTheoId($id, $conn) {
  $sql = "SELECT malophoc,makhoahoc FROM lophoc
          WHERE id=?";
  $stmt = $conn->prepare($sql);    
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $lophoc = $stmt->fetch();
    return $lophoc;
  } else {
    return 0;
  }
}

function getBaiGiangCuaLop($lop_id, $conn) {
  $sql = "SELECT id,tieude FROM baigiang
          WHERE id_lophoc=?";
  $stmt = $conn->prepare($sql);
    
  $stmt->execute([$lop_id]);
  if ($stmt->rowCount() >= 1) {
    $baigiang = $stmt->fetchAll();
    return $baigiang;
  } else {
    return 0;
  }
}

function getNoiDungBaiGiang($baigiang_id, $conn) {
  $sql = "SELECT tieude,noidung FROM baigiang
          WHERE malophoc=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$baigiang_id);
    
  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $baigiang = $stmt->fetch();
    return $baigiang;
  } else {
    return 0;
  }
}

