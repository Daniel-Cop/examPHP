<?php 
    if (!isset($_GET["id"])){
        header("Location: http://localhost/examphp/admin/index.php");
    }
    include_once("../utils/connectionDB.php");
    $query = $db->prepare('SELECT * FROM annonce WHERE id = :id');
    $query->execute([
        ":id" => $_GET["id"]
    ]);
    $article = $query->fetch();
    $title = $article["titre"];
    include_once("../block/header.php");
    include_once("../block/navbar.php");

    if(isset($_GET["delete"])) {
            if($article["imageUrl"] !== ""){
            unlink("../".$article["imageUrl"]);
            }
            $queryDelete = $db->prepare('DELETE FROM annonce WHERE id = :id');
            $queryDelete->execute([
                ":id" => $article["id"]
            ]);
            header("Location: http://localhost/examphp/admin/index.php");
    }

?>
<a class="position-absolute m-5 text-decoration-none text-light rounded btn bg-secondary" href="detailsArticle.php?id=<?php echo($article["id"]) ?>">< Retour</a>
<div class="d-flex flex-column justify-content-center align-items-center mt-5">
    <p class="fs-2 m-5">Êtes-vous sûr de vouloir supprimer l'article <span class="fw-bold">"<?php echo($article["titre"]) ?>"</span>?</p>
    <div>
    <a class="m-5 text-decoration-none text-danger rounded btn border-danger" href="detailsArticle.php?id=<?php echo($article["id"]) ?>">Annuler</a>
    <a class="m-5 text-decoration-none text-light rounded btn bg-danger" href="supprArticle.php?id=<?php echo($article["id"]) ?>&delete=true">Supprimer</a>
    </div>
</div>

<?php 
    include_once("../block/footer.php")
?>