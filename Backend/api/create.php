<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  // Validate.
  if($request->nome === '' || $request->email === '')
  {
    return http_response_code(400);
  }

  // Sanitize.
  $nome = mysqli_real_escape_string($con, $request->nome);
  $email = mysqli_real_escape_string($con, $request->email);


  // Create.
  $sql = "INSERT INTO `nomes`(`codigo`,`nome`,`email`) VALUES (null,'{$nome}','{$email}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $names = [
      'email' => $email,
      'nome' => $nome,
      'codigo'    => mysqli_insert_id($con)
    ];
    echo json_encode($names);
  }
  else
  {
    http_response_code(422);
  }
}



