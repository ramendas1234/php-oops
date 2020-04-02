<?php
$con = mysqli_connect("localhost", "root", "123", "test");
 
 $sql = "SELECT * FROM rss_info ORDER BY id DESC LIMIT 20";
 $result = $con->query($sql);
 
 
 header( "Content-type: text/xml");
 
 echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>w3schools.in | RSS</title>
 <link>/</link>
 <description>Cloud RSS</description>
 <language>en-us</language>";
 
 while($row = $result->fetch_assoc()){
   $title=$row["title"];
   $link=$row["link"];
   $description=$row["description"];
 
   echo "<item>
   <title>$title</title>
   <link>$link</link>
   <description>$description</description>
   </item>";
 }
 echo "</channel></rss>";
?>