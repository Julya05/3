<?php

echo "Задание №1" . "<br/>" . "<br/>";

$link = 'data.xml';
$xml = simplexml_load_file($link);
echo "Номер  заказа: ".$xml[PurchaseOrderNumber] . "<br/>";
echo "Дата заказа: ".$xml[OrderDate] . "<br/><hr>" . "<pre></pre>";
echo "Имя: ".$xml->Address[0]->Name . "<br/>";
echo "Адрес: ".$xml->Address[0]->Street . "<br/>";
echo "Город: ".$xml->Address[0]->City . "<br/>";
echo "Штат: ".$xml->Address[0]->State . "<br/>";
echo "Индекс: ".$xml->Address[0]->Zip . "<br/>";
echo "Страна: ".$xml->Address[0]->Country . "<br/>";
echo "Коментрарий: ".$xml->DeliveryNotes[0] . "<br/>" . "<br/>";

foreach ($xml->Items->Item as $item) {
    echo "Номер партии: ".$item[PartNumber]. "<br/>";
    echo "Наименование: ".$item->ProductName. "<br/>";
    echo "Количество: ".$item->Quantity. "<br/>";
    echo "Цена: ".$item->USPrice. "<br/>";
    echo "Комментарий: ".$item->Comment. "<br/>";
    echo "Дата доставки: ".$item->ShipDate. "<br/>" . "<br/>" ;
}

echo "Задание №2" . "<br/>" . "<br/>";

$name = array(
    "firstName" => "Julia",
    "lastName" => "Simanova",
    "data" => array(
        array(
            "age" => 21,
            "growth" => 156,
        ),
    ),
    "allInfirmation" => true
);
$json = json_encode($name);
$fp = fopen("output.json", "w");
file_put_contents("output.json", $json);
fclose($fp);
echo "Okay" . "<br/>";
$rand=mt_rand(0,1);
if($rand==1){
    $a="123";
    $b="321";
    $a = trim($a);
    $c = trim($b);
    $file = file_get_contents("output.json");
    $d=json_decode($file,TRUE);
    foreach ( $d  as $key => $value){
        if ( $a == $value) {
            $d[$key]  = $c;
        }
    }
    file_put_contents("output2.json",json_encode($d));
    unset($d);
}else
{
    echo "<br/>Не изменили</br>";
    $file = file_get_contents("output.json");
    $d=json_decode($file,TRUE);
    file_put_contents("output2.json",json_encode($d));
    unset($d);
}
echo "Okay2</br></br>";
$list = file_get_contents("output2.json");
echo $list;
$first= file_get_contents("output.json");
$second= file_get_contents("output2.json");
$one=json_decode($first,TRUE);
$two = json_decode($second,TRUE);
echo "<br>";
$result = array_diff($one, $two);
print_r($result);
echo "<br>" . "<br>";;

echo "Задание №3" . "<br/>" . "<br/>";

function task1(){
    $fileName = "test.csv";
    $longList = mt_rand(50,100);
    $csv = [];
    for ($i = 0; $i < $longList; $i++){
        $csv[$i] = mt_rand(0,100);
    }
    file_put_contents($fileName, "");
    $fp = fopen($fileName,"w");
    fputcsv($fp, $csv);
    fclose($fp);
    $outcome = "TRUE";
    Return $outcome;
}
function task2 ($filename)
{
    $array = [];
    $row = 1;
    if (($handle = fopen("test.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 150, ",")) !== FALSE) {
            $num = count($data);
            echo "<p>$num полей в строке $row:<br></p>\n";
            $row++;
            for ($j = 0; $j < $num; $j++) {
                if (($data[$j] % 2) == 0) {
                    $array[] = $data[$j];
                }
            }
            fclose($handle);
        }
        $sum = array_sum($array);
        return $sum;
    }
}
echo task1();
echo task2("test.csv");

echo "Задание №4" . "<br/>" . "<br/>";

$url="https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
    $array = json_decode($data, true);
    $array = ["query"]["pages"]["15580374"]["pageid"];
    $array = ["query"]["pages"]["15580374"]["title"];
    print_r($array);
}

?>

