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
                    			<td><a href="deleteFromKorisnik.php?id=<?php echo $record['id_korisnika'];?>">Delete</a></td>
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
                      <div class="col-6">
                        <a href="restoran.php"><input class="btn btn-info" value="RESTORANI"></a>
                      </div>
                      <div class="col-6">
                        <a href="rezervacija.php"><input class="btn btn-info" value="REZERVACIJE"></a>
                      </div>

                  </div>
                </div>
    </body>
</html>


