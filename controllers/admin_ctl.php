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
