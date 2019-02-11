<?php  include('server.php'); ?>

<?php 
		$Fname = '';
		$Lname = '';
		$UserType = '';
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;

		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
		if ($record) {
			$n = mysqli_fetch_array($record);
			$Fname = $n['first_name'];
            $Lname = $n['last_name'];
            $UserType = $n['user_type'];
		}
	}
?>
<html>

<head>
	<title>CRUD</title>
	<link rel="stylesheet" href="styling.css">
</head>
<body>

<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>

<table>
	<thead>
		<tr>
			<th>Fname</th>
			<th>Lname</th>
            <th>UserType</th>
			<th colspan="3">Action</th>
		</tr>
	</thead>
	
<?php while ($row = mysqli_fetch_array($results)) { ?>

		<tr>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form method="post" action="server.php" >
<input type="hidden" name="id" value="<?php echo $id; ?>">

		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="Fname" value="<?php echo $Fname ?>">
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="Lname" value="<?php echo $Lname ?>">
		</div>
		<div class="input-group">
				<label>UserType</label>
				<input type="text" name="UserType" value="<?php echo $UserType ?>" >
		</div>

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</form>


    <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?> 

</body>
</html>