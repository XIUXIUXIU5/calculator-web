
<!DOCTYPE html>
<html>
<body>
	<style>
	#txtbox
	{
		height:150px;
		width:450px;
	}
	</style>
  <p>Created by Lei Shao and Jing Wu.<br>
  Please do not run a complex query here. You may kill the server.<br>
  Type an SQL query in the following box:<br>
  Example: SELECT * FROM Actor WHERE id = 10;</p>
  <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <textarea input type="text" name="query" ROWS = 8 COLS = 60 id = "txtbox"></textarea>
    <br>
    <input type="submit" value="Submit">
  </form>

<?php 
  if ($_SERVER["REQUEST_METHOD"] == "GET") 
  {
    $query = $_REQUEST['query'];//check this is not null
    echo "<br>";
    $db_connection = mysql_connect("localhost:1432", "cs143", ""); 
  	mysql_select_db("CS143",$db_connection);
  	echo "<p><b>Your query: </b>".$query. "</p>";
  	echo "<p><b>Results from MySQL:</b></p>";
  	echo "<br>";
    if ($query) 
    {
      $rs = mysql_query($query,$db_connection);
      echo '<table border = 1 cellspacing = 1 cellpadding = 2>';
      echo '<tbody>';
      echo '<tr align = center>';
      $c = 0;
      $num = mysql_num_fields($rs);
      while($meta = mysql_fetch_field($rs))
      {
        echo '<td>';
        printf ($meta->name);
        echo '</td>';
      }
      echo '</tr>';
      while($row = mysql_fetch_row($rs))
      {
      	//$num = count($row);
        $i = 0;
        echo '<tr align = center>';
        while($i < $num)
        {
      		echo '<td>';
        	if ($row[$i] == NULL) echo "N/A";
        	else echo $row[$i];
        	echo '</td>';
        	$i++;
        }
        echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';
  	}	
    mysql_free_result($rs);
    mysql_close($db_connection);
  }
 ?>
 

</body>
</html>

