<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
$records = fetchAll($db);
 
?>
<html>
	<head>
		<title> Select all from table </title>
    </head>
   	<body>
        <h1> A simple table from Dingo</h1>
      		<table>
              	<thead>
                    <tr>
                        <th>ID</th>
                         <th>Naziv</th>
                   		<th>Action</th>
                    </tr>
             	</thead>
            	<tbody>
                    <?php
                    if(count($records) > 0):
                    	foreach($records as $record):
                    		?>
                    		<tr>
                    			<td><?php echo $record['id_restorana'];?></td>
                    			<td><?php echo $record['naziv_restorana'];?></td>
                    			<td><a href="delete.php?id_restorana=<?php echo $record['id_restorana'];?>">Delete</a></td>
                    		</tr>
                    		<?php
                    	endforeach;
                    else : 
                    ?>
                    <tr>
              	        <td colspan = "5">Cannot find any records </td>
                    </tr>

                    <?php endif ?> 
                </tbody>
    </body>
</html>


