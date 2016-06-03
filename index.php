<?php

	$counter = 0;
	$counter = $_POST['counter'];

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit'])) {
			$list = array();
			foreach ($_POST['list'] as $task) {
				array_push($list, $task);
			}	
			$new = $_POST['new'];
			if(!empty($new)){
				array_push($list, $new);
			}
			$counter = count($list);
		} else if (isset($_POST['delete'])) {
			$list = array();
			foreach ($_POST['list'] as $task) {
				array_push($list, $task);
			}
			foreach ($_POST['checkedList'] as $toDelete) {
				foreach ($list as $task) {
					if($task == $toDelete){
						unset($list[array_search($task, $list)]);
					}
				}
			}
			$counter = count($list);
			echo "Number of tasks: " . $counter;
		}	
	}	

	
?>

<!DOCTYPE HTML>

	<head>
		<title>To-do List</title>
	</head>

	<body>

		<form action= "index.php"  method="post">

		<header id = "main">
			<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
			To-do List:
		</header>

		<div>
			<?php 
				$incrementer = 0;
				foreach ($list as $task) {
   					echo "<br/><input id = checkbox type='checkbox' name='checkedList[]' value='$task' />$task<br><p></p>";
   					$incrementer++;
				}
			?>
		</div>

			<input type="text" name="new" value=""/>	
			<?php foreach ($list as $task) {
				echo '<input type="hidden" name="list[]" value= "'.$task.'"/>';
			}?>	
			<input type="submit" name="submit" value="Submit">
			<br>
			<input type="submit" name="delete" value="Delete">
			<input type="hidden" name="counter" value= "<?php echo $counter; ?>"/>
			</form>

	</body>
</html>		