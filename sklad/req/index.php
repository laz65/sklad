<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="lib/JsHttpRequest/JsHttpRequest.js"></script>
<script language="JavaScript">

    // Function is called when we need to calculate MD5.
    function proba() {
        JsHttpRequest.query(
            'backend.php', // Скрипт обработки
      		{
                // выходные значения
             'str': document.getElementById("test").value   
       		},
            // Функция возвращает массив ответов. 
            function(result, errors) {
                // Write errors to the debug div.
                document.getElementById("debug").innerHTML = errors; 
                // Запись ответов в нужные поля.
                document.getElementById("ans").innerHTML = 
                    'MD5("' + result["str"] + '") = ' + result["md5"];
				if (result["str"] == "12345") {
					alert('Проверка сообщения!');
					}
            },
            false  // do not disable caching
        );
    }
</script>

<!-- Please note that we must specify enctype to multipart/form-data! -->
<form method="post" enctype="multipart/form-data" onsubmit="return false">
    Enter a text: <input type="text" id="test" value=""><br>
    <input type="submit" name="button" id="button" value="Отправить" onclick="proba()" />
</form>

<div id="ans" style="border:1px solid #000; padding:2px">
    Structured results
</div>
<div id="debug" style="border:1px dashed red; padding:2px">
    Debug info
</div>

