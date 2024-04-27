<?php 
if (!isset($_GET["id"])){
    header("Location: http://localhost/examphp/index.php");
}
include_once("utils/connectionDB.php");
$query = $db->prepare('SELECT * FROM annonce WHERE id = :id');
$query->execute([
    ":id" => $_GET["id"]
]);
$article = $query->fetch();
$title = $article["titre"];
include_once("block/header.php");
if ($article["imageUrl"]=== "") { // if the article does not have an image it show the default dauphine logo
    $img = "imgs/dauphine_logo.jpg";
} else {
    $img = $article["imageUrl"];
}
?>
    <a class="position-absolute m-5 text-decoration-none text-light rounded btn bg-secondary" href="index.php">< Retour</a>
<div class="d-flex flex-column align-items-center">

    <h1 class="m-5"><?php echo($article["titre"]) ?></h1>
        <img class="float-left col-3 img-thumbnail img-fluid rounded" src="<?php echo($img) ?>" alt="">
        <p class="align-self-end me-5 text-secondary fs-5"><?php echo(date('j F Y', strtotime($article["datePublication"]))) ?></p>
        <p class="m-5 fs-5"><?php echo($article["contenu"]) ?></p>
        <p class="align-self-end me-5 text-secondary fs-4"><?php echo(" - ".$article["auteur"]) ?></p>
</div>

<?php 
    include_once("block/footer.php");
?>