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
.стиль24 {
	color: #FF0000;
	font-weight: bold;
}
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
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="jquery.printPage.js" type="text/javascript"></script>
    
    <script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  </script>

											  <p>
<?php
$sklad_id = $_GET['id'];
$stan = $_GET['stan'];
$zrobiv = $_POST['zrobiv'];
$otrimav = $_POST['otrimav'];
$serial =  $_POST['serial'];
?>
											  </p>
											  <form name="form1" method="post" action="">
											    <p>
<?php

if($stan == 'naryad')
{

$result2=pg_query($connection, "select * from sklad where sklad_id  = $sklad_id;");
$db2=pg_fetch_array($result2);
$misto = $db2['misto'];
$centr = $db2['centr'];
$viddil = $db2['viddil'];
$telefon = $db2['telefon'];
$podav = $db2['podav'];
$prinav=$db2['prinav'] ;
$prim = $db2['prim'];
$tip = $db2['tip'];
$model = $db2['model'];
$inv = $db2['inv'];
$ser = $db2['ser'];
$kompl = $db2['kompl']; 
$nomer = $db2['nomer']; 
$data = $db2['data_priyom'];

?>

                                                <table width="680" align="center" border="1" cellspacing="0" cellpadding="0" class="стиль2">
                                                  <tr>
                                                    <td colspan="5" nowrap="nowrap" bordercolor="#FFFFFF"><div align="center"><?php echo $prim ; ?></div></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="17%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left" class="стиль1">
                                                        <div align="right">
                                                          <div align="right">Замовлення № : </div>
                                                        </div>
                                                    </div></td>
                                                    <td width="18%" nowrap="nowrap" bordercolor="#FFFFFF"><span class="стиль1"><?php echo $nomer ; ?></span></td>
                                                    <td colspan="2" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left" class="стиль1">
                                                        <div align="right">Дата приймання:</div>
                                                    </div></td>
                                                    <td width="36%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left"><?php echo $data ; ?></div></td>
                                                  </tr>
                                                  <tr>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Центр :</div></td>
                                                    <td nowrap="nowrap"><?php echo $centr ; ?></td>
                                                    <td width="12%" nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
                                                    <td width="17%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Тип :</div></td>
                                                    <td nowrap="nowrap"><?php echo $tip ; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Відділ :</div></td>
                                                    <td nowrap="nowrap"><?php echo $viddil ; ?></td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Модель :</div></td>
                                                    <td nowrap="nowrap"><?php echo $model ; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Місто :</div></td>
                                                    <td nowrap="nowrap"><?php echo $misto ; ?></td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right"></div></td>
                                                    <td nowrap="nowrap">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Телефон :</div></td>
                                                    <td nowrap="nowrap"><?php echo $telefon ; ?></td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Інв. № :</div></td>
                                                    <td nowrap="nowrap"><?php echo $inv ; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Подав заявку </div></td>
                                                    <td nowrap="nowrap"><?php echo $podav ; ?></td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Сер. № :</div></td>
                                                    <td nowrap="nowrap"><?php echo $ser ; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Прийняв заявку :</div></td>
                                                    <td nowrap="nowrap"><?php echo $prinav ; ?> </td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
                                                    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Комплексність :</div></td>
                                                    <td nowrap="nowrap"><?php echo $kompl ; ?></td>
                                                  </tr>
                                                </table>
                                                <p align="center"><a <?php echo "href='blank2.php?id=$sklad_id'"; /* перечисляются переменные для передачи в форму печати */ ?> >
		  НАДРУКУВАТИ НАРЯД.
		</a></p>
<?php
} 
//echo "<META HTTP-EQUIV=\"Refresh\" content =\"0; URL='blank0.php?id=$sklad_id'\">"; 
else
{
if($stan == 'udalit')
  {	
	if(isset($_POST['del'])) 
	{
		if(!pg_query($connection, "delete from sklad where sklad_id = '$sklad_id';")) echo "Запис видалити не вдалося"; 
		else 
		{
			echo "<strong class=\"Стиль24\">Запис видалено!!!</strong>";
			echo "<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='spisok.php'\">";
		}
	}
	else
	{
		$result=pg_query($connection, "select * from sklad where sklad_id = '$sklad_id';");
		$db=pg_fetch_array($result);
		if (isset($_POST['flag'])) 
		{
			echo "<span class=\"стиль24\">ВИДАЛИТИ НЕ ВДАЛОСЯ!!!</span>","<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='spisok.php'\">"; 
		}
		else echo "<span class=\"стиль24\">!!!Ви збираєтесь видалити запис про обладнання " . $db['tip'] . ", " . $db['model'] . ", інвентарний та серійний номер - " . $db['inv'] . ", " . $db['ser'] . ", на яке виписано наряд № " . $db['nomer'] . ", привезено з м. " . $db['misto'] . ", " . $db['centr'] . ". </br>Якщо ви впевнені, що цей запис необхідно  ВИДАЛИТИ поставте галочку та натисніть \"Виконати\"</span>";   
		echo "<p>Видалити <input name=\"del\" type=\"checkbox\" id=\"del\" value=\"1\"></p>";
		echo "<input name=\"flag\" type=\"hidden\" id=\"flag\" value=\"111\">";
	}
  }
else
  {
	if (isset($zrobiv))
	{
		$data = rtrim(`sudo -i date +%d/%m/%Yp.`);
		$prim = $_POST['prim'];
		if ($stan == "Видано")
		{
			if(isset($_POST['vidal'])) 
			{
				if($otrimav == '') echo "<span class=\"стиль24\">Обов'язково вкажіть хто забрав обладнання!!!</span>","<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='stan.php?stan=Видано&id=$sklad_id\">"; else
				{
				$result2=pg_query($connection, "select rabotnik from rabotniki where login = '$login';");
				$db2=pg_fetch_array($result2);
				$vidav=$db2['rabotnik'] ;
				if (!pg_query($connection, "update sklad set prim = '$prim', zrobiv = '$zrobiv', stan = '$stan', vidav = '$vidav', otrimav = '$otrimav', data_vidach = '$data' where sklad_id = '$sklad_id';")) echo "Не вдалося змінити стан!!!";
				} 
			} else echo "<span class=\"стиль24\">Не вдалося змінити стан!!!</span>"; 
		}
		else
		{
		  if(isset($serial))
		  {
			 if (!pg_query($connection, "update sklad set prim = '$prim', zrobiv = '$zrobiv', ser = '$serial', data_izmen = '$data' where sklad_id = '$sklad_id';")) echo "<span class=\"стиль24\">Не вдалося змінити стан!!!</span>";
		  }
		  else
		  {
			if (!pg_query($connection, "update sklad set prim = '$prim', zrobiv = '$zrobiv', stan = '$stan', data_izmen = '$data' where sklad_id = '$sklad_id';")) echo "<span class=\"стиль24\">Не вдалося змінити стан!!!</span>";
		  }
		}
		echo "<strong class=\"Стиль24\">Стан змінено на $stan</strong><META HTTP-EQUIV=\"Refresh\" content =\"2; URL='spisok.php'\">"; 
	}
	else
	{
		$result=pg_query($connection, "select * from sklad where sklad_id = '$sklad_id';");
		$db=pg_fetch_array($result);
		echo "Ви вибрали зміну стану для обладнання " . $db['tip'] . ", " . $db['model'] . ", інвентарний та серійний номер - " . $db['inv'] . ", " . $db['ser'] . ", на яке виписано наряд № " . $db['nomer'] . ", привезено з м. " . $db['misto'] . ", " . $db['centr'] . ". </br>Для зміни стану на $stan, необхідно уточнення деяких даних. </br>Після заповнення необхідних даних натисніть \"Виконати\"";   
	};
?>
	</p>
<?php
	if(!isset($_POST['Submit'])) // если не выбрано действие 
 	{
?>
	<p>
	В ремонт отримав
	  <select name="zrobiv" id="zrobiv">
														<?php
	$result3=pg_query($connection, "select * from rabotniki where login = '$login'");
	$db3=pg_fetch_array($result3);
	$result2=pg_query($connection, "select * from rabotniki order by rabotniki_id");
	echo "<option value='0'>Виберіть робітника, який ремонтує обладнання</option>";
	//echo "<option value='pusto'>Створення нового робітника</option>";
	while($db2=pg_fetch_array($result2)):
	// $spi=$db2['login'];
	 $nspi=$db2['rabotnik'] ;
	 if($db['zrobiv'] != '')
	 {
		if($nspi == $db['zrobiv']) 
		{
		 echo "<option value='$nspi' selected='selected'>$nspi</option>";
		} 
		else 
		{
		 echo "<option value='$nspi'>$nspi</option>";
		};
	 }
	 else
	 {
	 
		if($nspi == $db3['rabotnik']) 
		{
		 echo "<option value='$nspi' selected='selected'>$nspi</option>";
		} 
		else 
		{
		 echo "<option value='$nspi'>$nspi</option>";
		};
	 
	 }
	endwhile;
	?>
							  </select>
	</p>
													<p>Примітка:
													</br>
													  <textarea name="prim" cols="50" rows="5" id="prim"><?php echo $db['prim']; ?></textarea>
<?php 
 	};
  }; 
	if(!isset($_POST['Submit'])) // если не выбрано действие 
 	{


?>
											    </p>
                                                
                                                <p>
  <?php if ($stan == "redag") {?>
  </p>
                                                <p>Введіть серійний номер:
                                                  <label for="serial"></label>
                                                  <input name="serial" type="text" id="serial" value="<?php echo $db['ser']; ?>">
                                                </p>
                                                <p>
                                                  <?php }?>
                                                  <?php if ($stan == "Видано") {?>												
                                                </p>
                                                <p>Хто забрав обладнання: 
											      <input name="otrimav" type="text" id="otrimav">
										        </p>
											    <p>
											      <input name="vidal" type="checkbox" id="vidal" value="1">
											    Поставте галочку, якщо знаєте що робите. </br> 
											    <span class="стиль24">(Після видачі неможливо буде змінити стан)</span>. </p>
											    <?php }; ?>
											    <p>
											      <input type="submit" name="Submit" value="Виконати">
											    </p>
 <?php 
	};
 ?>
											  </form>
<?php 
};
pg_close($connection); 
?>
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