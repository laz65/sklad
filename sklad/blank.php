<html><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->

<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/styles.css" rel="stylesheet" type="text/css">



<link href="css/styles.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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

<div align="center">
  <p>
    <?php

$data = rtrim(`sudo -i date +%d/%m/%Yp.`);
$vrem = rtrim(`sudo -i date +%y%m%d/`);
$result2=pg_query($connection, "select nomer from sklad where data_priyom  = '$data';");
$nomer0=pg_num_rows($result2)+1;
$nomer = $vrem . $nomer0;

// $nomer = $_POST['nomer'];

 $centr = $_POST['centry'];
 $viddil = $_POST['pidr'];
 $model = $_POST['model'];
 $tip = $_POST['tipy'];

$result2=pg_query($connection, "select misto from centry where centr = '$centr';");
$db2=pg_fetch_array($result2);
 $misto = $db2['misto'];

 $telefon = $_POST['telefon'];
 $podav = $_POST['podav'];
 
$result2=pg_query($connection, "select rabotnik from rabotniki where login = '$login';");
$db2=pg_fetch_array($result2);
$prinav=$db2['rabotnik'] ;
 $prim = $_POST['prim'];
 $inv = $_POST['inv'];
 $ser = $_POST['ser'];
 $kompl = $_POST['kompl']; 

$result2=pg_query($connection, "select nomer from sklad where ser  = '$ser' and inv = '$inv' and stan != 'Видано';");
$db2=pg_fetch_array($result2);
$nomer0=$db2['nomer'] ;
if(pg_num_rows($result2) > 0) echo "<span class=\"стиль3\">На це обладнання вже був виписаний наряд номер $nomer0. Наряд не занесено в базу!</span>"; 
else
if (!pg_query($connection, "insert into sklad (data_priyom, prinav, stan, tip, model, ser, inv, misto, centr, viddil, nomer, prim, telefon, kompl, podav) values ('$data', '$prinav', 'Отримано на склад', '$tip', '$model', '$ser', '$inv', '$misto', '$centr', '$viddil', '$nomer', '$prim', '$telefon', '$kompl', '$podav');")) echo " НЕ ВДАЛОСЬ ЗАПИСАТИ НАРЯД В БАЗУ!!! " ;

$result = pg_query($connection, "select * from sklad where nomer = '$nomer';");
if(pg_num_rows($result) > 0)
	{
	$db=pg_fetch_array($result);
	$sklad_id = $db['sklad_id'] ;
	?>
  </p>
  <table width="680" border="1" cellspacing="0" cellpadding="0" class="стиль2">
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
  <p><a <?php echo "href='blank2.php?id=$sklad_id'"; /* перечисляются переменные для передачи в форму печати */ ?> >
    Надрукувати наряд № <?php echo $nomer; ?>
  </a></p>

  <?php
  }
  else
  {
  ?>
  
  <span class="стиль3">Наряд в базу не добавлено!</span>
  <?php
  }


?>
  
  <p>&nbsp;</p>

<p>&nbsp;</p>
</div>
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