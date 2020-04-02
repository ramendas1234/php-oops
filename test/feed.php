<?php
 $domOBJ = new DOMDocument();
 $domOBJ->load("rss.xml");//XML page URL
 
 $content = $domOBJ->getElementsByTagName("item");
 
 foreach( $content as $data )
 {
   $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
   $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
   echo "$title :: $link";
 }
?>
