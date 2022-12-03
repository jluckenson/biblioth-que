<html>

<head>
    <title><?php echo $livre['titre']; ?> | Atlas Livre</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>
</head>

<body>
    <?php include('../autre/connexion.php'); ?>
    <?php include("../autre/menu.php"); ?>
    <!-- Conetenu de la page -->
    <section class="container" id="princi">
        <article>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="accueil_controleur.php">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="listeLivre_controleur.php">Liste des livres</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $livre['titre']; ?></li>
                </ol>
            </nav>
        </article>
        <article class="row">
            <div class="col-sm-4 offset-sm-1">
                <p style="text-align:center; margin:20px;">
                    <img id="im_com" src="../../images/livres/<?php echo $livre['image']; ?>" width=200 />
                    <p>
            </div>
            <div class="col-sm-6" style="margin-top:40px;">
                <h1><?php echo $livre['titre']; ?></h1>
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Auteur : </span><?php echo $livre['auteur']; ?></p>
                <?php if($livre['promo']==0){ ?>
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Prix achat : </span><span class="badge badge-secondary"><?php echo $livre['p_ach']; ?><sup>DA</sup></span></p>
                <?php
                    }else{
                        $promo=recherche_promo($livre['promo']);
                        $pr= (int) ($livre['p_ach'] - ($livre['p_ach']*$promo['pr']/100));
                ?>
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Prix achat : </span><span style="text-decoration: line-through; color:red;"><?php echo $livre['p_ach']; ?><sup>DA</sup></span> <span class="badge badge-secondary"><?php echo $pr; ?><sup>DA</sup></span></p>
                <?php } ?>
               
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Stock : </span><span class="badge badge-secondary"><?php echo $livre['stock']; ?></span></p>
            </div>
            <div class="col-sm-8 offset-sm-2">
                <p style="font-weight: 900;">Discription :</p>
                <p style="text-align:center;"><?php echo $livre['disc']; ?></p>
            </div>
            <?php if(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass']))){ ?>
            <div class="col-sm-8 offset-sm-2 ">
                <a class="btn btn-warning navbar-btn pull-left " style="margin-right : 10px; color : #fff " href='panier_controleur.php?add=<?php echo $_GET['livre']; ?>'><i class="fas fa-shopping-cart"></i> Ajouter panier</a>

                <a class="btn btn-success navbar-btn float-right " style="margin-right : 10px; color : #fff" <?php 
                    if($livre['dispo']=="non" && $livre['stock']==0){ 
                        echo "disabled"; 
                    } else{ 
                        echo 'data-toggle="modal"';
                        if(empty($lv)){
                            echo 'data-target="#infos"';
                        }else{
                            echo 'data-target="#alert_comm"';
                        }
                    } 
                ?>>Commander le livre</a>
                <?php 
                    if(empty($lv)){
                        include('../autre/commander.php');
                    }else{
                        include('../autre/alert_livreComm.php');
                    }
                ?>
            </div>
            <?php }else{ ?>
            <div class="col-sm-8 offset-sm-2 ">
                <a class="btn btn-warning navbar-btn" style="margin-right : 10px; color : #fff" data-toggle="modal" data-target="#con"><i class="fas fa-shopping-cart"></i> Ajouter panier</a>

                <a class="btn btn-success navbar-btn float-right " style="margin-right : 10px; color : #fff" data-toggle="modal" data-target="#con">Commander le livre</a>
            </div>
            <?php } ?>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>

</body>

</html>
