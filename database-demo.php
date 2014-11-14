<?php
# connect to world database on local computer
#$db = mysql_connect("127.0.0.1", "pigeonflight");
if (!mysql_connect("127.0.0.1", "pigeonflight")) {
  die("Woah ... something is wrong " . "we'll fix this soon");
}
mysql_select_db("world");

# execute a SQL query on the database
$results = mysql_query(
  "SELECT * FROM countries WHERE population > 100000000;");

# number of rows
print "we got " . mysql_num_rows($results) . " row(s)";

# loop through each country

while ($row = mysql_fetch_array($results)) {
  ?>
  <li> <?= $row["population"] ?>, <?= $row["name"] ?>, ruled by <?= $row["head_of_state"] ?> </li>
  <?php
}
?>