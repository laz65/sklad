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
                                              
<script type="text/javascript">
<!--

function validate_form ( )
{
	valid = true;

        if ( document.form1.model.value == "" )
        {
                alert ( "Заповніть поле 'Модель'." );
                valid = false;
        }
        if ( document.form1.tipy.value == "" )
        {
                alert ( "Виберіть тип обладнання." );
                valid = false;
        }
		

        return valid;
}

//-->
</script>
		<form name="form1" method="post" action="blank.php" onSubmit="return validate_form();">
											    <p>
<?php 
							

$result2=pg_query($connection, "select rabotnik from rabotniki where login = '$login';");
$db2=pg_fetch_array($result2);
$nspi=$db2['rabotnik'] ;
echo "Ви війшли як $nspi ";											

?>
										        </p>
											    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td colspan="2" bgcolor="#66CCCC"><div align="center"><strong>Заповніть необходні поля та натисніть &quot;Створити наряд&quot;</strong></div></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="54%">&nbsp;</td>
                                                    <td width="46%">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td><div align="center">Цех(центр)
                                                        <select name="centry" id="centry">
                                                          <?php

$result2=pg_query($connection, "select * from centry");
echo "<option value=''>Виберіть центр</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['centr'] ;
 $spi=$db2['misto'];
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
          

                                        </div></td>
                                                    <td><div align="center">Підрозділ
                                                      <input name="pidr" type="text" id="pidr">
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td><div align="center">Подав заявку
                                                      <input name="podav" type="text" id="podav">
                                                    </div></td>
                                                    <td><div align="center">Телефон
                                                      <input name="telefon" type="text" id="telefon">
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td><div align="center">Тип обладнання
                                                        <select name="tipy" id="tipy">
                                                          <?php

$result2=pg_query($connection, "select * from tipy ");
echo "<option value=''>Виберіть обладнання</option>";
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
                                                    </div></td>
                                                    <td><div align="center">Модель
                                                      <input name="model" type="text" id="model">
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td><div align="center">Сер.№
                                                      <input name="ser" type="text" id="ser">
                                                    </div></td>
                                                    <td><div align="center">Інв.№
                                                      <input name="inv" type="text" id="inv">
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2"><div align="center">Комплектність
                                                      <input name="kompl" type="text" id="kompl" size="32">
                                                    </div></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td bgcolor="#FFFFFF">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td><div align="center">Зміст заявки: 
                                                        <textarea name="prim" cols="32" rows="5" id="prim"></textarea>
                                                    </div></td>
                                                    <td bgcolor="#66CCCC"><div align="center">
                                                      <input type="submit" name="Submit" value="Створити наряд">
                                                    </div></td>
                                                  </tr>
                                                </table>
										      </form>
											  <?php pg_close($connection); ?>
											  <p>&nbsp;</p>
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