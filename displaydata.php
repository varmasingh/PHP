<?php
require_once 'connection.php';
   $sql = "SELECT * FROM userlist";
   $result = mysql_query($sql);
?>
<html lang="en">
  <head>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
          <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  </head>
  <body>
        <table  id="example">
            <thead>
               <tr style="background-color:#29646f; color: white;">
                  <th  >id_user</th>
                  <th  >name</th>
                  <th  >email</th>
                  <th  >username</th>
                  <th  >confirmcode</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  while ($files = mysql_fetch_assoc($result)){
                      echo '<tr>';
                      echo '<td>'.$files['id_user'].'</td>';
                      echo '<td>'.$files['name'].'</td>';
                      echo '<td>'.$files['email'].'</td>';
                      echo '<td>'.$files['username'].'</td>';
                      echo '<td>'.$files['confirmcode'].'</td>';
                      echo '</tr>';
                  }
                  ?>
            </tbody>
         </table>
  </body>

</html>
