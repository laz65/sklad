<html><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->

<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/styles.css" rel="stylesheet" type="text/css">



<link href="css/styles.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.стиль27 {font-size: smaller;}
-->
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.стиль3 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
.стиль5 {color: #FFFFFF; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif;}
.стиль10 {font-size: 12px; }
.стиль12 {color: #FFFFFF; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.стиль22 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: x-small;
	color: #FFCC00;
	font-weight: bold;
}
.стиль23 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body class="body">

<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="100%" align="left" valign="top">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      	<tr>
        	<td height="20" colspan="4" align="left" valign="middle" bordercolor="#3366FF" bgcolor="#3366FF" class="logobg"><div align="center" class="стиль23">
        	  <p>Обладнання, яке знаходиться в ремонті в ЦІТ і ТЗ</p>
        	  </div></td>
        </tr>
      	<tr>
      	  <td width="33%" height="20" align="center"  bordercolor="#3366FF" bgcolor="#3366FF" class="logobg"><div align="center"><a href="index.php" class="стиль5">Наряд</a></div></td>
    	  <td width="33%" align="center"  bordercolor="#3366FF" bgcolor="#3366FF" class="logobg"><a href="spisok.php" class="стиль5">Список</a></div></td>         
<?php 
												  
$login = $_SERVER['REMOTE_USER'];	
$connection = pg_connect("dbname=sklad user=sklad password=12345");
$result2=pg_query($connection, "select dostup, rabotniki_id from rabotniki where login = '$login';");
$db2=pg_fetch_array($result2);
$dostup=$db2['dostup'] ;
if ($dostup == 1) 
{ 
?>
 <td width="33%" align="left"  bordercolor="#3366FF" bgcolor="#3366FF" class="logobg"><div align="center"><a href="adm.php" class="стиль5">Адміністрування</a></div></td>
								
<?php
};
?>

 <td width="33%" align="left"  bordercolor="#3366FF" bgcolor="#3366FF" class="logobg"><div align="center"><a href="kart.php" class="стиль5">Облік картриджів</a></div></td>

      	</tr>
      	<tr>
      	  <td height="4" colspan="3" align="left" valign="top" bordercolor="#3399FF" bgcolor="#3399FF" class="logobg"></td>
    	  </tr>
    	</table>
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      	<tr>
					<td width="10" bgcolor="#3366FF">&nbsp;</td>
       	  <td width="5" align="center" valign="top" bordercolor="#3333FF" bgcolor="#3366FF">
					<br>
					<p><span class="стиль12"><br>
			  </span>            <span class="стиль22"><a href="help.html" class="стиль22"></a></span><br>
			  <br>
			  <br>		  
          </td>
					<td width="10" align="left" valign="top" bgcolor="#3399FF">&nbsp;</td>
    			<td width="2" bgcolor="#336633"><img src="images/xnew.gif" alt="Заработок на платных опросах" width="2" height="500"></td>
        	<td width="100%" align="left" valign="top" bgcolor="#FFFFFF">
        		<table border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
            		<td width="100%">&nbsp;</td>
            	</tr>
        		</table>
        		<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%">
          		<tr>
            		<td width="10" align="left" valign="top">&nbsp;</td>
            		<td width="100%" align="left" valign="top">
									<table class="refhome" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
        						<tr>
          						<td align="center" nowrap bgcolor="#FFFFFF"></td>
          						</tr>
      						</table>	
									
									<table width="100%">
                    <tr>
                      <td align="right">
						<div align="justify" class="text">
											  <!-- InstanceBeginEditable name="EditRegion3" -->
											  <?php 
$full = $_POST['full'];
$st = $_POST['st'];
$ye = $_POST['ye'];
$me = $_POST['me'];
$yek = $_POST['yek'];
$mek = $_POST['mek'];
$rabotnik = $_POST['rabotnik'];
$centr = $_POST['centr'];
$tip = $_POST['tip'];
$inv = $_POST['inv'];
$limit = $_POST['limit'];
if($limit == '') $limit = 200;
//$yvrem = rtrim(`sudo -i date +%y`);
//$mvrem = rtrim(`sudo -i date +%m`);
?>
											  
											  
<form name="form1" method="post" action="">
				
											    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                                                  <tr>
                                                    <td colspan="2"><select name="full" id="full">
                                                      <option value=0 <?php if (!$full) echo "selected='selected'";?>>Скорочене відображення</option>
                                                      <option value=1 <?php if ($full) echo "selected='selected'";?>>Повне відображення</option>
                                                    </select></td>
                                                    <td width="26%"><select name="st" id="st" >
                                                      <option value=0 <?php if ($st==0) echo "selected='selected'";?>>Знаходяться в ЦІТ</option>
                                                      <option value=1 <?php if ($st==1) echo "selected='selected'";?>>Всі</option>
                                                      <option value=2 <?php if ($st==2) echo "selected='selected'";?>>Видані</option>
                                              
                                                    </select></td>
                                                    <td width="35%"><strong>
                                                      <select name="rabotnik" id="rabotnik" >
<?php

$result2=pg_query($connection, "select * from rabotniki order by rabotniki_id");
echo "<option value=''>Виберіть робітника для фільтру</option>";
while($db2=pg_fetch_array($result2)):
$nspi=$db2['rabotnik'] ;
if($nspi == $rabotnik) 
{
 echo "<option value='$nspi' selected='selected'>$nspi</option>";
} 
else 
{
 echo "<option value='$nspi'>$nspi</option>";
};
endwhile;
?>
                                                      </select>
                                                    </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2">&nbsp;</td>
                                                    <td>Вивести
                                                    <input name="limit" type="text" id="limit" value="<?php echo $limit; ?>" size="4" maxlength="4">
                                                    записів</td>
                                                    <td><strong>
                                                      <select name="centr" id="centr" >
<?php

$result2=pg_query($connection, "select * from centry");
echo "<option value=''>Виберіть центр для фільтру</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['centr'] ;
 $spi = $db2['misto'];
if($nspi == $centr) 
{
 echo "<option value='$nspi' selected='selected'>$nspi($spi)</option>";
} 
else 
{
 echo "<option value='$nspi'>$nspi($spi)</option>";
};
endwhile;
?>
                                                      </select>
                                                    </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2"><strong>Виберіть дату, з якої відображати:</strong></td>
                                                    <td>&nbsp;</td>
                                                    <td><strong>
                                                      <select name="tip" id="tip" >
<?php

$result2=pg_query($connection, "select * from tipy ");
echo "<option value=''>Виберіть обладнання для фільтру</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['tip'];
if($nspi == $tip) 
{
 echo "<option value='$nspi' selected='selected'>$nspi</option>";
} 
else 
{
 echo "<option value='$nspi'>$nspi</option>";
};
endwhile;
?>
                                                   </select>
                                                    </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="18%"><div align="right">З Рік
                                                        
                                                        <select name="ye" id="ye">
                                                          <option value="00" selected>Всі</option>
                                                          <option value="11" <?php if ($ye=='11') echo "selected='selected'";?>>2011</option>
                                                          <option value="12" <?php if ($ye=='12') echo "selected='selected'";?>>2012</option>
                                                          <option value="13" <?php if ($ye=='13') echo "selected='selected'";?>>2013</option>
                                                          <option value="14" <?php if ($ye=='14') echo "selected='selected'";?>>2014</option>
                                                          <option value="15" <?php if ($ye=='15') echo "selected='selected'";?>>2015</option>
                                                          <option value="16" <?php if ($ye=='16') echo "selected='selected'";?>>2016</option>
                                                          <option value="17" <?php if ($ye=='17') echo "selected='selected'";?>>2017</option>
                                                          <option value="18" <?php if ($ye=='18') echo "selected='selected'";?>>2018</option>
                                                          <option value="19" <?php if ($ye=='19') echo "selected='selected'";?>>2019</option>
                                                          <option value="20" <?php if ($ye=='20') echo "selected='selected'";?>>2020</option>
                                                        </select>
                                                    </div></td>
                                                    <td width="21%">Місяць
                                                      <select name="me" id="me">
                                                        <option value="00">Всі</option>
                                                        <option value="01" <?php if ($me=='01') echo "selected='selected'";?>>1</option>
                                                        <option value="02" <?php if ($me=='02') echo "selected='selected'";?>>2</option>
                                                        <option value="03" <?php if ($me=='03') echo "selected='selected'";?>>3</option>
                                                        <option value="04" <?php if ($me=='04') echo "selected='selected'";?>>4</option>
                                                        <option value="05" <?php if ($me=='05') echo "selected='selected'";?>>5</option>
                                                        <option value="06" <?php if ($me=='06') echo "selected='selected'";?>>6</option>
                                                        <option value="07" <?php if ($me=='07') echo "selected='selected'";?>>7</option>
                                                        <option value="08" <?php if ($me=='08') echo "selected='selected'";?>>8</option>
                                                        <option value="09" <?php if ($me=='09') echo "selected='selected'";?>>9</option>
                                                        <option value="10" <?php if ($me=='10') echo "selected='selected'";?>>10</option>
                                                        <option value="11" <?php if ($me=='11') echo "selected='selected'";?>>11</option>
                                                        <option value="12" <?php if ($me=='12') echo "selected='selected'";?>>12</option>
                                                      </select></td>
                                                    <td><input name="csv" type="checkbox" id="csv" value="1">
                                                    - створити 
                                                      <input name="filename" type="text" id="filename" value="name" size="8" align="right">
                                                    csv.</td>
                                                    <td rowspan="2">Інв№
                                                      <input name="inv" type="text" id="inv" value="<?php echo $inv; ?>" size="12"></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="18%"><div align="right">До Рік 
                                                        <select name="yek" id="yek">
                                                          <option value="00" selected>Всі</option>
                                                          <option value="11" <?php if ($yek=='11') echo "selected='selected'";?>>2011</option>
                                                          <option value="12" <?php if ($yek=='12') echo "selected='selected'";?>>2012</option>
                                                          <option value="13" <?php if ($yek=='13') echo "selected='selected'";?>>2013</option>
                                                          <option value="14" <?php if ($yek=='14') echo "selected='selected'";?>>2014</option>
                                                          <option value="15" <?php if ($yek=='15') echo "selected='selected'";?>>2015</option>
                                                          <option value="16" <?php if ($yek=='16') echo "selected='selected'";?>>2016</option>
                                                          <option value="17" <?php if ($yek=='17') echo "selected='selected'";?>>2017</option>
                                                          <option value="18" <?php if ($yek=='18') echo "selected='selected'";?>>2018</option>
                                                          <option value="19" <?php if ($yek=='19') echo "selected='selected'";?>>2019</option>
                                                          <option value="20" <?php if ($yek=='20') echo "selected='selected'";?>>2020</option>
                                                      </select>
                                                    </div></td>
                                                    <td>Місяць 
                                                      <select name="mek" id="mek">
                                                        <option value="00">Всі</option>
                                                        <option value="01" <?php if ($mek=='01') echo "selected='selected'";?>>1</option>
                                                        <option value="02" <?php if ($mek=='02') echo "selected='selected'";?>>2</option>
                                                        <option value="03" <?php if ($mek=='03') echo "selected='selected'";?>>3</option>
                                                        <option value="04" <?php if ($mek=='04') echo "selected='selected'";?>>4</option>
                                                        <option value="05" <?php if ($mek=='05') echo "selected='selected'";?>>5</option>
                                                        <option value="06" <?php if ($mek=='06') echo "selected='selected'";?>>6</option>
                                                        <option value="07" <?php if ($mek=='07') echo "selected='selected'";?>>7</option>
                                                        <option value="08" <?php if ($mek=='08') echo "selected='selected'";?>>8</option>
                                                        <option value="09" <?php if ($mek=='09') echo "selected='selected'";?>>9</option>
                                                        <option value="10" <?php if ($mek=='10') echo "selected='selected'";?>>10</option>
                                                        <option value="11" <?php if ($mek=='11') echo "selected='selected'";?>>11</option>
                                                        <option value="12" <?php if ($mek=='12') echo "selected='selected'";?>>12</option>
                                                      </select></td>
                                                    <td><input type="submit" name="Submit" value="Виконати"></td>
                                                  </tr>
                                                </table>
										      </form>
											  <p>
											  
<?php

if ($st == 0) $zapros = "stan != 'Видано' " ; else { if ($st == 1) $zapros = "stan != '' "; else $zapros = "stan = 'Видано'";};
if ($ye > '00') 
{
	$data = $ye . $me . '00';
	$zapros = $zapros . " and nomer > '$data'";
}
if ($yek > '00') 
{
	$datak = $yek . $mek+1 . '00';
	$zapros = $zapros . " and nomer < '$datak'";
}

if ($tip != '' ) $zapros = $zapros . " and tip = '$tip'";
if ($centr != '') $zapros = $zapros . " and centr = '$centr'";
if ($rabotnik != '') $zapros = $zapros . " and zrobiv = '$rabotnik'";
if ($inv != '') $zapros = $zapros . " and inv like '%$inv%' ";
$result=pg_query($connection, "select sklad_id, centr, viddil, tip, model, ser, inv, nomer, stan, prinav, podav, data_priyom, data_izmen, zrobiv, data_vidach, vidav, otrimav, prim from sklad  where  $zapros order by nomer desc limit $limit;");
$result2=pg_query($connection, "select * from stan");

if (isset($_POST['csv']))
{
	$myfile = $_POST['filename'];
	if(!($fp = fopen("/tmp/vremen.tmp","w"))) echo "<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='spisok.php'\">" ;
	fwrite($fp, "\xEF\xBB\xBF" ) ;	
	fputcsv($fp, Array("ID","Центр","Підрозділ", "Тип обладн.", "Модель", "Сер №", "Інв №", "Наряд №", "Стан", "Прийняв", "Подав", "Дата прийому", "Дата змін", "Виконавец", "Дата видачі", "Видав", "Отримав", "Примітка"), ";");
	while($row = pg_fetch_assoc($result))
	{
		fputcsv($fp, $row, ";");
	};
	$myfile = $myfile . '.csv';	        
	fclose($fp);	
	copy ( "/tmp/vremen.tmp", "/var/www/sklad/files/$myfile" ) ; 
//	unlink("/tmp/vremen.tmp");
	echo "<a href=files/$myfile class=\"стиль24\"> Завантажте файл $myfile за цим посиланням!</a><br/><br/> ";

}

?>
											  <table border="3" align="center" cellpadding="0" cellspacing="0" bordercolor="#003366" class="style20">
  <tr>
    <td><div align="center"><strong>Центр</strong></div></td>
    <td><div align="center"><strong>Підрозділ</strong></div></td>
    <td><div align="center"><strong>Тип обладн. </strong></div></td>
    <td><div align="center"><strong>Модель</strong></div></td>
    <td><div align="center"><strong>Сер №</strong></div></td>
    <td><div align="center"><strong>Інв № </strong></div></td>
    <td><div align="center"><strong>Наряд № </strong></div></td>
    <td><div align="center"><strong>Стан</strong></div></td>
<?php if($full) { ?>	
    <td><div align="center"><strong>Прийняв</strong></div></td>
    <td><div align="center"><strong>Подав</strong></div></td>
    <td><div align="center"><strong>Дата прийому</strong></div></td>
    <td><div align="center"><strong>Дата змін</strong></div></td>
    <td><div align="center"><strong>Виконавець</strong></div></td>
    <td><div align="center"><strong>Дата видачі</strong></div></td>
    <td><div align="center"><strong>Видав</strong></div></td>
    <td><div align="center"><strong>Отримав</strong></div></td>
    <td><div align="center"><strong>Примітка</strong></div></td>
<?php }; ?>	
  </tr>
<?php 
$nomer = 0;
while ($db=pg_fetch_array($result)):
?>	
  <tr 
<?php 
	if($db['stan'] == "Відремонтовано" || $db['stan'] == "На складі відремонтовано") $color="#99FF99"; else
	if($db['stan'] == "Ремонту не підлягає") $color="#FF9999"; else
	if($db['stan'] == "Видано") $color="#999999"; else
	if(!($db['stan'] == "Отримано на склад")) $color="#FFFF99"; else $color="#FFFFFF";
	echo " bgcolor=\"$color\" title=\"Заявку подав ",$db['podav'],", прийняв: ",$db['prinav'],", В роботу отримав: ",$db['zrobiv'],", примітка: ",$db['prim'],"\"";
?>
  >
    <td><div align="center"><span class="стиль27"><?php echo $db['centr']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['viddil']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['tip']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['model']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['ser']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['inv']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['nomer']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27">
      <?php 
	
if ($st == 1 || $st == 2)  echo $db['stan'];
else
{	
		$sklad_id = $db['sklad_id']; ?>
      
      
      <select name="stan" id="stan" <?php echo "style=\"background-color:$color\""; ?> onChange="top.location.href = 'stan.php?stan='+this.options[this.selectedIndex].value+'&id='+<?php echo $sklad_id; ?>">
        
        <?php
	$i=0;
	while($db2=pg_fetch_array($result2,$i++)):
	$nspi = $db2['stan'];
	if($nspi == $db['stan']) 
	{
	 echo "<option value='$nspi' selected='selected'>$nspi</option>";
	} 
	else 
	{
	 echo "<option value='$nspi'>$nspi</option>";
	};
	endwhile;
	echo "<option style=\"background-color:#99FFFF\" value='naryad'>Друкувати наряд</option>";
	echo "<option style=\"background-color:#FF99FF\" value='redag'>Змінити серійний номер</option>";
	echo "<option style=\"background-color:#FF0000;color:#FFFFFF\" value='udalit'>!!!Видалити запис!!!</option>";
	?>
      </select>
      <?php 
}; ?>							
    </span></div></td>

<?php if($full) { ?>
	<td><div align="center"><span class="стиль27"><?php echo $db['prinav']; ?></span>&nbsp;</div></td>
	<td><div align="center"><span class="стиль27"><?php echo $db['podav']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['data_priyom']; ?></span></div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['data_izmen']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['zrobiv']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['data_vidach']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['vidav']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['otrimav']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['prim']; ?></span>&nbsp;</div></td>
    <?php }; ?>
  </tr>
<?php
endwhile;
?>
</table>
<?php pg_close($connection); ?>
	
											  
											  </p>
											  <!-- InstanceEndEditable -->
											  <p>
<?php if ($login == '1') echo "<META HTTP-EQUIV=\"Refresh\" content =\"0; URL='info.php'\">"; ?>											  
											  </p>
		
						</div>					  </td>
                    </tr>
                    <tr>
                      <td align="center"><table class="refhome" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                          </tr>
                      </table></td>
                    </tr>
                  </table>
									<br>				  </td>
           		  <td width="10" align="left" valign="top">&nbsp;</td>
          		</tr>
        		</table>	 </td>
      	</tr>
   	  </table>
    	<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#3366FF" bgcolor="#3366FF">
      	<tr>
        	<td width="100%">
      	</tr>
   	  </table>
    	<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
      	<tr>
        	<td width="100%" height="2" bgcolor="#3366FF"></td>
        	<td width="100%" height="2" align="center" nowrap bgcolor="#3366FF" class="text"></td>
      	</tr>
      	<tr>
      	  <td>&nbsp;</td>
      	  <td align="center" nowrap class="text"><a href="mailto:olazebnyk@ukrtelecom.ua">olazebnyk@ukrtelecom.ua</a></td>
    	  </tr>
   	  </table>	</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>