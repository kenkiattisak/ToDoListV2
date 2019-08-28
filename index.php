<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todolistdb");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tb_todo (td_id,td_todo) VALUES('','$task')";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
    }	
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($db, "DELETE FROM tb_todo WHERE td_id=".$id);
        header('location: index.php');
    }
    if (isset($_GET['delsuc_task'])) {
        $id = $_GET['delsuc_task'];
    
        mysqli_query($db, "DELETE FROM tbsucc WHERE id=".$id);
        header('location: index.php');
    }
    if (isset($_GET['ed_task'])) 
    {
        $id = $_GET['ed_task'];

        $tasks = mysqli_query($db, "SELECT * FROM tb_todo WHERE td_id=".$id);
        $row = mysqli_fetch_array($tasks);
                ?>
                    <form method="post" action="index.php" class="input_form">
                        <input type="text" name="taskz" class="task_input">
                        <button type="submit" name="btnSave" class="add_btn" onclick="confirmTrueOrFalse()">SAVE</button>
                        <script type="text/javascript">
                            function confirmTrueOrFalse()
                            {
                            var x;
                            var r=confirm("Are you sure?");
                            if (r==true){
                            document.getElementById("confirm").value = "true";
                            }
                            else{
                            document.getElementById("confirm").value = "false";

                            }
                            }
                        </script>
                    </form>
               <?php
              if(isset($_POST['btnSave']))
              {
                $n="TEST ";
                $sql="UPDATE tb_todo SET td_todo='TEST' WHERE td_id=".$id;

                $result=mysqli_query($db,$sql);
                
                if($result)
                {
                    echo '<script>alert("Update Success!")</script>';
                }
              }
            
            

    }
    if (isset($_GET['suc_task'])) {
        $id = $_GET['suc_task'];

        $tasks = mysqli_query($db, "SELECT * FROM tb_todo WHERE td_id=$id");

    
        
            $row = mysqli_fetch_array($tasks);
            $task=$row['td_todo'];
            $result=mysqli_query($db, "INSERT INTO tbsucc (id,suc) VALUES('','$task')");
            if($result)
            {
                echo '<script>alert("Update Success!")</script>';
                mysqli_query($db, "DELETE FROM tb_todo WHERE td_id=".$id);
                header('location: index.php');
            }
    }

    if (isset($_GET['un_task'])) {
        $id = $_GET['un_task'];

        $tasks = mysqli_query($db, "SELECT * FROM tbsucc WHERE id=$id");

    
        
            $row = mysqli_fetch_array($tasks);
            $task=$row['suc'];
            $result=mysqli_query($db, "INSERT INTO tb_todo (td_id,td_todo) VALUES('','$task')");
            if($result)
            {
                echo '<script>alert("Update And Remove  Success!")</script>';
                mysqli_query($db, "DELETE FROM tbsucc WHERE id=".$id);
                header('location: index.php');
            }
    }
    
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css">
<head>
	<title>ToDo List Application PHP and MySQL</title>
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List Application PHP and MySQL database</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
    <table>
	<thead>
		<tr>
			<th>N</th>
			<th>Unsuccess Tasks</th>
			<th colspan=3 style="width: 180px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tb_todo");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['td_todo']; ?> </td>
                <td class="edit"> 
                    
                    <a href="index.php?suc_task=<?php echo $row['td_id'] ?>">Succes</a>
					<a href="index.php?ed_task=<?php echo $row['td_id'] ?>">Edit</a>
					<a href="index.php?del_task=<?php echo $row['td_id'] ?>">Delete</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
    
</table>
<table>
    <thead>
		<tr>
			<th>N</th>
			<th>Success Tasks</th>
			<th colspan=3 style="width: 180px;">Action</th>
		</tr>
	</thead>
    <?php
            $sql = "SELECT * FROM tbsucc"; // Command for Database

            $result=mysqli_query($db,$sql);
        
            if($result)
            {
                $i=1;
                while($record = mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    ?>
			    <tr>
                    <td> <?php echo $i; ?> </td>
                        <td class="task"> <?php echo $record['suc']; ?> </td>
                        <td class="edit"> 
                            <a href="index.php?un_task=<?php echo $record['id'] ?>">Undo</a>
					        <a href="index.php?delsuc_task=<?php echo $record['id'] ?>">Delete</a>
                        </td>
			    </tr>
		            <?php
                     $i++;}
            }
            else
            {
                echo "You have a problem!";
            }
          ?>
	
</table>
</body>
</html>