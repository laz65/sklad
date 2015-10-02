<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.стиль1 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: 18px;
}
.стиль2 {
	font-size: 12px;
	font-family: "Times New Roman", Times, serif;
	text-align:center;
	line-height: 20px;
	border:#000000;
}
.стиль3 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
</head>

<body>
<?php
$login = $_SERVER['REMOTE_USER'];	
$connection = pg_connect("dbname=sklad user=sklad password=12345");

$data = rtrim(`sudo -i date +%d/%m/%Yp.`);
$vrem = rtrim(`sudo -i date +%y%m%d/`);
$result2=pg_query($connection, "select nomer from sklad where data_priyom  = '$data';");
$nomer0=pg_num_rows($result2)+1;
$nomer = $vrem . $nomer0;

// $nomer = $_POST['nomer'];

 $centr = $_POST['centry'];
 $viddil = $_POST['pidr'];

$result2=pg_query($connection, "select misto from centry where centr = '$centr';");
$db2=pg_fetch_array($result2);
 $misto = $db2['misto'];

 $telefon = $_POST['telefon'];
 $podav = $_POST['podav'];
 
$result2=pg_query($connection, "select rabotnik from rabotniki where login = '$login';");
$db2=pg_fetch_array($result2);
$prinav=$db2['rabotnik'] ;
 $prim = $_POST['prim'];
 $tip = $_POST['tipy'];
 $model = $_POST['model'];
 $inv = $_POST['inv'];
 $ser = $_POST['ser'];
 $kompl = $_POST['kompl']; 

$result2=pg_query($connection, "select nomer from sklad where ser  = '$ser' and inv = '$inv' and stan != 'Видано';");
$db2=pg_fetch_array($result2);
$nomer0=$db2['nomer'] ;
if(pg_num_rows($result2) > 0) echo "<span class=\"стиль3\">На це обладнання вже був виписаний наряд номер $nomer0. Наряд не занесено в базу!</span>"; 
else
if (!pg_query($connection, "insert into sklad (data_priyom, prinav, stan, tip, model, ser, inv, misto, centr, viddil, nomer, prim, telefon, kompl, podav) values ('$data', '$prinav', 'На складі чекає ремонту', '$tip', '$model', '$ser', '$inv', '$misto', '$centr', '$viddil', '$nomer', '$prim', '$telefon', '$kompl', '$podav');")) echo " НЕ ВДАЛОСЬ ЗАПИСАТИ НАРЯД В БАЗУ!!! " 
 
 ?>

<table width="800" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td width="13%" bordercolor="#FFFFFF"><div align="left"><span class="стиль1">Наряд</span></div></td>
    <td width="16%" bordercolor="#FFFFFF"><div align="right">
      <div align="right">Замовлення № : </div>
    </div></td>
    <td colspan="3" bordercolor="#FFFFFF"><div align="left" class="стиль1"><?php echo $nomer ; ?></div></td>
    <td width="39%" bordercolor="#FFFFFF"><div align="left">Дата приймання: <?php echo $data ; ?></div></td>
  </tr>
  <tr>
    <td><div align="right">Зміст заявки: </div></td>
    <td colspan="5"><div align="left"></div></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><strong>Підрозділ</strong></td>
    <td width="12%" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="18%" bordercolor="#FFFFFF"><strong>Пристрій</strong></td>
    <td width="2%" bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><strong>Комплектуючі та витратні матеріали </strong></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Центр :</div></td>
    <td><?php echo $centr ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right">Тип :</div></td>
    <td><?php echo $tip ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Відділ :</div></td>
    <td><?php echo $viddil ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right">Модель :</div></td>
    <td><?php echo $model ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Місто :</div></td>
    <td><?php echo $misto ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right"></div></td>
    <td>&nbsp;</td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Телефон :</div></td>
    <td><?php echo $telefon ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right">Інв. № :</div></td>
    <td> <strong><?php echo $inv ; ?></strong></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Подав заявку </div></td>
    <td><?php echo $podav ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right">Сер. № :</div></td>
    <td><?php echo $ser ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Прийняв заявку :</div></td>
    <td><?php echo $prinav ; ?> </td>
    <td bordercolor="#FFFFFF"><div align="right">Комплексність :</div></td>
    <td><?php echo $kompl ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</br>
<table width="800" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td width="156"><strong>Виконавець (П.І.Б.) </strong></td>
    <td width="57"><strong>Дата початку</strong> </td>
    <td width="474"><strong>Діагноз та виконані роботи </strong></td>
    <td width="50"><strong>Дата закінчення </strong></td>
    <td width="51"><strong>Підпис</strong></td>
  </tr>
  <tr>
    <td height="167">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="800" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td colspan="2" bordercolor="#FFFFFF"><div align="left"><span class="стиль1">Картка видачі </span> </div></td>
    <td bordercolor="#FFFFFF"><div align="right"><span>Замовлення № : </span></div></td>
    <td bordercolor="#FFFFFF"><div align="left" class="стиль1"><?php echo $nomer ; ?></div></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td width="39%" bordercolor="#FFFFFF"><div align="left">Дата приймання: <?php echo $data ; ?></div></td>
  </tr>
  <tr>
    <td width="13%" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="16%" bordercolor="#FFFFFF"><strong>Підрозділ</strong></td>
    <td width="12%" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="18%" bordercolor="#FFFFFF"><strong>Пристрій</strong></td>
    <td width="2%" bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><strong>Комплектуючі та витратні матеріали </strong></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Центр :</div></td>
    <td><?php echo $centr ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right">Тип :</div></td>
    <td><?php echo $tip ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Відділ :</div></td>
    <td><?php echo $viddil ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right">Модель :</div></td>
    <td><?php echo $model ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Місто :</div></td>
    <td><?php echo $misto ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right"></div></td>
    <td>&nbsp;</td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Телефон :</div></td>
    <td><?php echo $telefon ; ?></td>
    <td bordercolor="#FFFFFF"><div align="right">Інв. № :</div></td>
    <td><?php echo $inv ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Примітка : </div></td>
    <td rowspan="2">&nbsp;</td>
    <td bordercolor="#FFFFFF"><div align="right">Сер. № :</div></td>
    <td><?php echo $ser ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><div align="right">Комплексність :</div></td>
    <td><?php echo $kompl ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</br>
<table width="800" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td width="81"><strong>№ накл </strong></td>
    <td width="251"><strong>Дата-час отримання пристрою </strong></td>
    <td width="315"><strong>Отримав (П.І.Б. замовника) </strong></td>
    <td width="143"><strong>Підпис замовника</strong> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p>	Черговий сектору ТЗ та ОК ________________________________________________</p>
</br>
<p>&nbsp;</p>
<table width="800" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td width="14%" bordercolor="#FFFFFF"><div align="left"><span class="стиль1">Розписка</span></div></td>
    <td width="17%" bordercolor="#FFFFFF"><div align="right">
      <div align="right">Замовлення № : </div>
    </div></td>
    <td colspan="2" bordercolor="#FFFFFF"><div align="left" class="стиль1"><?php echo $nomer ; ?></div></td>
    <td width="38%" bordercolor="#FFFFFF"><div align="left">Дата приймання: <?php echo $data ; ?></div></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Центр :</div></td>
    <td><?php echo $centr ; ?></td>
    <td width="13%" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="18%" bordercolor="#FFFFFF"><div align="right">Тип :</div></td>
    <td><?php echo $tip ; ?></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Відділ :</div></td>
    <td><?php echo $viddil ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><div align="right">Модель :</div></td>
    <td><?php echo $model ; ?></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Місто :</div></td>
    <td><?php echo $misto ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><div align="right"></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Телефон :</div></td>
    <td><?php echo $telefon ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><div align="right">Інв. № :</div></td>
    <td><?php echo $inv ; ?></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Подав заявку </div></td>
    <td><?php echo $podav ; ?></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><div align="right">Сер. № :</div></td>
    <td><?php echo $ser ; ?></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="right">Прийняв заявку :</div></td>
    <td><?php echo $prinav ; ?> </td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#FFFFFF"><div align="right">Комплексність :</div></td>
    <td><?php echo $kompl ; ?></td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
