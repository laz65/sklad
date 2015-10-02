<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>


<body>

<?php
$sklad_id = $_GET['id'];
$login = $_SERVER['REMOTE_USER'];	
$connection = pg_connect("dbname=sklad user=sklad password=12345");
$result2=pg_query($connection, "select * from sklad where sklad_id  = $sklad_id;");
$db2=pg_fetch_array($result2);

    if(!($fp= fopen ("files/blank.rtf", "r"))) die ("Can't open");// имя файла $blank
    $dataText = fread($fp, 500000);
    fclose ($fp);

	foreach ($db2 as $key=>$value) 
		{	
			if (!$value) $value = "-";
			$dataText = str_replace ("\{{$key}\}", iconv("UTF-8","windows-1251",$value), $dataText);
		}
	
	// save the file as an rtf
	$narjad =  str_replace ("/", "-", $db2[nomer]);
	$saveFile = "files/" . $narjad .".rtf";
	$printFile= "files/" . $narjad .".rtf";

	if(!($fq= fopen ($saveFile, "w+"))) die ("Ошибка доступа");
	fwrite ($fq, $dataText);
	fclose ($fq);
echo "<a href='$saveFile'>Якщо документ не завантажився автоматично, його можна отримати тут.</a>";

echo "<META HTTP-EQUIV=\"Refresh\" content =\"0; URL='$printFile'\">";

?>
</body>
</html>