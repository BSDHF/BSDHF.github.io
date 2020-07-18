<?

if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])

{

$ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];

}

elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])

{

$ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];

}

elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"])

{

$ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];

}

elseif (getenv("HTTP_X_FORWARDED_FOR"))

{

$ip = getenv("HTTP_X_FORWARDED_FOR");

}

elseif (getenv("HTTP_CLIENT_IP"))

{

$ip = getenv("HTTP_CLIENT_IP");

}

elseif (getenv("REMOTE_ADDR"))

{

$ip = getenv("REMOTE_ADDR");

}

else

{

$ip = "Unknown";

}

echo "您当前IP:".$ip;
?>

<?php
 $url="http://ip-api.com/json/$ip?lang=zh-CN";
 $html= file_get_contents($url);
 $math99=stripos($html,'country');
 $end99 = stripos($html,'","countryCod');
 $end99 = $end99-$math99-10;
 $country=substr($html,$math99+10,$end99);				
 $math99=stripos($html,'regionName');
 $end99 = stripos($html,'","city');
 $end99 = $end99-$math99-13;
 $regionName=substr($html,$math99+13,$end99);
 $math99=stripos($html,'city');
 $end99 = stripos($html,'","zip');
 $end99 = $end99-$math99-7;
 $city=substr($html,$math99+7,$end99);
				echo "         您当前IP来自：";
				echo $country."-";
				echo $regionName."-";
				echo $city;
				?>
