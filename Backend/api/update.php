<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  if ((int)$request->codigo < 1 || $request->nome == '' || $request->email == '') {
    return http_response_code(400);
  }

  // Sanitize.
  $codigo = mysqli_real_escape_string($con, (int)$request->codigo);
  $nome = mysqli_real_escape_string($con, $request->nome);
  $email = mysqli_real_escape_string($con, $request->email);

  // Update.
  $sql = "UPDATE `nomes` SET `nome`='$nome',`email`='$email' WHERE `codigo` = '{$codigo}' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}



