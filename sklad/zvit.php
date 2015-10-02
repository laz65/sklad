<?php

$connection = pg_connect("dbname=sklad user=sklad password=12345");

$data = explode('-',$_POST[dn]);
$date_n = $data[2].$data[1].$data[0];
$data = explode('-',$_POST[dk]);
$date_k = $data[2].$data[1].$data[0];
?>
<table border="2" width="100%">
<tr align="center">
<td >
№ з/п
</td>
<td >
Дата
</td>
<td>№ Заявки</td>
<td>
Інв. номер
</td>
<td>
Принтер
</td>
<td>
Код ресурсу
</td>
<td>
Картридж
</td>
<td>
Номенкл.№ картриджу
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
$result=pg_query($connection, "select * from changelist where yy >= $date_n and yy <= $date_k;");
while ($db=pg_fetch_array($result)):
?>
<tr>
<td align="center">

<?php echo ++$n; ?>
</td>
<td><?php echo $db[yy][6].$db[yy][7]."-".$db[yy][4].$db[yy][5]."-".$db[yy][0].$db[yy][1].$db[yy][2].$db[yy][3]; ?></td>
<td><?php echo $db[dd]; ?></td>
<td>
<?php echo $db[invnumber]; ?>
</td>
<td >
<?php 
$result3=pg_query($connection, "select * from printlist where id = $db[modelprint]");
$db3=pg_fetch_array($result3);
echo $db3[modelprinter]; 
?>
</td>
<td >
<?php  
echo $db3[coderesurs]; 
?>
</td>
<td>
<?php 
$result3=pg_query($connection, "select * from cartlist where id = $db[cart]");
$db3=pg_fetch_array($result3);
echo $db3[modelcart]; 
?>
</td>
<td >
<?php 
echo $db3[nomenklnumber]; 
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

<?php
if ($_POST[nodel] == 1)echo "<br>Прапорець видалення встановлено<br>";

?>


<?php	
pg_close($connection); 
?>