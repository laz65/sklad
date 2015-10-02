<?php
require_once "lib/JsHttpRequest/JsHttpRequest.php";
// Init JsHttpRequest and specify the encoding. It's important!
//$JsHttpRequest =& new JsHttpRequest("windows-1251");
new JsHttpRequest("utf-8");
// Fetch request parameters.
// Прием
$str = $_REQUEST['str'];
// Отправка
$GLOBALS['_RESULT'] = array(
      "str"   => $str,
      "md5"   => md5($str),
  	);

?>
