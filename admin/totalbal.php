<?php

    
//make connection
mysql_connect('localhost', 'root'. '');

//select db
mysql_select_db('college_ms');

$sql="SELECT * FROM ledger ";
$records=mysql_query($sql);



        $u = mysql_query("SELECT SUM(amountcr) as sum FROM ledger ") or die(mysql_error());
$totalcr = mysql_fetch_assoc($u);
       
        $q = mysql_query("SELECT SUM(amountdr) as sum FROM ledger ") or die(mysql_error());
$totaldr = mysql_fetch_assoc($q);

         $left=$totalcr['sum']-$totaldr['sum'];
       
       
        ?>

<html>
    <head></head>
    <body>
 <table class="table">
    <thead style="background-color:#1abc9c;">
      <tr>
        
        <th>Balance</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
        <td><?php echo "$left";?></td>
      </tr>
      
    </tbody>
  </table>
    </body>
</html>