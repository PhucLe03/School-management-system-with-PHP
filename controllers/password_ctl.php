<?php

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
