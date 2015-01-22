<?php 
//header("Content-type: text/xml");
// Start XML file, create parent node
$dom = new DOMDocument();
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
//header("Content-type: text/xml");
require($_SERVER["DOCUMENT_ROOT"]."/config/db_conf.php");
// Opens a connection to a mysqli server
$connection=mysqli_connect ('localhost', $db_user, $db_password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active mysqli database
$db_selected = mysqli_select_db($connection,"test");
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

// Iterate through the rows, adding XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $node = $doc->create_element("marker");
  $newnode = $parnode->append_child($node);

  $newnode->set_attribute("name", $row['name']);
  $newnode->set_attribute("address", $row['address']);
  $newnode->set_attribute("lat", $row['lat']);
  $newnode->set_attribute("lng", $row['lng']);
  $newnode->set_attribute("type", $row['type']);
}

//$xmlfile = $dom->dump_mem(true);
//echo $xmlfile;
$dom->save("test.xml");
echo "xml generated";
?>
