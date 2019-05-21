<?php
  include 'conn.php';

  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);

  $file = $request->Path;

  unlink($file);
?>
