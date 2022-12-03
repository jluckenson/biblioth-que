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
            <h1 style="margin-bottom:20px;" class="col-sm-9"><i class="fas fa-gift"></i> <?php echo $promo['titre']; ?> <a class="btn btn-outline-primary" href="ajouterLivrePromo_controleur.php?promo=<?php echo $_GET['promo']; ?>">Ajouter</a></h1>
        </div>
        <article>
            <div class="row">
                <h3 class=" col-sm-12"><i class="fas fa-list-ul"></i>Livre concerné :<span class="float-right" style="color:red;">-<?php echo $promo['pr']; ?>%</span></h3>
            </div>
            <div class="table-responsive">
                <form method="post" action="afficherPromo_controleur.php?promo=<?php echo $_GET['promo']; ?>">
                    <table class="table table-striped table-condensed ">
                        <tr>
                            <th style="width:1%;"><input type="checkbox" id="all" onclick="rep();" /></th>
                            <th>livre</th>
                            <th>Prix Avant</th>
                            <th>Prix Apres</th>
                        </tr>
                        <?php while($livre=$livres->fetch()){?>
                        <tr>
                            <td><input type="checkbox" name='num[]' value="<?php echo $livre['id']; ?>" /></td>
                            <td style="width:25%;">
                                <?php echo $livre['titre']; ?><br />
                                <span style="font-size:13px; ">
                                    <a href="afficherPromo_controleur.php?promo=<?php echo $_GET['promo']; ?>&supp=<?php echo $livre['id']; ?>" style="color:#dc3545;">Retirer</a>
                                </span>
                            </td>
                            <td><?php echo $livre['p_ach']; ?> <sup>Da</sup></td>
                            <td style="color:red;"><?php echo $livre['p_ach']*$promo['pr']/100; ?> <sup>Da</sup></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <input type="submit" value="retirer toute la selection" name="suppSlec" class="btn btn-danger float-right" />
                </form>
            </div>
        </article>
    </section>
    <script>
        <?php if(isset($_GET['c'])){ ?>
        $('#<?php echo $_GET['c']; ?>').attr("selected", "");
        <?php } ?>

        function rep() {
            var cases = $('input');
            for (var i = 1; i < cases.length; i++) {
                if (cases[i].type == 'checkbox') {
                    cases[i].checked = $('#all').prop('checked');
                }
            }
        }

    </script>
</body>

</html>
