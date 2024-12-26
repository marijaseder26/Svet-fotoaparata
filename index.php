<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Dorang landing page.">
    <meta name="author" content="Devcrud">
    <title>Marija Seder photography</title>

	<link rel="stylesheet" href="assets/css/style.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home" class="dark-theme">
    
    <!-- page navbar -->
    <nav class="page-navbar" data-spy="affix" data-offset-top="10">
        <ul class="nav-navbar container">
            <li class="nav-item"><a href="#home" class="nav-link">Početna</a></li>
            <li class="nav-item"><a href="#proizvodi" class="nav-link">Proizvodi</a></li>
            <li class="nav-item nav-item-logo"><a href="#home" class="nav-link"><img src="assets/imgs/white-500.png" alt="Logo"></a></li>
            <li class="nav-item"><a href="#galerija" class="nav-link">Galerija</a></li>
            <li class="nav-item"><a href="#kontakt" class="nav-link">Kontakt</a></li>
            </li>
        </ul>
    </nav><!-- end of page navbar -->

    <div class="datetime">
        <p><span id="date"></span></p>
        <p><span id="time"></span></p>
    </div>

    <!-- page header -->
    <header class="header" id="home">
        <div class="overlay"></div>
        <div class="header-content">
            <h1 class="header-title">Istražite svet novim pogledom</h1>
            <p class="header-subtitle"> Ready, steady, go!</p>

            <button class="btn btn-theme-color modal-toggle"><i class="ti-control-play text-danger"></i> Video</button>

        </div>
    </header><!-- end of page header -->

    <!-- modal -->
    <div class="modalBox">
        <div class="modalBox-body">
            <iframe width="100%" height="450px" class="border-0" 
            src="https://www.youtube.com/embed/tgbNyZ7vqY?controls=0">
            </iframe>
        </div>          
    </div><!-- end of modal -->

    <!-- page container -->
    <div class="container page-container" id="proizvodi">
        <div class="col-md-10 col-lg-8 m-auto">
            <h6 class="title mb-4">Proizvodi</h6>
            <p class="mb-5">
                Kada kročite u naš prostor, očekuje vas širok asortiman fotoaparata renomiranih 
                brendova koji će zadovoljiti potrebe kako profesionalnih fotografa, tako i 
                ljubitelja fotografije svih nivoa veštine. 
                Za one koji teže nebu, naša ponuda uključuje i najnovije modele dronova, 
                od onih namenjenih rekreativnom letenju do profesionalnih dronova opremljenih 
                naprednim kamerama za snimanje spektakularnih vazdušnih fotografija i video zapisa. 
            </p>
        </div>  

        
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "phpprojekat";
        
        // konekcija sa bazom
        $conn = new mysqli($servername, $username, $password, $dbname);
        $pretraga = '';
        
        if( isset($_GET['pretraga']) && $_GET['pretraga'] ){
            $pretraga = $_GET['pretraga'];
            $sql = "SELECT * FROM proizvodi WHERE naslov LIKE '%".$_GET['pretraga']."%' OR podnaslov LIKE '%".$_GET['pretraga']."%' OR tekst LIKE '%".$_GET['pretraga']."%' ";
        }else{
            $sql = "SELECT * FROM proizvodi";
        }
        
        $result = $conn->query($sql);
        
        ?>

        <div class="col-md-10 col-lg-8 m-auto">
            <form method="get" action="">
                <label for="pretraga">Pretraga</label>
                <input name="pretraga" type="text" value="<?php echo $pretraga; ?>">
                <input type="submit" value="Pretrazi" class="form-control">
            </form>
        </div>


        <!-- row -->
        <div class="row mb-4">

            <?php if ($result->num_rows > 0) { ?>

                <?php while($row = $result->fetch_assoc()) { ?>

                    <div class="col-md-4">
                        <a href="javascript:void(0)" class="overlay-img">
                            <img src="<?php echo $row["slika"]; ?>" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, weber Landing page">  
                            <div class="overlay"></div> 
                            <div class="des">
                                <h1 class="title"><?php echo $row["naslov"]; ?></h1>
                                <h6 class="subtitle"><?php echo $row["podnaslov"]; ?></p>
                                <p><?php echo $row["tekst"]; ?></p>
                            </div>          
                        </a>
                    </div>

                <?php } ?>

            <?php } ?>

     
        </div><!-- end of row -->

        <div class="col-md-10 col-lg-8 m-auto" id="galerija">
            <h6 class="title mb-4 mt-5 pt-5">Galerija</h6>
            <p class="mb-5">
                U našoj galeriji možete pronaći inspirativne primere snimanja 
                i fotografisanja sa našim proizvodima, koje su kreirali talentovani 
                fotografi i stručnjaci iz naše zajednice.
            </p>
        </div>

        <!-- row -->
        <div class="row mb-5">
            <div class="col-md-6">
                <a href="assets/imgs/blog-1.jpg" class="card" download>
                    <img src="assets/imgs/blog-1.jpg" class="card-img" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, weber Landing page">
                    <div class="card-body">
                        <h3 class="card-title">ROLLING SHOTS</h3>
                        <p>
                            Naši fotografi su uspeli da majstorski uhvate "rolling shotove" 
                            prelepih Mustang automobila, prikazujući njihovu gracioznost i snagu u pokretu.
                        </p>
                    </div>                  
                </a>
            </div>  
            <div class="col-md-6">
                <a href="assets/imgs/blog-2.jpg" class="card" download>
                    <img src="assets/imgs/blog-2.jpg" class="card-img" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, weber Landing page">
                    <div class="card-body">
                        <h3 class="card-title">DRIFT RIDES</h3>
                        <p>
                            Naši fotografi su vešto uspeli da snime 
                            dramatične trenutke drift vožnje koristeći dronove, 
                            pružajući jedinstveni pogled iz vazduha na svaku vratolomiju i veštinu vozača.
                        </p>
                    </div>                  
                </a>
            </div>  
        </div><!-- end of row -->

    </div> <!-- end of page container -->

    <?php

    //submit forme
    
    if( isset($_POST['ime']) && $_POST['ime'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['tekst']) && $_POST['tekst'] ) {

        $sql = "INSERT INTO kontakt (ime, email, tekst)
                VALUES ('".$_POST['ime']."', '".$_POST['email']."', '".$_POST['tekst']."')";
        $result = $conn->query($sql);

    }
    
    ?>


    <!--footer & pre footer -->
    <div class="contact-section" id="kontakt">
        <div class="overlay"></div>
        <!-- container -->
        <div class="container">
            <div class="col-md-10 col-lg-8 m-auto">
                <h6 class="title mb-2">KONTAKT</h6>
                <p class="mb-5">Za sve upite, kontaktirajte nas ispod</p>
                <form method="post" action="" class="form-group">
                    <input type="text" name="ime" size="50" class="form-control" placeholder="Ime i prezime" required>
                    <input type="email" name="email" class="form-control" placeholder="Email" requried>
                    <textarea name="tekst" id="comment" rows="6"   class="form-control" placeholder="Tekst"></textarea>
                    <input type="submit" value="Pošalji" class="form-control">
                </form>
            </div>


        </div>
    </div>

    <div class="scrollcontent">
        <div class="contain">
            <div class="text">Hvala sto posecujete sajt! Hvala sto posecujete sajt! Hvala sto posecujete sajt!</div>
            <div class="fade left dock"></div>
            <div class="fade right"></div>
        </div>
    </div>

    <?php mysqli_close($conn); ?>
    <!-- zatvaranje konekcije -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>
</html>



