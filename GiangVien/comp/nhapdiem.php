<?php
function nhapDiem($id_lophoc, $id_sv, $diem, $conn)
{
  $sql = "INSERT INTO diemso (`id_lophoc`, `masinhvien`, `sodiem`)
          VALUES (:lop, :sv, :diem);";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':lop', $id_lophoc);
  $stmt->bindParam(':sv', $id_sv);
  $stmt->bindParam(':diem', $diem);
  $stmt->execute();
  header("Location: ../danhsachsv.php?lopid=$id_lophoc");
  exit;
}

function capnhatDiem($id_lophoc, $id_sv, $diem, $conn)
{
  $sql = "UPDATE diemso 
          SET sodiem =:diem
          WHERE id_lophoc=:lop AND masinhvien=:sv;";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':lop', $id_lophoc);
  $stmt->bindParam(':sv', $id_sv);
  $stmt->bindParam(':diem', $diem);
  $stmt->execute();
  header("Location: ../danhsachsv.php?lopid=$id_lophoc");
  exit;
}


function getDiem($id_lophoc, $id_sv, $conn)
{
  $sql = "SELECT * FROM diemso
          WHERE id_lophoc=:lop AND masinhvien=:sv;";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':lop', $id_lophoc);
  $stmt->bindParam(':sv', $id_sv);
  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    return true;
  } else {
    return false;
  }
}


session_start();

if (
  isset($_POST['score']) &&
  isset($_POST['class']) &&
  isset($_POST['mssv'])
    ) {
        include "../../DB_connection.php";
        $id = $_POST['class'];
        $sv = $_POST['mssv'];
        $d = $_POST['score'];
        if ($d<0||$d>10) {
            $em  = "r"; $_SESSION['error'] = $em;
            header("Location: ../nhapdiem.php?lopid=$id&mssv=$sv");
            exit;
        } else {
                if (getDiem($id,$sv,$conn)===true) {
                        capnhatDiem($id,$sv,$d,$conn);
                }
                else {
                        nhapDiem($id,$sv,$d,$conn);
                }
        }
    } else {
        $em  = "e"; $_SESSION['error'] = $em;
        header("Location: ../nhapdiem.php?lopid=$id&mssv=$sv");
        exit;
    }
