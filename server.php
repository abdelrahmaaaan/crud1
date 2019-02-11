<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'test crud');

	
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
		$UserType = $_POST['UserType'];

        $query = mysqli_query($db, "INSERT INTO users (first_name, last_name ,user_type) VALUES ('$Fname', '$Lname','$UserType')"); 
        echo $query;
		$_SESSION['message'] = "data saved"; 
        header('location: index.php');
    }
        
        if (isset($_POST['update']))
         {
            $id = $_POST['id'];
            $Fname = $_POST['Fname'];
            $Lname = $_POST['Lname'];
            $UserType = $_POST['UserType'];
        
            mysqli_query($db, "UPDATE users SET first_name='$Fname', last_name='$Lname' ,user_type='$UserType' WHERE id=$id");
            $_SESSION['message'] = "data updated!"; 
            header('location: index.php');     
        }   

        if (isset($_GET['del'])) 
        {
                $id = $_GET['del'];
                mysqli_query($db, "DELETE FROM users WHERE id=$id");
                $_SESSION['message'] = "data deleted!"; 
                header('location: index.php');
            
        }
    
?>