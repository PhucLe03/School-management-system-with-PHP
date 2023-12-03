<?php

function getSoLuongSinhVienCuaLop($lop_id, $conn)
{
  $sql = "SELECT masinhvien FROM lop_rec
          WHERE id_lophoc=:idlop";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':idlop', $lop_id);

  $stmt->execute();
  if ($stmt->rowCount() >= 1) {
    return $stmt->rowCount();
  } else {
    return 0;
  }
}

function getGiangVienCuaLop($lop_id, $conn)
{
  $sql = "SELECT magiangvien FROM lophoc
          WHERE id_c=:idlop";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':idlop', $lop_id);

  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $giangvien = $stmt->fetch();
    return $giangvien;
  } else {
    return 0;
  }
}

// function getLopCuaSinhVien($sinhvien_id, $conn)
// {
//   $sql = "SELECT * FROM lop_rec
//           WHERE masinhvien=?";
//   $stmt = $conn->prepare($sql);    
//   $stmt->execute([$sinhvien_id]);

//   if ($stmt->rowCount() >= 1) {
//     $lophoc = $stmt->fetchAll();
//     return $lophoc;
//   } else {
//     return 0;
//   }
// }

function getTenCuaKhoa($khoa_id, $conn)
{
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

function svKiemTraQuyenVaoLop($id_sv, $id_lophoc, $conn)
{
  $sql = "SELECT * from lop_rec
          WHERE id_lophoc=:lop AND masinhvien=:sv";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':lop', $id_lophoc);
  $stmt->bindParam(':sv', $id_sv);
  $stmt->execute();
  if ($stmt->rowCount() < 1) {
    return false;
  } else {
    return true;
  }
}

function gvKiemTraQuyenVaoLop($magv, $id_lophoc, $conn)
{
  $sql = "SELECT * from lophoc
          WHERE id_c=:lop AND magiangvien=:gv";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':lop', $id_lophoc);
  $stmt->bindParam(':gv', $magv);
  $stmt->execute();
  if ($stmt->rowCount() < 1) {
    return false;
  } else {
    return true;
  }
}

function getLopTheoId($id, $conn)
{
  $sql = "SELECT * FROM all_lophoc
          WHERE id_c=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $lophoc = $stmt->fetch();
    return $lophoc;
  } else {
    return 0;
  }
}

function getBaiGiangCuaLop($lop_id, $conn)
{
  $sql = "SELECT id_l,tieude FROM baigiang
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

function getNoiDungBaiGiang($baigiang_id, $conn)
{
  $sql = "SELECT * FROM baigiang
          WHERE id_l=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $baigiang_id);

  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $baigiang = $stmt->fetch();
    return $baigiang;
  } else {
    return 0;
  }
}

function getNoiDungBaiTap($baitap_id, $conn)
{
  $sql = "SELECT * FROM baitap
          WHERE id_e=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $baitap_id);

  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $baitap = $stmt->fetch();
    return $baitap;
  } else {
    return 0;
  }
}

function getNoiDungBaiKT($baikt_id, $conn)
{
  $sql = "SELECT * FROM kiemtra
          WHERE id_t=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $baikt_id);

  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $baikt = $stmt->fetch();
    return $baikt;
  } else {
    return 0;
  }
}

function getBaiTapCuaLop($lop_id, $conn)
{
  $sql = "SELECT id_e,tieude FROM baitap
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

function getBaiTapTheoId($baitap_id, $conn)
{
  $sql = "SELECT * FROM baitap
          WHERE id_e=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $baitap_id);

  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $baigiang = $stmt->fetch();
    return $baigiang;
  } else {
    return 0;
  }
}

function getBaiKTCuaLop($lop_id, $conn)
{
  $sql = "SELECT id_t,tieude FROM kiemtra
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

function getBaiKTTheoId($baitap_id, $conn)
{
  $sql = "SELECT * FROM kiemtra
          WHERE id_t=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $baitap_id);

  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $baigiang = $stmt->fetch();
    return $baigiang;
  } else {
    return 0;
  }
}

function getLopCuaSinhVien($sinhvien_id, $conn)
{
  $sql = "SELECT * FROM `all_lophoc`
          JOIN `lop_rec` ON `lop_rec`.`id_lophoc` = `all_lophoc`.`id_c`
          WHERE `lop_rec`.`masinhvien` = ?;";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$sinhvien_id]);

  if ($stmt->rowCount() >= 1) {
    $lophoc = $stmt->fetchAll();
    return $lophoc;
  } else {
    return 0;
  }
}

// function getSinhVienCuaLop($id_lophoc, $conn) {
//   $sql = "SELECT s.masinhvien, s.ho_tenlot, s.ten, r.id_lophoc, l.malophoc, l.makhoahoc 
//           FROM `in4sinhvien` s
//           JOIN lop_rec r ON r.masinhvien = s.masinhvien
//           JOIN lophoc l ON r.id_lophoc = l.id_c
//           WHERE l.id_c = :id;";
//   $stmt = $conn->prepare($sql);
//   $stmt->bindParam(':id', $id_lophoc);

//   $stmt->execute();
//   if ($stmt->rowCount() >= 1) {
//     $sv = $stmt->fetchAll();
//     return $sv;
//   }
//   else {
//     return 0;
//   }
// }

function getAllSinhVienCuaLop($id_lophoc, $conn) {
  $sql = "SELECT * from xemdiem
          WHERE id_lophoc=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_lophoc]);
  if ($stmt->rowCount() >= 1) {
    $sv = $stmt->fetchAll();
    return $sv;
  }
  else {
    return 0;
  }
}

function getSinhVienCuaLop($id_lophoc, $id_sv, $conn) {
  $sql = "SELECT * from xemdiem
          WHERE id_lophoc=:id AND masinhvien=:sv";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id_lophoc);
  $stmt->bindParam(':sv', $id_sv);

  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $sv = $stmt->fetch();
    return $sv;
  }
  else {
    return 0;
  }
}