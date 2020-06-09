<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
$records = selectKorisnik($db);
 
?>
<html>
	<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css">
		<title> KORISNIK </title>
    </head>
   	<body>
        <h1> TABELA KORISNIK</h1>
        <hr>
      		<table>
              	<thead>
                    <tr>
                        <th>ID</th>
                        <th>IME</th>
                        <th>PREZIME</th>
                        <th>MOBILNI</th>
                        <th>EMAIL</th>
                   		<th>Action</th>
                    </tr>
             	</thead>
            	<tbody>
                    <?php
                    if(count($records) > 0):
                    	foreach($records as $record):
                    		?>
                    		<tr>
                    			<td><?php echo $record['id_korisnika'];?></td>
                    			<td><?php echo $record['ime'];?></td>
                          <td><?php echo $record['prezime'];?></td>
                          <td><?php echo $record['broj_mobilnog'];?></td>
                          <td><?php echo $record['email'];?></td>
                    			<td><a href="delete.php?id=<?php echo $record['id_korisnika'];?>&location=<?php echo "korisnik.php";?>">Delete</a></td>
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


