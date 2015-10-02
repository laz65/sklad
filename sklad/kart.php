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
 <h1>
   <script src="calendar_ru.js"></script>
   <script src="jquery.min.js"></script>
   <script language="JavaScript">
function chprinter() {
 $.ajax({
   type: "POST",
   url: "ch_cart.php",
   data: "printr="+document.getElementById('printr').value+"&data="+document.getElementById('data').value,
   success: function(result){
	 document.getElementById("ans").innerHTML =  result;
     if (result == 0) alert( "Обладнання за даними критеріями не існує!!!" );
   }
 });
}
 </script>
   
   
  <?php
 if($dostup == 1 ) 
 	 { 
 ?>
   
  <strong><a href="kart1.php">Складання звіту</a></strong><br>
  <?php }


  $data = explode('-',$_POST[data]);
  $date = $data[2].$data[1].$data[0];
  if(isset($_GET[del]))
  {
	  if (pg_query($connection, "delete from changelist where id = $_GET[del];")) echo "<strong>Інформацію про заміну картриджу видалено</strong> <br><META HTTP-EQUIV=\"Refresh\" content =\"2; URL='kart.php'\">";
	  else echo "<strong style=\"color:#F00\">Не вдалося видалити</strong> <br>";		
  }
  
if((strlen($_POST[invn]) == 9 || strlen($_POST[invn]) == 18) && $_POST[dd] != '' )
{  
  if(isset($_POST['tb'])) // если выбран черный картридж
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[ltb], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  toner B добавлено</strong> <br>";
	  else echo "<strong style=\"color:#F00\">Картридж  toner B  не вдалося добавити</strong> <br>";	
  }
  
  if(isset($_POST['tc'])) // если выбран  картридж
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[ltc], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  toner C добавлено </strong><br>";
	  else echo "<strong style=\"color:#F00\">Картридж  toner C  не вдалося добавити</strong> <br>";	
  }
  
  if(isset($_POST['tm'])) // если выбран картридж
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[ltm], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  toner M добавлено</strong> <br>";
	  else echo "<strong style=\"color:#F00\">Картридж  toner M  не вдалося добавити</strong> <br>";	
  }
  
  if(isset($_POST['ty'])) // если выбран  картридж
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[lty], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  toner Y добавлено</strong> <br>";
	  else echo "<strong style=\"color:#F00\">Картридж  toner Y  не вдалося добавити</strong> <br>";	
  }
  
  if(isset($_POST['tcl'])) // если выбран
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[ltcl], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  toner CL добавлено</strong> <br>";
	  else echo "<strong style=\"color:#F00\">Картридж  toner CL  не вдалося добавити</strong> <br>";	
  }
  
  if(isset($_POST['db'])) // если выбран 
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[ldb], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  Drum B добавлено </strong><br>";
	  else echo "<strong style=\"color:#F00\">Картридж  Drum B  не вдалося добавити</strong> <br>";	
  }
  
  if(isset($_POST['dc'])) // если выбран 
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[ldc], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  Drum C добавлено</strong> <br>";
	  else echo "<strong style=\"color:#F00\">Картридж  Drum C  не вдалося добавити</strong> <br>";	
  }
  
  if(isset($_POST['dm'])) // если выбран
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[ldm], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  Drum M добавлено</strong> <br>";
	  else echo "<strong style=\"color:#F00\">Картридж  Drum M  не вдалося добавити</strong> <br>";	
  }
  
  if(isset($_POST['dy'])) // если выбран 
  {
	  if (pg_query($connection, "insert into changelist (yy, dd, invnumber, modelprint, cart, workerid, pidrozdilid) values ($date, $_POST[dd], '$_POST[invn]', $_POST[printr], $_POST[ldy], $db2[rabotniki_id], $_POST[centry]);")) echo "<strong>Картридж  Drum Y добавлено</strong> <br>";
	  else echo "<strong style=\"color:#F00\">Картридж  Drum Y  не вдалося добавити</strong> <br>";	
  }

if (isset($_POST[data])) echo "<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='kart.php'\">";
}

	$centr = $_POST[centry];
	$print_id = $_POST[printr];

$n = 0;
?>
   
 </h1>
 <form id="form1" name="form1" method="post" action="">
   
   Дата обслуговування 
  <input name="data" type="text" id="data" onFocus="this.select();lcs(this)"
	onClick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo date("d-m-Y"); ?>" size="12">
<br>
Підрозділ 
<select name="centry" id="centry">
                                                            <?php

$result2=pg_query($connection, "select * from centry");
echo "<option value=''>Виберіть центр для редагування</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['centr'] ;
 $spi=$db2['centry_id'] ;
if($spi == $centr) 
{
 echo "<option value='$spi' selected='selected'>$nspi ($db2[misto])</option>";
} 
else 
{
 echo "<option value='$spi'>$nspi ($db2[misto])</option>";
};
endwhile;
?>
<br>                                                              </select>
Тип обслуговуемого принтера:<strong>
<select name="printr" id="printr" onChange="chprinter()">
  <?php

$result2=pg_query($connection, "select * from printlist order by modelprinter");
echo "<option value=''>Виберіть принтер для редагування</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['id'];
 $spi=$db2['modelprinter'];
if($nspi == $print_id) 
{
 echo "<option value='$nspi' selected='selected'>$spi</option>";
} 
else 
{
 echo "<option value='$nspi'>$spi</option>";
};
endwhile;
?>
</select>
</strong>
<div id="ans"></div>	



</form>										  
<?php
if (isset($_POST[printr]) && (((strlen($_POST[invn]) != 9) && (strlen($_POST[invn]) != 18)) || $_POST[dd]=='') ) 
{	
?>
<script type="text/javascript">
chprinter();
</script> 
<strong style="color:#F00">НЕВІРНА ДОВЖИНА ІНВЕНТАРНОГО НОМЕРУ АБО НЕ ВВЕДЕНО НОМЕР ЗАЯВКИ!!! </strong>
<?php
}
?>
<table border="2" width="100%">
<tr align="center">
<td >
№ з/п
</td>
<td >
Дата
</td>
<td>
Інв. номер
</td>
<td>
№ Заявки
</td>
<td>
Принтер
</td>
<td>
Картридж
</td>
<td>
Робітник
</td>
<td>
Підрозділ
</td>
</tr>
<?php

//echo "select * from changelist order by $id desc limit 100;";
$result=pg_query($connection, "select * from changelist order by id desc limit 100;");
while ($db=pg_fetch_array($result)):
?>
<tr>
<td align="center">

<?php if($dostup == 1 && $db[nodelete] == 0) { ?>
  <input type="submit" name="button" id="button" value="Видалити" onClick="if(confirm('Ви дійсно бажаєте видалити запис?')) top.location.href = '?del=<?php echo $db[id]; ?>' ">
  <?php }; echo ++$n; ?>
</td>
<td><?php echo $db[yy][6].$db[yy][7]."-".$db[yy][4].$db[yy][5]."-".$db[yy][0].$db[yy][1].$db[yy][2].$db[yy][3]; ?></td>
<td>
<?php echo $db[invnumber]; ?>
</td>
<td>
<?php echo $db[dd]; ?>
</td>
<td >
<?php 
$result3=pg_query($connection, "select * from printlist where id = $db[modelprint]");
$db3=pg_fetch_array($result3);
echo $db3[modelprinter]; 
?>
</td>
<td>
<?php 
$result3=pg_query($connection, "select * from cartlist where id = $db[cart]");
$db3=pg_fetch_array($result3);
echo $db3[modelcart]; 
?>
</td>
<td>
<?php 
$result3=pg_query($connection, "select * from rabotniki where rabotniki_id = $db[workerid]");
$db3=pg_fetch_array($result3);
echo $db3[rabotnik]; 
?>
</td>
<td>
<?php 
$result3=pg_query($connection, "select * from centry where centry_id = $db[pidrozdilid]");
$db3=pg_fetch_array($result3);
echo "$db3[centr], $db3[misto]"; 
?>
</td>
</tr>
<?php
endwhile;
?>

</table>											  
											  
											  
											  
											  
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