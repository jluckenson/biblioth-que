<html>

<head>
    <title>Accueil | Atlas Livre</title>
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
    <!-- Annonces -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../images/bibliotheque2.jpg" class="bd-placeholder-img img_car" width="100%" preserveAspectRatio="xMidYMid slice" focusable="false" />
                <div class="container">
                    <div class="carousel-caption text-center" style="color : #171819; font-weight:bold">
                        <h1 style=" margin-bottom:40px;">Bienvenu sur le site </h1>
                        <p class="col-lg-12" style="font-size:20px; margin-bottom:40px;">
                            si vous cherchez des livres vous êtes au bon endroit 
                            nous vous proposons les meilleures sélections de livres.
                       
                            Recherchez ou allez voir notre liste des livres.
                        </p>
                        
                        <a class="btn btn-primary btn-lg" href="listeLivre_controleur.php">Voir la suite.</a>
                    </div>
                </div>
            </div>
            <?php 
            $promos = get_promotion(0,2);
            while($promo= $promos->fetch()){
            ?>
            <div class="carousel-item">
                <img src="../../images/promotion/<?php echo $promo['image'] ; ?>" class="bd-placeholder-img img_car" width="100%" preserveAspectRatio="xMidYMid slice" focusable="false" />
                <div class="container">
                    <div class="carousel-caption">
                        <h1 style="margin-bottom:40px;"><?php echo $promo['titre'] ; ?>.</h1>
                        <p style="margin-bottom:40px;"><?php echo $promo['slogan'] ; ?><br /> <span style="font-size:20px;color : #dc3545; font-weight:bold;"><?php echo $promo['pr'] ; ?>% de réduction sur vos achats.</span></p>
                        <p><a class="btn btn-lg btn-primary" href="promotion_controleur.php?promo=<?php echo $promo['id']; ?>" role="button">Commander</a></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Conetenu de l'accueil -->
    <section class="container" id="princi">
        <!-- Quelques categories -->
        <article style="margin-bottom:20px;">
            <h2 style="text-align:center; margin-bottom:20px; ">Découvrez nos plus belles catégories</h2>
            <div class="row offset-sm-1">
                <?php 
                $cats=get_cat(0,3);
                while($cat=$cats->fetch()){
                ?>
                <div class="col-sm-3 rounded img_cat" style="background-image:url('../../images/cat/<?php echo $cat['cat']; ?>.jpg'); margin : 10px; color:#fff ; background-size: 100%;">
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
        </article>
        <!-- Dernier arrivages-->
        <article>
            <h3 style="margin-bottom:30px;">Dernier arrivage : </h3>
            <div class="row">
                <?php 
                    $livres=get_livres(0,4);
                    while($livre=$livres->fetch()){
                ?>
                <div class="col-sm-3" id="livres" style="margin-top:20px;">
                    <p id="img_livre"><a href="livre_controleur.php?livre=<?php echo $livre['id']; ?>"><img src="../../images/livres/<?php echo $livre['image']; ?>" width=120 /></a></p>
                    <a href="livre_controleur.php?livre=<?php echo $livre['id']; ?>">
                        <p id="img_text"><?php echo $livre['titre']; ?><br><span style="font-size:12px;">par : <?php echo $livre['auteur']; ?></span></p>
                    </a>
                    <p style="text-align:center; font-wight:bold;">
                        <strong>
                            <?php if($livre['promo']==0){ ?>
                            <?php echo $livre['p_ach']; ?> <sup>DA</sup>
                            <?php }else{ ?>
                            <?php
                                echo '<span style="text-decoration: line-through; color:red;">'.$livre['p_ach'].'<sup>DA</sup></span> ';
                                $promo=recherche_promo($livre['promo']);
                                $pr= (int) ($livre['p_ach'] - ($livre['p_ach']*$promo['pr']/100));
                                echo $pr.'<sup>DA</sup>';
                            }
                            ?>
                            <br>
                        </strong>
                    </p>
                    <p style="text-align:center;"><a class="btn btn-warning" href="panier_controleur.php?add=<?php echo $livre['id']; ?>" style="color:white"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                        <p>
                </div>
                <?php } ?>
            </div>
        </article>
        <!-- Mielleurs ventes-->
        <article>
            <h3 style="margin-bottom:30px;">Meilleures ventes : </h3>
            <div class="row">
                <?php 
                clas();
                $livres=get_clas(0,4);
                while($livre=$livres->fetch()){
            ?>
                <div class="col-sm-3" id="livres" style="margin-top:20px;">
                    <p id="img_livre"><a href="livre_controleur.php?livre=<?php echo $livre['id']; ?>"><img src="../../images/livres/<?php echo $livre['image']; ?>" width=120 /></a></p>
                    <a href="livre_controleur.php?livre=<?php echo $livre['id']; ?>">
                        <p id="img_text"><?php echo $livre['titre']; ?><br><span style="font-size:12px;">par : <?php echo $livre['auteur']; ?></span></p>
                    </a>
                    <p style="text-align:center; font-wight:bold;">
                        <strong>
                            <?php if($livre['promo']==0){ ?>
                            <?php echo $livre['p_ach']; ?> <sup>DA</sup>
                            <?php }else{ ?>
                            <?php
                                echo '<span style="text-decoration: line-through; color:red;">'.$livre['p_ach'].'<sup>DA</sup></span> ';
                                $promo=recherche_promo($livre['promo']);
                                $pr= (int) ($livre['p_ach'] - ($livre['p_ach']*$promo['pr']/100));
                                echo $pr.'<sup>DA</sup>';
                            }
                            ?>
                            <br>
                        </strong>
                    </p>
                    <p style="text-align:center;"><a class="btn btn-warning" href="panier_controleur.php?add=<?php echo $livre['id']; ?>" style="color:white"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                        <p>
                </div>
                <?php } ?>
            </div>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
