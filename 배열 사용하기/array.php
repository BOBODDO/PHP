<?php

$testarray = [111, 222, 333, 444, 555];

foreach($testarray as $current) // testarray의 각 요소가 current에 하나씩 저장된다
{
    echo $current. " ";
}

echo("============================== \n");

$prices['Tires'] = 100;
$prices['Oil'] = 10;
$prices['Spark Plugs'] = 4;

/*
while($element = each($prices)) {
    echo $element['key']. " - " .$element['value']. "\n";
}
*/

/*
while(list($product, $price) = each($prices)){ // prices 배열의 각 key가 product로 이동하고, price에는 value가 저장된다.
    echo $product. " -- " . $price. "\n";
}
*/

/*
$prices_added['Snake'] = 1000;
$added_result = $prices + $prices_added;
print_r($added_result);
*/

/* 2차원 배열
$products = array( array('TIR', 'Tires', 100), 
                    array('OIL', 'Oil', 10),
                    array('SPK', 'Spark Plugs', 4) );

for($row=0; $row <3; $row++)
{
    for($column = 0; $column < 3; $column++)
    {
        echo '|'.$products[$row][$column];
    }
    echo "|\n";
}
*/

/*
// 2차원 배열이 숫자가 아닌 문자 key를 가지는 경우
$producs = array(
    array('Code' => 'TIR',
                        'Description' => 'Tires',
                        'Price' => 100
),
array('Code'=> 'OIL', 'Description'=>'Oil', 'Price'=>10),
array('Code'=>'SPK', 'Description'=>'Spark Plugs', 'Price'=>4)
);

for($row=0; $row < 3 ; $row++)
{
    while(list($key,$value) = each($producs[$row]))
    {
        echo '|'.$value;
    }

    echo "| \n";
}
*/
?>