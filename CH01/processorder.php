<?php
//$document_root = $_SERVER['DOCUMENT_ROOT'];
$fp = fopen("./orders.txt", 'w');

if(!$fp) // 만약 파일이 안열리면 오류 출력이 필요
{
    echo "파일이 열리지 않았어요";
    exit;
}

$output = '테스트 문자열입니다';
flock($fp, LOCK_EX);
fwrite($fp, $output, strlen($output));
flock($fp, LOCK_UN);
fclose($fp);

echo "파일에 기록되었어요";
?>