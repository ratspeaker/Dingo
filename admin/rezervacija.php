<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
$records = selectRezervacija($db);
 
?>
<html>
	<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css">
		<title> REZERVACIJA </title>
    </head>
   	<body>
        <h1> TABELA REZERVACIJA</h1>
        <hr>
      		<table>
              	<thead>
                    <tr>
                        <th>ID REZERVACIJE</th>
                        <th>ID RESTORANA</th>
                   		  <th>ID KORISNIKA</th>
                        <th>SAT</th>
                        <th>DATUM</th>
                        <th>BROJ STOLOVA</th>
                        <th>Action</th>
                        
                    </tr>
             	</thead>
            	<tbody>
                    <?php
                    if(count($records) > 0):
                    	foreach($records as $record):
                    		?>
                    		<tr>
                    			<td><?php echo $record['id_rezervacije'];?></td>
                          <td><?php echo $record['id_restorana'];?></td>
                          <td><?php echo $record['id_korisnika'];?></td>
                          <td><?php echo $record['sat'];?></td>
                          <td><?php echo $record['datum'];?></td>
                    			<td><?php echo $record['broj_stolova'];?></td>
                    			<td><a href="delete.php?id=<?php echo $record['id_rezervacije'];?>&location=<?php echo "rezervacija.php";?>">Delete</a></td>
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


