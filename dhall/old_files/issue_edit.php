<html>
<head>
<title>Edit issue</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
?>
<h3>Edit Issue</h3>

<?php
if ($_SESSION['user_name'] == 'admin')
{
include ("connect.php");

$iss_id = $_GET['iss_id'];

$qP = "SELECT * FROM issue WHERE iss_id = '$iss_id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$iss_id = trim($iss_id);
$iss_date = trim($iss_date);
$iss_items = trim($iss_items);
$iss_qty = trim($iss_qty);
$iss_remark = trim($iss_remark);
$issued_to = trim($issued_to);
mysql_close();
?>

<table class=table1>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
<tr>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Issue Date</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Issued To</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Items</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Description</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Qty</b></th>
<th class=td1 style="text-align:center; background-color:lightblue;"><b>Option</b></th>
</tr>

<tr>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="<?php echo $iss_date;?>" name="iss_date"></td>
<td class=td1 style="text-align:center;"><input size="25" type="text" value="<?php echo $issued_to;?>" name="issued_to"></td>
<td class=td1 style="text-align:center;"><input size="20" type="text" readonly="readonly" value="<?php echo $iss_items;?>" name="iss_items"></td>
<td class=td1 style="text-align:center;"><input size="30" type="text" value="<?php echo $iss_remark;?>" name="iss_remark"></td>
<td class=td1 style="text-align:center;"><input size="8" type="text" value="<?php echo $iss_qty;?>" name="uiss_qty"></td>
<td class=td1 style="text-align:center;"><input type="submit" name="issue_update" value="save"> &nbsp; <input type="hidden" name="iss_id" value="<?=$iss_id?>"></td>
</tr>
</table>
</div>
</form>

<?php
if (isset($_POST['issue_update'])){

$iss_id = $_POST['iss_id'];
$iss_items = $_POST['iss_items'];
$uiss_qty = $_POST['uiss_qty'];
$issued_to = $_POST['issued_to'];
$iss_remark = $_POST['iss_remark'];

include ("connect.php");

//-----------------------update data to purchase -------------------------------//
$data = "UPDATE issue SET iss_to = '".$issue_to."', iss_remark = '".$iss_remark."' WHERE iss_id = '".$iss_id."'";

$update = mysql_query($data);


if($update)
{

//------------------------add data to stock -----------------------------------//
if ($iss_qty == $uiss_qty){

$po_qty = $uiss_qty - $iss_qty;

$po_data = "UPDATE stock SET st_qty = st_qty - '".$po_qty."' WHERE st_items = '".$iss_items."'";

$po_issue = mysql_query($po_data);
}

//------------------------add data to stock -----------------------------------//
if ($iss_qty > $uiss_qty){

$add_qty = $uiss_qty - $iss_qty;

$add_data = "UPDATE stock SET st_qty = st_qty - '".$add_qty."' WHERE st_items = '".$iss_items."'";

$add_issue = mysql_query($add_data);
}

//-----------------------less data to stock-----------------------------------//
if ($iss_qty < $uiss_qty){

$less_qty = $uiss_qty - $iss_qty;

$less_data = "UPDATE stock SET st_qty = st_qty - '".$less_qty."' WHERE st_items = '".$iss_items."'";

$less_issue = mysql_query($less_data);
}
}

if($add_issue || $less_issue || $po_issue)
{
header ("Location: details_issue.php");
}

if(!$add_issue || $less_issue || $po_issue)
{
echo "Not Sucessfull!";
}
}
?>

<?php
}
?>
