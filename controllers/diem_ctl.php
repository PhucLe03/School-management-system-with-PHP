<?php

function getDiem($id_lophoc, $id_sv, $conn)
{
    $sql = "SELECT * FROM diemso
            WHERE id_lophoc=:lop AND masinhvien=:sv";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':lop', $id_lophoc);
    $stmt->bindParam(':sv', $id_sv);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $sv = $stmt->fetch();
        return $sv;
    } else {
        return 0;
    }
}
