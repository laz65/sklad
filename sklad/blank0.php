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
	font-size: 22px;
}
.стиль2 {
	font-size: 16px;
	font-family: "Times New Roman", Times, serif;
	text-align:center;
	line-height: 22px;
	border:#000000;
}
.стиль3 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<?php
$sklad_id = $_GET['id'];
$login = $_SERVER['REMOTE_USER'];	
$connection = pg_connect("dbname=sklad user=sklad password=12345");
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
<div align="left">
<table width="850" border="1" cellspacing="0" cellpadding="0" class="стиль2" onclick="top.location.href = 'spisok.php'">
  <tr>
    <td width="14%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left"><span class="стиль1">Наряд</span></div></td>
    <td width="16%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">
      <div align="right">Замовлення № : </div>
    </div></td>
    <td colspan="3" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left" class="стиль1"><?php echo $nomer ; ?></div></td>
    <td width="36%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left">Дата приймання: <?php echo $data ; ?></div></td>
  </tr>
  <tr>
    <td nowrap="nowrap"><div align="right">Зміст заявки: </div></td>
    <td colspan="5" nowrap="nowrap"><?php echo $prim ; ?></td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><strong>Підрозділ</strong></td>
    <td width="14%" nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="18%" nowrap="nowrap" bordercolor="#FFFFFF"><strong>Пристрій</strong></td>
    <td width="2%" nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><strong>Комплектуючі та витратні матеріали </strong></td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Центр :</div></td>
    <td nowrap="nowrap"><?php echo $centr ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Тип :</div></td>
    <td nowrap="nowrap"><?php echo $tip ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Відділ :</div></td>
    <td nowrap="nowrap"><?php echo $viddil ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Модель :</div></td>
    <td nowrap="nowrap"><?php echo $model ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Місто :</div></td>
    <td nowrap="nowrap"><?php echo $misto ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right"></div></td>
    <td nowrap="nowrap">&nbsp;</td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Телефон :</div></td>
    <td nowrap="nowrap"><?php echo $telefon ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Інв. № :</div></td>
    <td nowrap="nowrap"> <strong><?php echo $inv ; ?></strong></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Подав заявку </div></td>
    <td nowrap="nowrap"><?php echo $podav ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Сер. № :</div></td>
    <td nowrap="nowrap"><?php echo $ser ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Прийняв заявку :</div></td>
    <td nowrap="nowrap"><?php echo $prinav ; ?> </td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Комплексність :</div></td>
    <td nowrap="nowrap"><?php echo $kompl ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
</table>
</br> 
<table width="850" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td width="184"><strong>Виконавець (П.І.Б.) </strong></td>
    <td width="84"><strong>Дата початку</strong> </td>
    <td width="412"><strong>Діагноз та виконані роботи </strong></td>
    <td width="84"><strong>Дата закінчення </strong></td>
    <td width="74"><strong>Підпис</strong></td>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="850" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td colspan="2" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left"><span class="стиль1">Картка видачі </span> </div></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Замовлення № : </div></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="left" class="стиль1"><?php echo $nomer ; ?></div></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="36%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left">Дата приймання: <?php echo $data ; ?></div></td>
  </tr>
  <tr>
    <td width="13%" nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="17%" nowrap="nowrap" bordercolor="#FFFFFF"><strong>Підрозділ</strong></td>
    <td width="15%" nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="18%" nowrap="nowrap" bordercolor="#FFFFFF"><strong>Пристрій</strong></td>
    <td width="1%" nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><strong>Комплектуючі та витратні матеріали </strong></td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Центр :</div></td>
    <td nowrap="nowrap"><?php echo $centr ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Тип :</div></td>
    <td nowrap="nowrap"><?php echo $tip ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Відділ :</div></td>
    <td nowrap="nowrap"><?php echo $viddil ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Модель :</div></td>
    <td nowrap="nowrap"><?php echo $model ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Місто :</div></td>
    <td nowrap="nowrap"><?php echo $misto ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right"></div></td>
    <td nowrap="nowrap">&nbsp;</td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Телефон :</div></td>
    <td nowrap="nowrap"><?php echo $telefon ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Інв. № :</div></td>
    <td nowrap="nowrap"><?php echo $inv ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Примітка : </div></td>
    <td rowspan="2" nowrap="nowrap">&nbsp;</td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Сер. № :</div></td>
    <td nowrap="nowrap"><?php echo $ser ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Комплексність :</div></td>
    <td nowrap="nowrap"><?php echo $kompl ; ?></td>
    <td nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
</table>
</br>
<table width="850" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td width="77"><strong>№ накл </strong></td>
    <td width="237"><strong>Дата-час отримання пристрою </strong></td>
    <td width="296"><strong>Отримав (П.І.Б. замовника) </strong></td>
    <td width="184"><strong>Підпис замовника</strong> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p>	Черговий сектору ТЗ та ОК ________________________________________________</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="850" border="1" cellspacing="0" cellpadding="0" class="стиль2">
  <tr>
    <td width="16%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left"><span class="стиль1">Розписка</span></div></td>
    <td width="19%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">
      <div align="right">Замовлення № : </div>
    </div></td>
    <td colspan="2" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left" class="стиль1"><?php echo $nomer ; ?></div></td>
    <td width="37%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="left">Дата приймання: <?php echo $data ; ?></div></td>
  </tr>
  <tr>
    <td nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Центр :</div></td>
    <td nowrap="nowrap"><?php echo $centr ; ?></td>
    <td width="12%" nowrap="nowrap" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="16%" nowrap="nowrap" bordercolor="#FFFFFF"><div align="right">Тип :</div></td>
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
</div>
</body>
</html>
