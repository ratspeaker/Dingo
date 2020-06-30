<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

if(isset($_POST['insert']))
{
    $ime=$_POST['ime'];
    $stolovi=$_POST['stolovi'];
    $grad=$_POST['grad'];
    $adresa=$_POST['adresa'];
    $slika=$_POST["slika"];
    $sajt=$_POST["sajt"];
    $meni=$_POST["meni"];
    $hrana = $_POST['hrana'];

    if(empty($ime) || empty($stolovi) || empty($grad) || empty($adresa) || empty($slika) || empty($sajt) || empty($meni) || empty($hrana)) {
        if(empty($ime)) {
            echo "<font color='red'>Niste upisali ime</font><br/>";
        }
        if(empty($stolovi)) {
            echo "<font color='red'>Niste upisali broj stolova.</font><br/>";
        }
        if(empty($grad)) {
            echo "<font color='red'>Niste upisali ime grada.</font><br/>";
        }
        if(empty($adresa)) {
            echo "<font color='red'>Niste upisali adresu.</font><br/>";
        }
        if(empty($slika)) {
            echo "<font color='red'>Niste upisali sliku.</font><br/>";
        }
        if(empty($sajt)) {
            echo "<font color='red'>Niste upisali sajt.</font><br/>";
        }
        if(empty($meni)) {
            echo "<font color='red'>Niste upisali meni.</font><br/>";
        }
        if(empty($hrana)){
            echo "<font color='red'>Niste izabrali vrstu hrane.</font><br/>";
        }
    } else {

        insertRestoran($db, $ime, $stolovi, $grad, $adresa, $slika, $sajt, $meni, $hrana);

        header("Location: restoran.php");
    }
}
?>

<html>
<head>
    <title>Upis novog restorana</title>
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

</head>

<body>
<div class="container">
    <div class="col-4">
        <a href="restoran.php"><input class="btn btn-info" value="Vrati se na početnu stranu"></a>
    </div>
        <br/><br/>

    <form name="form1" method="post" action="insertRestoran.php">
        <table style="width: 600px;">
            <tr>
                <td>Naziv restorana</td>
                <td><input type="text" name="ime" value="<?php echo $ime;?>"></td>
            </tr>
            <tr>
                <td>Ukupan broj stolova </td>
                <td><input type="text" name="stolovi" value="<?php echo $stolovi;?>"></td>
            </tr>
            <tr>
                <td>Grad</td>
                <td><input type="text" name="grad" value="<?php echo $grad;?>"></td>
            </tr>
            <tr>
                <td>Adresa</td>
                <td><input type="text" name="adresa" value="<?php echo $adresa;?>"></td>
            </tr>
            <tr>
                <td>Sajt</td>
                <td><input type="text" name="sajt" value="<?php echo $sajt;?>"></td>
            </tr>
            <tr>
                <td>Slika</td>
                <td><input type="text" name="slika" value="<?php echo $slika;?>"></td>
            </tr>
            <tr>
                <td>Meni</td>
                <td><input type="text" name="meni" value="<?php echo $meni;?>"></td>
            </tr>
            <tr>
                <td>Vrsta hrane</td>
                <td>
                    <select name="hrana[]" id="hrana" multiple>
                        <?php
                            $records=selectVrstaHrane($db);
                            if(count($records) > 0):
                                foreach($records as $record):
                        ?>
                        <option value="<?php echo $record['vrsta_hrane'];?>"><?php echo $record['vrsta_hrane'];?></option>

                        <?php
                            endforeach;
                            else :
                        ?>

                            <option colspan = "5">Cannot find any records </option>

                        <?php endif ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td><input type="submit" name="insert" value="Unesi"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
