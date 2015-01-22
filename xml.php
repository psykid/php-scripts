<?php 
$dom = new DOMDocument();
$nodes = $dom->createElement("markers");
$parnode = $dom->appendChild($nodes);
	$node = $doc->create_element("marker");
	$newnode = $parnode->append_child($node);
	$newnode->set_attribute("name", "someone");
	$newnode->set_attribute("address", "emo!!");
	$newnode->set_attribute("lat", "latitude=34.10");
	$newnode->set_attribute("lng", "longitude=23.90");
	$newnode->set_attribute("type", "hotel");
$dom->appendChild($nodes);

$dom->save("test.xml");
echo "xml generated"; 
/*$text = '�Spanish exclamation!' ;

  $xml = domxml_new_doc( '1.0' );
  $node = $xml->create_element( 'example' );
  $cdata = $xml->create_cdata_section( $text );
  $node->append_child( $cdata );
  $xml->append_child( $node );

  echo $xml->dump_mem( true, 'UTF-8' ) ;

?>;
  */
?>