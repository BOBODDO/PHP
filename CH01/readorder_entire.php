<?php
//이번에는 파일을 한번에 모두 읽어보자
//readfile("./orders.txt"); // 한줄 코드를 통해 파일을 한번에 모두 읽고 출력까지 마칠 수 있다.

/* fp을 통해 별도로 파일을 한번 열어야 하고, fpassthru을 통해 파일 전체를 읽어서 출력한다
$fp = fopen('./orders.txt','rb');
fpassthru($fp);
*/

/* farrary을 통해 파일을 한번에 열 되, 배열에 저장한다
$farray = file('./orders.txt');
print_r($farray);
*/

?>