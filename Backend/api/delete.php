<?php

require 'database.php';

// Extract, validate and sanitize the codigo.
$codigo = ($_GET['codigo'] !== null && (int)$_GET['codigo'] > 0)? mysqli_real_escape_string($con, (int)$_GET['codigo']) : false;

if(!$codigo)
{
  return http_response_code(400);
}

// Delete.
$sql = "DELETE FROM `nomes` WHERE `codigo` ='{$codigo}' LIMIT 1";

if(mysqli_query($con, $sql))
{
  http_response_code(204);
}
else
{
  return http_response_code(422);
}



