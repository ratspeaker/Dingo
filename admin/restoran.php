<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
$records = selectRestoran($db);
header("Content-Type: text/html;charset=utf-8");
?>
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                          <td><?php echo $record['adresa'];?></td>\
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
                <div class="container">
                  <div class="row">
                      <div class="col-4">
                        <a href="korisnik.php"><input class="btn btn-info" value="KORISNICI"></a>
                      </div>
                      <div class="col-4">
                        <a href="insertRestoran.php"><input class="btn btn-info" value="UPIS NOVOG RESTORANA"></a>
                      </div>
                      <div class="col-4">
                        <a href="rezervacija.php"><input class="btn btn-info" value="REZERVACIJE"></a>
                      </div>
                  </div>
                </div>
    </body>
</html>
