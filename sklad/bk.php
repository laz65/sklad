<?php
require_once "req/lib/JsHttpRequest/JsHttpRequest.php";
// Init JsHttpRequest and specify the encoding. It's important!
//$JsHttpRequest =& new JsHttpRequest("windows-1251");
new JsHttpRequest("utf-8");
// Fetch request parameters.
// Прием
$str = $_REQUEST['str'];

$connection = pg_connect("dbname=sklad user=sklad password=12345");
$result=pg_query($connection, "select * from sklad  where  inv like '%$str%';");

// Отправка

$GLOBALS['_RESULT'] = array(
      "str"   => $str,  
      "strok"   => "<table border = \"2\"> <tr align=\"center\">
    <td><strong>Центр</strong></td>
    <td><strong>Підрозділ</strong></td>
    <td><strong>Тип обладн. </strong></td>
    <td><strong>Модель</strong></td>
    <td><strong>Сер №</strong></td>
    <td><strong>Інв № </strong></td>
    <td><strong>Наряд № </strong></td>
    <td><strong>Стан</strong></td></tr>",
	);
while ($db=pg_fetch_array($result)):
$GLOBALS['_RESULT']['strok'] = $GLOBALS['_RESULT']['strok']."<tr><td>$db[centr]</td><td>$db[viddil]</td><td>$db[tip]</td><td>$db[model]</td><td>$db[ser]</td><td>$db[inv]</td><td>$db[nomer]</td><td>$db[stan]</td></tr>" ; 
endwhile;
$GLOBALS['_RESULT']['strok'] = $GLOBALS['_RESULT']['strok']."</table>"
?>


