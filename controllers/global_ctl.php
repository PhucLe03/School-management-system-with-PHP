<?php

function gotoLop($lop_id) {
  return "./lop_view.php?id=$lop_id";
}

function gotoBaiGiang($baigiang_id, $lop_id) {
  return "./baigiang.php?id=$baigiang_id";
}