<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>PRICE OF YOUR VEGAN MEAL</title>
</head>
	<body>
		<p><u>PRICE OF YOUR VEGAN MEAL</u></p>
		<?php
			switch ($_GET['e1']){
				case 'a': 
					$food = 4;
					break;
				case 'b': 
					$food = 15;
					break;
				case 'c': 
					$food = 10;
					break;
				case 'd': 
					$food = 20;
					break;				
			}
			switch ($_GET['e2']){
				case 'a': 
					$drink = 9;
					break;
				case 'b': 
					$drink = 7;
					break;
				case 'c': 
					$drink = 5;
					break;
				case 'd': 
					$drink = 3;
					break;				
			}
			$meal = $food + $drink;
			echo "Price of your vegan meal: ".$meal."$<br>"; 
		?>
		<br>
		<a href="index.html">Return to the init web page</a>		
	</body>
</html>
