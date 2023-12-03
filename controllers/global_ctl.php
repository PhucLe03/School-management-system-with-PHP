<?php

function gotoLop($lop_id) {
  return "./lop_view.php?id=$lop_id";
}

function gotoNhapDiem($id_lophoc,$mssv) {
  return "./nhapdiem.php?lopid=$id_lophoc&mssv=$mssv";
}

function gotoBaiGiang($baigiang_id) {
  return "./baigiang.php?id=$baigiang_id";
}

function themBaiGiang($id_lophoc) {
  return "./thembaigiang.php?lopid=$id_lophoc";
}

function suaBaiGiang($id,$lop_id) {
  return "./suabaigiang.php?lopid=$lop_id&id=$id";
}

function xoaBaiGiang($id,$lop_id) {
  return "./xoabaigiang.php?lopid=$lop_id&id=$id";
}

function gotoBaiTap($baitap_id) {
  return "./baitap.php?id=$baitap_id";
}

function themBaiTap($id_lophoc) {
  return "./thembaitap.php?lopid=$id_lophoc";
}

function suaBaiTap($id,$lop_id) {
  return "./suabaitap.php?lopid=$lop_id&id=$id";
}

function xoaBaiTap($id,$lop_id) {
  return "./xoabaitap.php?lopid=$lop_id&id=$id";
}

function gotoBaiKT($kt_id) {
  return "./baikt.php?id=$kt_id";
}

function themBaiKT($id_lophoc) {
  return "./thembaikt.php?lopid=$id_lophoc";
}

function suaBaiKT($id,$lop_id) {
  return "./suabaikt.php?lopid=$lop_id&id=$id";
}

function xoaBaiKT($id,$lop_id) {
  return "./xoabaikt.php?lopid=$lop_id&id=$id";
}