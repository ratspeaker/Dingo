<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
mysqli_query("SET NAMES 'utf8'");
// mysqli_set_charset("UTF8");
$records = selectRestoran($db);
header("Content-Type: text/html;charset=utf-8"); 
?>
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
		<title> RESTORAN </title>
    </head>
   	<body>
        <h1> TABELA RESTORAN</h1>
        <hr>
      		<table>
              	<thead>
                    <tr>
                        <th>ID</th>
                         <th>Naziv</th>
                         <th>Ukupan broj stolova</th>
                         <th>Grad</th>
                         <th>Adresa</th>
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
                          <td><?php echo $record['ukupan_broj_stolova'];?></td>
                          <td><?php echo $record['grad'];?></td>
                          <td><?php echo $record['adresa'];?></td>
                    			<td><a href="delete.php?id=<?php echo $record['id_restorana'];?>&location=<?php echo "restoran.php";?>">Delete</a></td>
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


