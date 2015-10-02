<?php
$str = $_POST[str];
$connection = pg_connect("dbname=sklad user=sklad password=12345");
$result=pg_query($connection, "select * from sklad  where  inv like '%$str%';");
if (pg_num_rows($result) > 0) 
{
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
    <td><div align="center"><strong>Прийняв</strong></div></td>
    <td><div align="center"><strong>Подав</strong></div></td>
    <td><div align="center"><strong>Дата прийому</strong></div></td>
    <td><div align="center"><strong>Дата змін</strong></div></td>
    <td><div align="center"><strong>Виконавець</strong></div></td>
    <td><div align="center"><strong>Дата видачі</strong></div></td>
    <td><div align="center"><strong>Видав</strong></div></td>
    <td><div align="center"><strong>Отримав</strong></div></td>
    <td><div align="center"><strong>Примітка</strong></div></td>
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
    <td><div align="center"><span class="стиль27"><?php echo $db['stan']; ?></span>&nbsp;</div></td>
	<td><div align="center"><span class="стиль27"><?php echo $db['prinav']; ?></span>&nbsp;</div></td>
	<td><div align="center"><span class="стиль27"><?php echo $db['podav']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['data_priyom']; ?></span></div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['data_izmen']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['zrobiv']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['data_vidach']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['vidav']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['otrimav']; ?></span>&nbsp;</div></td>
    <td><div align="center"><span class="стиль27"><?php echo $db['prim']; ?></span>&nbsp;</div></td>
  </tr>
<?php
endwhile;
?>
</table>

<?php 
}
pg_close($connection); 
?>
	
								


