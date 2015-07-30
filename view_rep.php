<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome </title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">View Repository : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<?php $user_check=$_SESSION['login_user'];

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("vbass", $connection);
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("
select 
	ent.entity_name entname, ent.ent_attr1 attr1,ent.ent_attr2 attr2,ent.ent_attr3 attr3,
    ent.ent_attr4 attr4,ent.ent_attr5 attr5, ent.ent_bill_catg billcatg,
    ep.ent_prod_name prodname, epr.ent_chg_type chgtype, epr.ent_amt amt,
    epr.ent_tx_per txrate
from
	entity ent,
    entity_prod ep,
    entity_prod_rule epr
where
	ent.entity_id = epr.entity_id and
    ep.ent_prod_id = epr.ent_prod_id
order by ent.entity_name", $connection);

//echo "This is View repoistory page <br>";

echo "<table><tr><td> Entity Name</td>
<td> Attribute 1</td>
<td> Attribute 2</td>
<td> Attribute 3</td>
<td> Attribute 4</td>
<td> Attribute 5</td>
<td> Bill Category</td>
<td> Product Name</td>
<td> Charge Type</td>
<td> Base Rate</td>
<td> Tax %</td>
</tr>";

//echo "<table><th><td> Entity Name</td>";

while($row = mysql_fetch_assoc($ses_sql))
{
	//echo "Hello";
	$entname  = $row['entname'];
	$attr1 = $row['attr1'];
	$attr2 = $row['attr2'];
	$attr3 = $row['attr3'];
	$attr4 = $row['attr4'];
	$attr5 = $row['attr5'];
	$billcatg = $row['billcatg'];
	$prodname = $row['prodname'];
	$chgtype = $row['chgtype'];
	$amt = $row['amt'];
	$taxrate = $row['txrate'];
	
	
	echo "<tr>
<td> $entname</td>
<td> $attr1</td>
<td> $attr2</td>
<td> $attr3</td>
<td> $attr4</td>
<td> $attr5</td>
<td> $billcatg</td>
<td> $prodname</td>
<td> $chgtype</td>
<td> $amt</td>
<td> $taxrate</td>
</tr>";	
}

echo "</table>";


mysql_close($connection); // Closing Connection

//echo "<b> The USer is $user_check </b>";
?>

</body>
</html>
