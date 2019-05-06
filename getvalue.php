<?php
$db_host = 'localhost';
$db_user = "root";
$db_pass = "";
$db_name = 'testing';
$db_connect = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$db_connect) {
  mysql_error("Error Conneting", die());
}
$getdata = 'SELECT * FROM `m_list` ORDER BY `m_list`.`type` ASC ';
$getdateresult = mysqli_query($db_connect,$getdata);

$a = array(
  'Anna','Brittany','Cindrella','Diana','Eva','Fiona','Gunda','Hege','Inga','Johanna','Kitty','Linda','Nina','Ophelia','Petunia','Amanda','Raquel','Cindy','Doris','Eve','Evita','Wenche','Vicky','myat'

);


//genre year type rating

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";
while($row = mysqli_fetch_array($getdateresult)) {
  // var_dump($row);
  $co = $row['type'];
  $year = $row['year'];
  $genre = $row['genre'];
  $rating = $row['rating'];
  //$pcode = $row['phonecode'];
  // lookup all hints from array if $q is different from ""
  if ($q !== " ") {
      $q = strtolower($q);
      $len=strlen($q);
      //foreach($row as $name) {
          if (stristr($q, substr($co, 0, $len)) || stristr($q, substr($year, 0, $len)) || stristr($q, substr($genre, 0, $len))) {
              if ($hint == " ") {
                  $hint = "<div>your find name is  <p style='color:red;font-size:2em;'>{$co} ({$year})[{$genre}]</p>";
              } else {
                $hint .= "<p class='color:green;'>{$co}</p></div>";
              }
          }
      //}
  }
}
// Output "no suggestion" if no hint was found or output correct values

echo $hint === "" ? "Nothing found data here" : "{$hint}";
?>
