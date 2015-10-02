<?php
$connection = pg_connect("dbname=sklad user=sklad password=12345");
$result=pg_query($connection, "select * from printlist where id = $_POST[printr]");
$db=pg_fetch_array($result);


?>
<br>

 <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td >Інвентарний номер принтеру
    <input type="text" name="invn" id="invn" /></td>
  </tr>
  <tr>
    <td >Номер заявки в "Servicedesk"
    <input type="text" name="dd" id="dd" /></td>
  </tr>
  <?php if ($db[tonerb] > 0) { ?>
  <tr>
    <td bgcolor="#CCCCCC" >
    &nbsp;&nbsp;
    <input type="checkbox" name="tb" id="tb" />
    Toner &quot;B&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[tonerb]"));
echo "($db3[modelcart])";
?>	 
    <input name="ltb" type="hidden" id="ltb" value="<?php echo $db[tonerb]; ?>" /></td>
  </tr> 
<?php }; if ($db[tonerc] > 0) { ?>
  <tr>  
    <td bgcolor="#CCFFFF">
    &nbsp;&nbsp;
    <input type="checkbox" name="tc" id="tc" />
    Toner &quot;C&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[tonerc]"));
echo "($db3[modelcart])";
?>	 
    <input name="ltc" type="hidden" id="ltc" value="<?php echo $db[tonerc]; ?>" /></td>
  </tr>  
  <?php }; if ($db[tonerm] > 0) { ?>
  <tr>  
    <td bgcolor="#FFCCFF">
    &nbsp;&nbsp;
      <input type="checkbox" name="tm" id="tm" />
      Toner &quot;M&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[tonerm]"));
echo "($db3[modelcart])";
?>	 
      <input name="ltm" type="hidden" id="ltm" value="<?php echo $db[tonerm]; ?>" /></td>
  </tr>
  <?php }; if ($db[tonery] > 0) { ?>
  <tr>
    <td bgcolor="#FFFFCC" >
    &nbsp;&nbsp;
      <input type="checkbox" name="ty" id="ty" />
      Toner &quot;Y&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[tonery]"));
echo "($db3[modelcart])";
?>	 
      <input name="lty" type="hidden" id="lty" value="<?php echo $db[tonery]; ?>" /></td>
  </tr>  
  <?php }; if ($db[tonercl] > 0) { ?>
  <tr>  
    <td bgcolor="#CCFF33">
    &nbsp;&nbsp;
      <input type="checkbox" name="tcl" id="tcl" />
      Toner &quot;CL&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[tonercl]"));
echo "($db3[modelcart])";
?>	 
      <input name="ltcl" type="hidden" id="ltcl" value="<?php echo $db[tonercl]; ?>" /></td>
  </tr>  
  <?php }; if ($db[drumb] > 0) { ?>
  <tr>  
    <td bgcolor="#CCCCCC">
    &nbsp;&nbsp;
      <input type="checkbox" name="db" id="db" />
      Drum &quot;B&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[drumb]"));
echo "($db3[modelcart])";
?>	 
      <input name="ldb" type="hidden" id="ldb" value="<?php echo $db[drumb]; ?>" /></td>
  </tr>
  <?php }; if ($db[drumc] > 0) { ?>
  <tr>
    <td bgcolor="#CCFFFF" >
    &nbsp;&nbsp;
      <input type="checkbox" name="dc" id="dc" />
      Drum&quot;C&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[drumc]"));
echo "($db3[modelcart])";
?>	 
      <input name="ldc" type="hidden" id="ldc" value="<?php echo $db[drumc]; ?>" /></td>
  </tr>  
  <?php }; if ($db[drumm] > 0) { ?>
  <tr>  
    <td bgcolor="#FFCCFF">
    &nbsp;&nbsp;
      <input type="checkbox" name="dm" id="dm" />
      Drum&quot;M&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[drumm]"));
echo "($db3[modelcart])";
?>	 
      <input name="ldm" type="hidden" id="ldm" value="<?php echo $db[drumm]; ?>" /></td>
  </tr>  
  <?php }; if ($db[drumy] > 0) { ?>
  <tr>  
    <td bgcolor="#FFFFCC">
    &nbsp;&nbsp;
      <input type="checkbox" name="dy" id="dy" />
      Drum &quot;Y&quot;
<?php
$db3 = pg_fetch_assoc(pg_query($connection, "select * from cartlist where id = $db[drumy]"));
echo "($db3[modelcart])";
?>	 
      <input name="ldy" type="hidden" id="ldy" value="<?php echo $db[drumy]; ?>" /></td>
  </tr>
  <?php }; ?>
  <tr>
    <td ><strong>Виберіть потрібні картриджі та натисніть Застосувати</strong>:<input name="Button" type="submit" value="Застосувати"> 
   </td>
  </tr>
  
 </table>

<?php	
pg_close($connection); 
?>