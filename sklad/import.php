<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>



<?php

$connection = pg_connect ("dbname=sklad user='sklad' password='12345' ");

if(isset($_FILES["myfile"])) 
{ 
    $myfile = $_FILES["myfile"]["tmp_name"]; 
    $error_flag = $_FILES["myfile"]["error"]; 
	copy ($myfile, "/tmp/vremen.tmp") ; 
	$err = 0;	
	echo "Получаем содержимое файла"; 
    if(!($fp = fopen("/tmp/vremen.tmp","r")))	echo " Не получается!!! " ;		
	while (($data = fgetcsv($fp, 512, ";")) !== FALSE) 
	{
	    $num = count($data);
//		echo "Zapis $num";
    	$row++;
        if ($num == 12)
        {    
	    	if (!pg_query($connection, "INSERT INTO printlist( coderesurs, modelprinter) VALUES ('$data[1]', '$data[2]');"))
			{
				echo "<span class=\"стиль4\">Запис '$data[0]', '$data[1]', '$data[2]' неможливо занести в базу. </span><br/>";
				$err++;
			};
		} 
		else
		{
			echo "<h3><span class=\"стиль4\">ЗАПИС ПОВИНЕН МАТИ ФОРМУ: телефон, номер, сума_боргу<br />";
			echo "КОЖЕН ЗАПИС НА ОКРЕМІЙ СТРОЦІ ТІЛЬКИ ЦИФРИ ТА КОМА,<br />";
			echo "БЕЗ СТОРОННІХ СИМВОЛІВ!!! ПЕРЕВІРТЕ ФАЙЛ!!!.</span></h3>";
			$err = 99999999;
			break;
		}        
	}
	fclose($fp);	 
	unlink("/tmp/vremen.tmp") ; 
}

pg_close($connection);
?>
         <FORM ENCTYPE="multipart/form-data" ACTION="" METHOD=POST>
          4. Виберіть файл:
          <input name="myfile" type="file" />
          <input name="submit" type="submit" style="height: 25px" value="ЗАВАНТАЖИТИ" />
		 </form>

               
</body>
</html>
