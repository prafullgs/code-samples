<?php
include("../settings/config.php");
session_start();
$uid = $_SESSION['id'];
$q=$_GET["q"];

$sql="SELECT  ro.option_name, ro.id,  rp.price ,rp.after_april_11 FROM  regprice AS rp, registration_options AS ro  WHERE ro.event_id = '".$q."' AND rp.option_id = ro.id";


if($q == "14")
{
?>   <table border='0'>
		<tr>

        <td valign='top'><select name='reg_option' onchange='showEventDetails(this.value)'>
			<option value='0'>Select Registration type</option>
        	<option value='1'>Member</option>
        	<option value='2'>Non-Member</option>
			<option value='3'>Speaker</option>
        	<option value='4'>Student</option>
        </select></td>
		</tr>
		</table>
	<?php
	}
else
{
		?><table border='0' cellpadding='5'>
		<?php
        $result = mysql_query($sql);
		if($row = mysql_fetch_array($result))
		{
		$op_id = $row['id'];
		$price = $row['price'];
		
		?>
		<tr>
		<td><input type="radio"  id= "group1" CHECKED name="group1"  value="<?php echo  $uid."-".$op_id."-".$price; ?>"></td>
		<td><input type ="hidden" name="opname" value="<?php echo  $row['option_name']; ?>" /><?php echo  $row['option_name']; ?></td>
		<td>$<input type ="hidden" name="opprice" value="<?php echo  $price; ?>" /><?php echo $price; ?></td>
		<td>Quantity : <input type ="text" name="quant"  size="1"  maxlength="2" value="1"/></td>
		</tr>
		<?php
		}
		?>
		</table>
		<?php
	}
?>
