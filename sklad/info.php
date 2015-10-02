<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Обладнання в ремонті в ЦІТ</title>
<style type="text/css">
<!--
.стиль1 {
	color: #000066;
	font-weight: bold;
}
-->
</style>
</head>

<body>

<div align="left">
  <p align="center"><?php
$connection = pg_connect("dbname=sklad user=sklad password=12345");
if ($_GET['centr'] != "")
	{
		$centr = $_GET['centr'];
		$result=pg_query($connection, "select * from sklad  where  stan != 'Видано' and centr = '$centr' order by viddil;");
	}
else $result=pg_query($connection, "select * from sklad  where  stan != 'Видано' order by centr;");
	
?>
    <span class="стиль1">Обладнання, яке знаходиться на обслуговуванні або ремонті в ЦІТ.</span>
    <select name="centr" id="centr" onChange="top.location.href = 'index.php?centr='+this.options[this.selectedIndex].value;">
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
  </p>
</div>
<table width="100%" border="3" align="center" cellpadding="0" cellspacing="0" bordercolor="#66CCCC" class="style20">
  <tr>
    <td  bordercolor="#66CCCC" bgcolor="#66CCCC"><div align="center">Центр</div></td>
    <td  bordercolor="#66CCCC" bgcolor="#66CCCC"><div align="center">Підрозділ</div></td>
    <td  bordercolor="#66CCCC" bgcolor="#66CCCC"><div align="center">Тип обладн. </div></td>
    <td  bordercolor="#66CCCC" bgcolor="#66CCCC"><div align="center">Модель</div></td>
    <td  bordercolor="#66CCCC" bgcolor="#66CCCC"><div align="center">Сер №</div></td>
    <td  bordercolor="#66CCCC" bgcolor="#66CCCC"><div align="center">Інв № </div></td>
    <td  bordercolor="#66CCCC" bgcolor="#66CCCC"><div align="center">Наряд № </div></td>
    <td  bordercolor="#66CCCC" bgcolor="#66CCCC"><div align="center">Стан</div></td>
  </tr>
<?php 
while ($db=pg_fetch_array($result)):
?>	
  <tr
<?php 
	if($db['stan'] == "Відремонтовано" || $db['stan'] == "На складі відремонтовано") echo " bgcolor=\"#99FF99\""; 
	if($db['stan'] == "Ремонту не підлягає") echo " bgcolor=\"#FF9999\""; 
	echo " title=\" В роботу отримав ",$db['zrobiv'],", примітка: ",$db['prim'],"\"";
?>  
   >
    <td bordercolor="#66CCCC"><?php echo $db['centr']; ?></td>
    <td bordercolor="#66CCCC"><?php echo $db['viddil']; ?>&nbsp;</td>
    <td bordercolor="#66CCCC"><?php echo $db['tip']; ?>&nbsp;</td>
    <td bordercolor="#66CCCC"><?php echo $db['model']; ?>&nbsp;</td>
    <td bordercolor="#66CCCC"><?php echo $db['ser']; ?>&nbsp;</td>
    <td bordercolor="#66CCCC"><?php echo $db['inv']; ?>&nbsp;</td>
    <td bordercolor="#66CCCC"><?php echo $db['nomer']; ?></td>
    <td bordercolor="#66CCCC"><?php echo $db['stan']; ?></td>
  </tr>
<?php
endwhile;
pg_close($connection); 
?>
</table>
</body>
</html>
