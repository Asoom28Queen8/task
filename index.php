<?php
error_reporting(0);
 
//https://stackoverflow.com/a/58658738
$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,"https://countriesnow.space/api/v0.1/countries/info?returns=currency,flag,unicodeFlag,dialCode");
//Set the GET method by giving 0 value and for POST set as 1
//curl_setopt($curl_handle, CURLOPT_POST, 0);
curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
$query = curl_exec($curl_handle);
$data = json_decode($query, true);
curl_close($curl_handle);

//print complete object, just echo the variable not work so you need to use print_r to show the result
// echo print_r( $data);
//at first layer
// echo $data["msg"];
// //Inside the second layer
// echo $data["data"][0]["name"];
// // $ww=  $data["data"];
// -------------------------------------------------
echo'SCROLL DOWN TO SEE DATA PLEASE...';
echo'<!DOCTYPE html><html lang="en"><body>';
echo '<table><thead><th> name </th><th> dialog </th><th > flage </th></thead><tbody>';


// ------------------------------------------------------


for(  $i=0;$i< count($data["data"]);$i++){
    echo '<tr><td colspan="2">'.$data["data"][$i]["name"].'</td><br>';
    echo '<td colspan="4">'.$data["data"][$i]["dialCode"].'</td><br>';
    //   $mg= $data["data"][$i]["flag"] ;
   echo '<td colspan="4"><img height="50px"  src="'.$data["data"][$i]["flag"].'"></td></tr>';
   echo '<br>';
}

echo '</tbody></table></body></html>';
?>












































// ini_set("allow_url_fopen", 1);


// $ch = curl_init();
// // IMPORTANT: the below line is a security risk, read https://paragonie.com/blog/2017/10/certainty-automated-cacert-pem-management-for-php-software
// // in most cases, you should set it to true
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_URL, "https://countriesnow.space/api/v0.1/countries/info?returns=currency,flag,unicodeFlag,dialCode");
// $result = curl_exec($ch);
// curl_close($ch);

// $obj = json_decode($result);
// echo $obj->data[0]['name'];//["data"][1]["name"];






// try{
// $url="https://countriesnow.space/api/v0.1/countries/info?returns=currency,flag,unicodeFlag,dialCode";
// $response =file_get_contents($url);
 
// if($response!==false){
//     $obj = json_decode($response);
// echo $obj->data['data'];
// // echo $response["data"]['name'];
// }
// }catch(Exception $e){
//     echo $e->getMessage();
// }