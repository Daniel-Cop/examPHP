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

        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["titre"], $_POST["auteur"], $_POST["contenu"])){

            $targetFile = $article["imageUrl"]; // in case a new image was not added, the old stay
            if(isset($_FILES["imageUrl"]) && $_FILES["imageUrl"]["error"] === 0) {

                if ($_FILES['imageUrl']['size'] <= 1000000)
                {
                    
                    $extension = strtolower(pathinfo("imgs/".basename($_FILES["imageUrl"]["name"]),PATHINFO_EXTENSION));
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'webp', 'avif');
                    if (in_array($extension, $extensions_autorisees))
                    {   
                        $targetDirectory = "imgs/";
                        $imgName = rtrim($_FILES['imageUrl']['name'], ".".$extension);
                        $uniqueName = $imgName."-".uniqid().".".$extension;
                        $_FILES["imageUrl"]["name"] = $uniqueName;
                        $targetFile = $targetDirectory.basename($_FILES["imageUrl"]["name"]);
                        unlink("../".$article["imageUrl"]); // delete old image
                        move_uploaded_file($_FILES['imageUrl']['tmp_name'], "../".$targetFile);
                        echo ("L'envoi a bien été effectué !");
                    } else {
                        echo('J\'accepte que les images ...');
                    }
                } else {
                    echo('Le fichier est trop lourd pour un petit serveur ... ');
                }
            }

            $queryModify = $db->prepare('UPDATE annonce SET titre = :titre, auteur = :auteur, contenu = :contenu, imageUrl = :imageUrl WHERE id = :id');
            $queryModify->execute([
                ":titre" => $_POST["titre"],
                ":auteur" => $_POST["auteur"],
                ":contenu" => $_POST["contenu"],
                ":imageUrl" => $targetFile,
                ":id" => $_GET["id"]
            ]);
            header("Location: http://localhost/examphp/admin/detailsArticle.php?id=".$_GET["id"]);
        }
?>
<a class="position-absolute m-5 text-decoration-none text-light rounded btn bg-secondary" href="detailsArticle.php?id=<?php echo($article["id"]) ?>">< Retour</a>
<h1 class="text-center m-5">Modification article <br>"<span class="fw-bold"><?php echo($article["titre"]) ?></span>"</h1>
<form action="modArticle.php?id=<?php echo($article["id"]) ?>" method="POST" enctype="multipart/form-data" class="d-flex flex-column justify-content-center align-items-center">
    <div calss="m-3">
        <label for="titre" class="fs-4 fw-bold"> Titre :</label>
        <input class="me-5" type="text" name="titre" id="titre" value="<?php echo($article["titre"]) ?>">
        <label for="auteur" class="fs-4 fw-bold">Auteur :</label>
        <input class="me-5" type="text" name="auteur" id="auteur" value="<?php echo($article["auteur"]) ?>">
        <label for="image" class="fs-4 fw-bold">Image <span class="fw-normal fst-italic fs-5">(facultatif)</span> :</label>
        <input class="" type="file" name="imageUrl" id="imageUrl">
    </div>
        <textarea class="m-3" name="contenu" cols="120" rows="12"><?php echo($article["contenu"]) ?></textarea>
        <input type="submit" value="Appliquer" class="m-3 btn rounded bg-primary text-light">
</form>
<?php 
    include_once("../block/footer.php")
?>