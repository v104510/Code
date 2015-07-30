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
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<a href="logout.php">Begin Bill Run</a>
<a href="">Define Bill Rules</a>
<a href="view_rep.php">View Repository</a>
<a href="">Ticket Management</a>
</body>
</html>
