<?php

	$counter = 0;
	$counter = $_POST['counter'];

	error_log(print_r($_POST['list']));

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		//if(!empty($_POST['list'])){
		if (isset($_POST['submit'])) {
			$list = array();
			foreach ($_POST['list'] as $task) {
				array_push($list, $task);
			}	
			$new = $_POST['new'];
			if(!empty($new)){
				array_push($list, $new);
			}
			$counter++;
			echo $counter;
		} else if (isset($_POST['delete'])) {
			$list = array();
			//error_log(print_r($list));
			error_log(print_r($_POST['list']));
			foreach ($_POST['list'] as $task) {
				array_push($list, $task);
			}
			//echo implode(', ', $list);
			foreach ($list as $task) {
				if(($_POST['list'])=='on'){
					echo " meow ".implode($_POST['list']);
					array_push($list, $task);
				}
				echo "hi";
			}
			$counter--;
			echo $counter;
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
			<!--<input type="checkbox" name="words" value="reading">words<br>-->
			<?php 
				$incrementer = 0;
				foreach ($list as $task) {
   					echo "<br/><input type='checkbox' name='list[]' value='$task' />$task<br>";
   					$incrementer++;
				}
			?>
				
		</div>

			<input type="text" name="new" value=""/>	
			<?php foreach ($list as $task) {
					echo '<input type="hidden" name="list[]" value= "'.$task.'"/>';
			}?>	
			<input type="submit" name="submit" value="Submit">
			<input type="submit" name="delete" value="Delete">
			<input type="hidden" name="counter" value= "<?php echo $counter; ?>"/>
			</form>

	</body>
</html>		