#!/usr/bin/php

<?php

if (ob_get_level() == 0) ob_start();


foreach(file('input.txt') as $line) {


  echo "working on query: ". $line."<br>";

   downloadData(trim($line));

   ob_flush();

    flush();


    sleep(10);

}


ob_end_flush();


function downloadData($qry){

 

$url1 = "http://ubibrowser.ncpsb.org/strict/networkview/networkview/name/".$qry;


//  Initiate curl

$ch = curl_init();

// Disable SSL verification

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

// Will return the response, if false it print the response

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the url

curl_setopt($ch, CURLOPT_URL,$url1);

// Execute

$result=curl_exec($ch);

// Closing

curl_close($ch);


preg_match('#window.allData = (.*?);\s*$#m', $result, $matches);

 

$final = trim($matches[0]);

$final = str_replace("window.allData =", "", $final);


$final = substr($final, 0, -1);


$arr = json_decode($final, true);


$str =  "E3,E3GENE,SUB,SUBGENE,HOMO,PFAM,GO,NET,MOTIF,SCORE\n";

foreach ($arr as $key => $value) {

  $str .= $value["E3"].",".$value["E3GENE"].",".$value["SUB"].",".$value["SUBGENE"].",".$value["HOMO"].",".$value["PFAM"].",".$value["GO"].",".$value["NET"].",".$value["MOTIF"].",".$value["SCORE"]."\n";


}


file_put_contents("file-".$qry.".csv", $str);


}
