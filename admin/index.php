<?php 
    $title = "Administration";
    include_once("../block/header.php");
    include_once("../block/navbar.php");
    include_once("../utils/connectionDB.php");
    $articles = $db->query('SELECT * FROM annonce ORDER BY datePublication DESC')->fetchAll();
?>

<div class="container">

    <h1 class="text-center m-5"><?php echo ($title ?? "Default Title") ?></h1>
    <div class="d-flex align-items-center">
        <h2 class="me-5">Articles</h2>
        <a class="rounded bg-success text-light text-decoration-none p-2 m-2" href="ajoutArticle.php">Ajouter un article</a>
    </div>
</div>

<div>
    <?php 
        foreach($articles as $article) {
            $description = substr($article["contenu"],0, 500);
            if ($article["imageUrl"]=== "") { // if the article does not have an image it show the default dauphine logo
                $img = "../imgs/dauphine_logo.jpg";
            } else {
                $img = "../".$article["imageUrl"];
            }
    ?>
        <div class="rounded border border-dark m-3 p-1 d-flex justify-content-between mb-5" style="background-color: #ededeb;">
            <img class="col-3 img-thumbnail img-fluid rounded" src="<?php echo($img) ?>" alt="Article image">
            <div class="col-8 d-flex flex-column justify-content-between me-4">
                <div class="d-flex justify-content-between m-3">
                    <h3 class="fs-2"><?php echo($article["titre"]) ?></h3>
                    <div>
                    <p class="fs-5"><span class="fw-bold"><?php echo($article["auteur"])?></span>, <span class="fst-italic"><?php echo(date('j F Y', strtotime($article["datePublication"]))) ?></span></p>
                    </div>
                </div>
                <div class="me-5">
                   <?php echo($description." ...") ?>
                </div>
                <div class="m-2 d-flex justify-content-end">
                   <a class="rounded bg-primary text-light text-decoration-none p-2 m-2" href="detailsArticle.php?id=<?php echo($article["id"]) ?>">Modifier</a>
                </div>
            </div>
        </div>
    <?php 
        }
    ?>
</div>

<?php 
    include_once("../block/footer.php");
?>