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
	font-size: large;
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
											  <p align="center" class="стиль24">Адміністрування принтерів</p>
<?php
if($log = $_GET['rabotnik'])
{
	$result=pg_query($connection, "select rabotnik, login, dostup from rabotniki where login = '$log';");
	$db=pg_fetch_array($result);
	$rabotnik=$db['rabotnik'] ;
	$log=$db['login'] ;
	$dostup=$db['dostup'] ;
		
}
else
{
	$rabotnik="" ;
	$log="" ;
	$dostup=0 ;
	
};

if($centr = $_GET['centr'])
{
	$result=pg_query($connection, "select centr, misto from centry where centr = '$centr';");
	$db=pg_fetch_array($result);
	$misto = $db['misto'] ;
	
}



// обработка при изменении работников
if(isset($_POST['login'])) 
{
	$result=pg_query($connection, "select rabotnik, login, dostup from rabotniki where login = '$log';");
	if(pg_num_rows($result) > 0)
	{		
		
		if($passw = $_POST['passw'])
		{
			echo `sudo -i htpasswd -D /var/www/sklad/.htpasswd $log`;
			echo `sudo -i htpasswd -b /var/www/sklad/.htpasswd $log $passw`;
		}
		if(isset($_POST['del']))
		{
			echo `sudo -i htpasswd -D /var/www/sklad/.htpasswd $log`;
			if (pg_query($connection, "delete from rabotniki where login = '$log';")) echo "Работник $rabotnik удален!";
		}
		else
		{
			if(isset($_POST['dostup'])) $dostup = 1; else $dostup = 0;
			if (pg_query($connection, "update rabotniki set dostup = $dostup where login = '$log';")) echo "Изменения выполнены";
		}	
	}
	else
	{
		
		if($passw = $_POST['passw'])
		{	
			$rabotnik = $_POST['rab'];
			$log = $_POST['login'];
			if(isset($_POST['dostup'])) $dostup = 1; else $dostup = 0;
			echo `sudo -i htpasswd -b /var/www/sklad/.htpasswd $log $passw`;
			if (pg_query($connection, "insert into rabotniki (rabotnik, login, dostup) values ('$rabotnik', '$log', $dostup);")) echo "Пользователь $rabotnik добавлен";
		}
		else echo " Необходимо ввести пароль!";	
		
	}
}

// обработка при изменении центров
if(isset($_POST['centr'])) 
{
	$centr = $_POST['centr'];
	$result=pg_query($connection, "select centr, misto from centry where centr = '$centr';");
	if(pg_num_rows($result) > 0)
	{
	
		if(isset($_POST['del1']))
		{
			if (pg_query($connection, "delete from centry where centr = '$centr';")) echo "Центр $centr видалено!"; 
		}
	 
	}
	else
	{
		$centr = $_POST['centr'];
		$misto = $_POST['misto'];
		if($centr != '') if (pg_query($connection, "insert into centry (centr, misto) values ('$centr', '$misto');")) echo "Центр $centr в місті $misto добавлений";
	}		
	
}


// обработка типов

if($tip = $_POST['tip']) 
{

	$result=pg_query($connection, "select tip from tipy where tip = '$tip';");
	if(pg_num_rows($result) > 0)
	{
	
		if(isset($_POST['del2']))
		{
			if (pg_query($connection, "delete from tipy where tip = '$tip';")) echo "Обладнання $tip видалене!"; 
		}
	 
	}
	else
	{
		if($tip != '') if (pg_query($connection, "insert into tipy (tip) values ('$tip');")) echo "Обладнання $tip добавлене";
	}		
	
}

// обработка состояний

if($stan = $_POST['stan']) 
{
	$result=pg_query($connection, "select stan from stan where stan = '$stan';");
	if(pg_num_rows($result) > 0)
	{
	
		if(isset($_POST['del3']))
		{
			if (pg_query($connection, "delete from stan where stan = '$stan';")) echo "Стан $stan видалено!"; 
		}
	 
	}
	else
	{
		if($stan != '') if (pg_query($connection, "insert into stan (stan) values ('$stan');")) echo "Стан $stan добавлено";
	}		
	
}





?>

											  <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td></td>
                                                </tr>
                                                <tr>
                                                  <td></td>
                                                </tr>
                                                <tr>
                                                  <td><?php 
$tip = $_GET['tip'];
$stan = $_GET['stan'];
?>
                                                    <form name="form1" method="post" action="">
                                                      <p>&nbsp;</p>
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td colspan="2" bgcolor="#66CCCC"><div align="center"><strong>Принтери
                                                                <select name="printers" id="printers" onChange="top.location.href = 'adm.php?tip='+this.options[this.selectedIndex].value;">
                                            <?php

$result2=pg_query($connection, "select * from tipy ");
echo "<option value=''>Виберіть обладнання для редагування</option>";
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
                                                          </strong></div></td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan="2">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan="2">Обладнання
                                                          <input name="tip" type="text" id="tip" <?php echo "value=\"$tip\"" ?>></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Видалити
                                                          <input name="del2" type="checkbox" id="del2" value="1"></td>
                                                          <td><input type="submit" name="Submit3" value="Подтвердить"></td>
                                                        </tr>
                                                      </table>
                                                    </form></td>
                                                </tr>
                                                <tr>
                                                  <td><form name="form1" method="post" action="">
                                                    <p>&nbsp;</p>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td colspan="2" bgcolor="#66CCCC"><div align="center"><strong>Стан картриджу
                                                              <select name="stany" id="stany" onChange="top.location.href = 'adm.php?stan='+this.options[this.selectedIndex].value;">
                                                            <?php

$result2=pg_query($connection, "select * from stan");
echo "<option value=''>Виберіть стан для редагування</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['stan'];
if($nspi == $stan) 
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
                                                        </strong></div></td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2">Стан
                                                        <input name="stan" type="text" id="stan" <?php echo "value=\"$stan\"" ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Видалити
                                                        <input name="del3" type="checkbox" id="del3" value="1"></td>
                                                        <td><input type="submit" name="Submit4" value="Подтвердить"></td>
                                                      </tr>
                                                    </table>
                                                    </form></td>
                                                </tr>
                                              </table>
											  <p align="center">&nbsp;</p>
<?php pg_close($connection); ?>
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