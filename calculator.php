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
    $expr = $_GET['expr'];
    echo "<br>";
    if (($expr)) {
      if (preg_match("/^\s*-?\d*(\.\d+)?(\s*[-\*\+\/]\s*-?\d+(\.\d+)?)*$/", $expr))
      {
        if (preg_match("/[^\d]0\d/", $expr))
          echo "Invalid expression!";
        else if (preg_match("/\/0[-\+\*\/\s]/", $expr)||preg_match("/\/0$/", $expr))
          echo "Division by zero error!";
        else
        {
          echo "Valid expression!";
          echo "<br>";
          if (preg_match("/--/", $expr))
            {
              $change = str_replace('--', '- -', $expr, $count);
              $result = eval('return '.$change.';');
            }
          else $result = eval('return '.$expr.';');
          echo "<h2>Result</h2>";
          echo $expr.' = '.$result;
        }
      }
      else
        echo "Invalid expression!";    
    }
    
  }
  ?>

</body>
</html>
