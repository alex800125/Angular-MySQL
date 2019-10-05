<?php
/**
 * Returns the list of policies.
 */
require 'database.php';

$nomes = [];
$sql = "SELECT codigo, nome, email FROM Nomes";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $nomes[$i]['codigo']    = $row['codigo'];
    $nomes[$i]['nome'] = $row['nome'];
    $nomes[$i]['email'] = $row['email'];
    $i++;
  }

  echo json_encode($nomes);
}
else
{
  http_response_code(404);
}



