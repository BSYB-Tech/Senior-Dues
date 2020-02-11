<?php
// define variables and set to empty values
$osis = $pin = "";
mysql_connect("localhost", "root", "JohnDonne");
mysql_select_db("mcnickle");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $osis = test_input($_POST["osis"]);
  $pin = test_input($_POST["pin"]);
  // echo "OSIS is $osis 'pin' is $pin";
  // echo "<br>";
  echo "<style> table, th, td { border: 1px solid black; margin-left:auto; margin-right:auto; } td.white { color: white }  td.black { color: black } th.white { color: white }  th.black { color: black } </style>";
  echo "<table> <tr>";
 // $cols = myqsl_fetch_array(mysql_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=N'status';"));
  echo "<th class='white' bgcolor='black'> yeet </th>";
  foreach($cols as $col) {
    echo "<th class='white' bgcolor='black'> {$col} </th>";
  }
  echo "</tr> <tr>";
  $result = mysql_query("SELECT * FROM `status` WHERE `OSIS`=$osis AND `Psw`='$pin'");
  if (!$result) {
      echo 'Could not run query: ' . mysql_error();
      exit;
  }
  $row = mysql_fetch_array($result);
  for ($x=2; $x < count($row); $x++){
    echo "<td class='black' bgcolor='white'> {$row[$x]} </td>";
  }
  echo "</tr> </table>";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  if (strpos($data, "-")) {
    $data = "hacker";
  }
  return $data;
}
?>