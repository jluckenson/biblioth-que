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
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-book"></i> Fiche du livre</h1>
        </div>
        <article class="offset-sm-1">
            <div class="row">
                <div class="col-sm-3">
                    <img width="200" src="../../images/livres/<?php echo $livre['image']; ?>" class="rounded" />
                </div>
                <div class="col-sm-6">
                    <h3 style="margin-bottom:20px;"><?php echo $livre['titre']; ?> :</h3>
                    <p><i class="fas fa-angle-double-right"></i><strong> Auteur: </strong><?php echo $livre['auteur']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Catégorie: </strong><?php echo $livre['cat']; ?></p>
                    <p>
                        <i class="fas fa-angle-double-right"></i>
                        <strong> Prix achat </strong>
                        <?php echo $livre['p_ach']; ?><sup>DA</sup> 
                       <?php if($livre['promo']!=0){ echo '<i class="fas fa-gift" style="color:#ff00cc"></i>'; }?>
                    </p>
                    <p>
                        <i class="fas fa-angle-double-right"></i>
                        <strong> Nombre de vente: </strong><span class="badge badge-secondary"><?php echo $livre['nb_v']; ?></span>
                    </p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Disponiblité : </strong><?php echo $livre['dispo']; ?></p>
                    <p><i class="fas fa-angle-double-right"></i><strong> Discription: </strong></p>
                    <p style="text-align:center;" class="page">
                        <?php 
                    if( strlen($livre['disc'])>80  ){
                        for($i=0 ; $i<=80 ; $i++){
                            echo $livre['disc'][$i];
                        } 
                            echo '<a class="suite" href="#"> Lire la suite...</a>';
                        }
                    else{
                        echo $livre['disc'];
                    }
                    ?>
                    </p>
                </div>
            </div>

        </article>
    </section>
    <script>
        $(".suite").click(function() {
            $.get(
                '../autre/disc.php',
                'id=<?php echo $livre['id']; ?>',
                function rep(texte_recu) {
                    $('.page').html(texte_recu);
                },
                'HTML'
            );
        });

    </script>
</body>

</html>
