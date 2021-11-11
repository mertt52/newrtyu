<?php 
error_reporting(0);
$username = $_GET['getir'];
$cookie=" sessionid=50416151894%3AweR0FmsnQUOOcK%3A4";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/'.$username.'?__a=1');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Accept-Language: tr-TR,tr;q=0.9',
  'Cookie: '.$cookie.'',
'Referer: https://www.instagram.com/'.$username.'/',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'sec-fetch-user: ?1',
'user-agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 $result = curl_exec($ch);
$json = json_decode($result, true);
 
$name = $json['graphql']['user']['full_name'];
$mavi = $json['graphql']['user']['is_verified'];
$tt =  $json['graphql']['user']['edge_followed_by']['count'];
$ttt = $json['graphql']['user']['edge_follow']['count'];
$gon = $json['graphql']['user']['edge_owner_to_timeline_media']['count'];
$bio=$json['graphql']['user']['biography'];
$resim = $json['graphql']['user']['profile_pic_url_hd'];
$imgData = base64_encode(file_get_contents($resim));
$pp = 'data:image/png;base64,'.$imgData;
    
// An associative array
$marks = array(
"1"=>$tt,
"2"=>$ttt, 
"3"=>$gon, 
"4"=>$mavi,
 "5"=>$bio,
 "6"=>$pp, 
 "7"=>$name, 
)   ;
echo  json_encode($marks,JSON_UNESCAPED_SLASHES );
?>

