<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
$records = selectRezervacija($db);
 
?>
<html>
	<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <link rel="apple-touch-icon" sizes="180x180" href="../slike/Dingo-apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../slike/Dingo-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../slike/Dingo-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

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
                    			<td><a href="deleteFromRezervacija.php?id=<?php echo $record['id_rezervacije'];?>">Delete</a></td>
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
                <div class="container">
                  <div class="row">
                      <div class="col-4">
                        <a href="korisnik.php"><input class="btn btn-info" value="KORISNICI"></a>
                      <hr>
                      </div>
                      <div class="col-4">
                        <a href="restoran.php"><input class="btn btn-info" value="RESTORANI"></a> 
                      <hr>
                      </div>

                      <div class="col-4">
                        <a href="deleteOldReservations.php"><input class="btn btn-info" value="UKLONI ZASTARELE"></a>
                      <hr>
                      </div>

                  </div>
                </div>
    </body>
</html>


