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
$connection = pg_connect("dbname=sklad user=sklad password=12345");
								
switch($st)
{
	case 0:
		$zapros = "stan != 'Видано' ";
		break;
	case 1:
		$zapros = "stan != '' ";
		break;
	case 2:
		$zapros = "stan = 'Видано' ";
		break;
	case 3:
		$zapros = "stan = 'Ремонту не підлягає' ";
		break;
	case 4:
		$zapros = "stan = 'На складі відремонтовано' or stan = 'Відремонтовано' ";
		break;
	case 5:	
		$zapros = "stan != 'На складі відремонтовано' and stan != 'Відремонтовано' and stan != 'Видано' ";
}
/*
if ($st == 0) $zapros = "stan != 'Видано' " ; else { if ($st == 1) $zapros = "stan != '' "; else $zapros = "stan = 'Видано'";};
*/
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
if ($_POST['csv'] == "11") $lim = ""; else $lim = " limit $limit ";
$result=pg_query($connection, "select sklad_id, centr, viddil, tip, model, ser, inv, nomer, stan, prinav, podav, data_priyom, data_izmen, zrobiv, data_vidach, vidav, otrimav, prim from sklad  where  $zapros order by nomer desc $lim;");
$result2=pg_query($connection, "select * from stan");

if ($_POST['csv'] == "11")
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
if(pg_num_rows($result) > 0)
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
<?php 
};
pg_close($connection); 
?>


