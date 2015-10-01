<!DOCTYPE html>
<html>
<body>

<h1>Calculator</h1>
<p>Created by Lei Shao and Jing Wu.</p>
<p>Type an expression in the following box (e.g., 10.5+20*3/25).</p>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="text" name="expr">
  <input type="submit" name="Calculate">
</form>

<ul>
	<li>Only numbers and +,-,* and / operators are allowed in the expression.</li>
	<li>The evaluation follows the standard operator precedence.</li>
	<li>The calculator does not support parentheses.</li>
	<li>The calculator handles invalid input "gracefully". It does not output PHP error messages.</li>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $expr = $_GET['expr'];

    //TO DO: check if the expression is valid

    $result = eval('return '.$expr.';');
    echo "<h2>Result</h2>";
    if ($result) {
    	echo $expr.' = '.$result;
    }
}
?>

</body>
</html>
