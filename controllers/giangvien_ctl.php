<?php

function getGiangVienTheoId($giangvien_id, $conn){
    $sql = "SELECT * FROM giangvien
            WHERE magiangvien=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$giangvien_id]);
 
    if ($stmt->rowCount() == 1) {
      $giangvien = $stmt->fetch();
      return $giangvien;
    }else {
     return 0;
    }
 }