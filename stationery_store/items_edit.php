<html>
<head>
<title>Edit Item</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>

<h3>Edit Item</h3>

<?php
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'pusha')
{
?>
<table class=table1>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Unit</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Min Stock</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Remark</b></b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></b></th>
</tr>

<?php
include ("connect.php");

$st_id = $_GET['st_id'];

$qP = "SELECT st_items, st_qty, rate, unit, min_stock, st_remark FROM stationery_stock WHERE st_id = '$st_id' ORDER BY st_items";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$st_id = trim($st_id);
$st_items = trim($st_items);
$unit = trim($unit);
$min_stock = trim($min_stock);
$st_remark = trim($st_remark);
mysql_close();
?>

<tr>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $st_items;?>" name="st_items"></td>

<td class=td1 style="text-align:center;"><SELECT NAME="unit">
<option style="margin:2px; padding-left:10px;" value="<?php echo $unit;?>"><?php echo $unit;?></option>
<option style="margin:2px; padding-left:10px;" value="nos">nos</option>
<option style="margin:2px; padding-left:10px;" value="g">g</option>
<option style="margin:2px; padding-left:10px;" value="kg">kg</option>
<option style="margin:2px; padding-left:10px;" value="ltrs">ltrs</option>
<option style="margin:2px; padding-left:10px;" value="ft">ft</option>
</select></td>

<td class=td1 style="text-align:center;"><input style="text-align:right;" size="8" type="text" value="<?php echo $min_stock;?>" name="min_stock"></td>

<td class=td1 style="text-align:center;"><input size="20" type="text" value="<?php echo $st_remark;?>" name="st_remark"></td>

<td class=td1>
<input type="submit" name="submit" value="save"> &nbsp; <input type="hidden" name="st_id" value="<?=$st_id?>"><input type="button" value="cancel" onclick="window.location='javascript:history.back()'">
</td>
</tr>
</table>
</div>
</form>


<?php
if (isset($_GET['submit'])){
include ("connect.php");

$st_id = $_GET['st_id'];
$st_items = $_GET['st_items'];
$unit = $_GET['unit'];
$min_stock = $_GET['min_stock'];
$st_remark = $_GET['st_remark'];

$data = "UPDATE stationery_stock SET st_items = '".$st_items."', unit = '".$unit."', min_stock = '".$min_stock."', st_remark = '".$st_remark."' WHERE st_id = '".$st_id."'";

$update = mysql_query($data);

mysql_close();

if($update)
{
header ("Location: items_add.php");
}

if(!$update)
{
echo "Not Sucessfull! Please try again";
}
}
?>


<?php
}
?>
