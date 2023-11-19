<?php

// Tat ca sinh vien 
function getTatCaSinhVien($conn)
{
  $sql = "SELECT * FROM sinhvien";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $sinhvien = $stmt->fetchAll();
    return $sinhvien;
  } else {
    return 0;
  }
}



// Sinh vien theo Id 
function getSinhVienTheoId($id, $conn)
{
  $sql = "SELECT * FROM sinhvien
           WHERE masinhvien=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $sinhvien = $stmt->fetch();
    return $sinhvien;
  } else {
    return 0;
  }
}


// Check if the username Unique
function usernameDocNhat($uname, $conn, $masinhvien = 0)
{
  $sql = "SELECT username, masinhvien FROM sinhvien
           WHERE username=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$uname]);

  if ($masinhvien == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $sinhvien = $stmt->fetch();
      if ($sinhvien['masinhvien'] == $masinhvien) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}


function XacMinhMatKhauSinhVien($sinhvien_mk, $conn, $masinhvien)
{
  $sql = "SELECT * FROM sinhvien
           WHERE masinhvien=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$masinhvien]);

  if ($stmt->rowCount() == 1) {
    $sinhvien = $stmt->fetch();
    $pass  = $sinhvien['matkhau'];

    if (password_verify($sinhvien_mk, $pass)) {
      return 1;
    } else {
      return 0;
    }
  } else {
    return 0;
  }
}
