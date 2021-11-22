<?php

$fp = fopen("./orders.txt",'rb');
if(!$fp){
    echo "파일을 읽을 수 없어요";
}
flock($fp, LOCK_SH); // 파일을 읽는 동안 파일을 잠급니다
while(!feof($fp))
{
    $order = fgetcsv($fp,0,"\t");
    echo print_r($order);
}

flock($fp, LOCK_UN); // 파일 잠금 해제
fclose($fp);

?>