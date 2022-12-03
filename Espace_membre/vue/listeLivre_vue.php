<html>

<head>
    <title>Liste des Livres | Atlas Livre</title>
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
    <?php include("../autre/menu.php"); ?>
    <!-- Conetenu de la page -->
    <section class="container" id="princi" style="margin-bottom:50px;">
        <article>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="accueil_controleur.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste des livres</li>
                </ol>
            </nav>
        </article>
        <!-- Choix de l'affichage -->
        
        <!-- Pour les categories -->
        <?php if(!isset($_GET['ch']) or $_GET['ch'] >6 or ((int) $_GET['ch'] <= 0)  ){ ?>
        <div class="row offset-sm-1">
            <?php 
            $cats=get_cat(0,9);
            while($cat=$cats->fetch()){
            ?>
            <div class="col-sm-3 rounded img_cat" style="background-image:url('../../images/cat/<?php echo $cat['cat']; ?>.jpg'); margin : 10px; color:#fff">
                <div class="row ">
                    <div class="rounded catText float-right col-sm-12">
                        <h3><?php echo $cat['cat']; ?></h3>
                        <p><?php include('../autre/text_cat.php'); ?></p>
                        <a class="btn btn-primary" href="cat_controleur.php?cat=<?php echo $cat['cat']; ?>">Voir</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- Pour les livres -->
       
        <!-- Pour les promotions -->
        <?php }else{ ?>
        <div class="row offset-sm-1">
            <?php 
            $promos=get_promotion(0,10);
            while($promo=$promos->fetch()){
            ?>
            <div class="col-sm-3 rounded " style="background-image:url('../../images/promotion/<?php echo $promo['image']; ?>'); margin : 10px; color:#fff; background-size:100%;">
                <div class="row ">
                    <div class="rounded catText float-right col-sm-12">
                        <h3><?php echo $promo['titre']; ?></h3>
                        <a class="btn btn-primary" href="promotion_controleur.php?promo=<?php echo $promo['id']; ?>">Voir</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
    <script>
        <?php if(isset($_GET['ch'])){ ?>
        $('#<?php echo $_GET['ch']; ?>').attr("selected", "");
        <?php } ?>

    </script>


</body>

</html>
