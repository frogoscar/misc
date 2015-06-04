<?php

function getSerialLongFromHardwareId($HardwareId)
{
  $baseURL='http://toolbox.kuantic.com/products/getProductInfoFromHardwareId/';
  $username='kuantic-enming-xie';
  $password='w7StQ5q7';

  $URL = $baseURL.$HardwareId.".xml";

  // init curl
  $ch = curl_init();

  // set the URL to work with
  curl_setopt($ch, CURLOPT_URL, $URL);

  //Setting CURLOPT_RETURNTRANSFER variable to 1 will force cURL
  //not to print out the results of its query.
  //Instead, it will return the results as a string return value
  //from curl_exec() instead of the usual true/false.
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($ch,CURLOPT_HEADER,0);

  // set username and password
  curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

  // execute the request
  $result = curl_exec($ch);

  $myXML = simplexml_load_string($result);

  // close the curl
  curl_close($ch);

  return $myXML->prd_serial;

}

$serial_long = getSerialLongFromHardwareId(1881406309);
echo $serial_long;
echo "\n";

?>