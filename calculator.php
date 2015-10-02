<!DOCTYPE html>
<html>
<body>

  <h1>Calculator</h1>
  <p>Created by Lei Shao and Jing Wu.</p>
  <p>Type an expression in the following box (e.g., 10.5+20*3/25).</p>

  <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="expr">
    <input type="submit" value="Calculate">
  </form>

  <ul>
   <li>Only numbers and +,-,* and / operators are allowed in the expression.</li>
   <li>The evaluation follows the standard operator precedence.</li>
   <li>The calculator does not support parentheses.</li>
   <li>The calculator handles invalid input "gracefully". It does not output PHP error messages.</li>

   <?php
   if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $expr = $_GET['expr'];//check this is not null
    echo "<br>";

    if (preg_match("/^\s*-?\d+(\.\d+)?(\s*[-*\+\/]\s*-?\d+(\.\d+)?)*$/", $expr))
    {
      if (preg_match("/\/0/", $expr))
        echo "Division by zero error!";
      else
      {
      //TO DO: old terms do not vanish
      //TO DO: 1-1 bug
      //TO DO: 1+-1 bug
      //TO DO: 0*1 bug
        echo "Valid expression!";
        echo "<br>";
        $result = eval('return '.$expr.';');
        echo "<h2>Result</h2>";
        if ($result) {
         echo $expr.' = '.$result;
        }
      }
    }
    else
      echo "Invalid expression!";
  }
 ?>

</body>
</html>
