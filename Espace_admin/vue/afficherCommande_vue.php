<html>

<head>
    <title>Tableau de bord</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style_admin.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>
</head>

<body>
    <?php include("../autre/menu.php"); ?>

    <section class="container-fluid col-lg-10 offset-lg-2 col-md-9 offset-md-3" id='princi'>
        <div class="row">
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-shopping-cart"></i> Détail de la commande :</h1>
        </div>
        <article class="offset-sm-1">
            <div class="row">
                <div class="col-sm-3">
                    <img width="200" src="../../images/livres/<?php echo $livre['image']; ?>" class="rounded" />
                </div>
                <div class="col-sm-6">
                    <h3 style="margin-bottom:20px;"><a href="afficherLivre_controleur.php?livre=<?php echo $livre['idL'] ?>"><?php echo $livre['titre']; ?> :</a></h3>
                    <p><i class="fas fa-angle-double-right"></i><strong> éffectuer par: </strong><a href="afficherMembre_controleur.php?livre=<?php echo $livre['idM'] ?>"><?php echo $livre['nom'].' '.$livre['prenom']; ?></a></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Adress: </strong><?php echo $livre['adress']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Num: </strong><?php echo $livre['num']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> date: </strong><?php echo $livre['date']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Type: </strong><?php echo $livre['etat']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Prix: </strong><?php echo $livre['prix']; ?>
                        (<?php if($livre['etat']=="Acheter"){echo $livre['nb_l']." Livres"; } else {echo $livre['nb_j']." Jours"; }?>)
                        <?php if($livre['promo']!=0){ echo '<i class="fas fa-gift" style="color:#ff00cc"></i>'; }?> </p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Livraison: </strong><?php echo $livre['livraison']; ?></p>
                </div>
            </div>

        </article>
    </section>
</body>

</html>
