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
			$counter = count($list);
			echo "added " . $counter;
		} else if (isset($_POST['delete'])) {
			$list = array();
			//error_log(print_r($list));
			error_log(print_r($_POST['list']));
			echo implode(', ', $_POST['list']);
			foreach ($_POST['list'] as $task) {
				array_push($list, $task);
			}
			foreach ($_POST['checkedList'] as $toDelete) {
				foreach ($list as $task) {
					if($task == $toDelete){
						unset($list[array_search($task, $list)]);
						echo "help " . $task;
					}
				}
			}
			//echo implode(', ', $list);
			/*foreach ($_POST['list'] as $task) {
				if(!isset($_POST['list']) ||
             	 $_POST['list'] == 'on'){
					echo " meow ";
					array_push($list, $task);
				}
				echo "hi";
			}*/
			$counter = count($list);
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
			<?php 
				$incrementer = 0;
				foreach ($list as $task) {
   					echo "<br/><input type='checkbox' name='checkedList[]' value='$task' />$task<br>";
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