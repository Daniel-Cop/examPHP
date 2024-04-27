<?php 
    $title = "New Article";
    include_once("../utils/connectionDB.php");
    include_once("../block/header.php");
    include_once("../block/navbar.php");
    $errors = [];
    if(
        $_SERVER["REQUEST_METHOD"]==="POST" && 
        isset($_POST["titre"], $_POST["auteur"], $_POST["contenu"])
        ) {
            $targetFile = "";
            // error check
            if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {

                // size check
                if ($_FILES['image']['size'] <= 1000000)
                {
                    // extension check
                    $extension = strtolower(pathinfo("imgs/".basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'webp', 'avif');
                    if (in_array($extension, $extensions_autorisees))
                    {
                        $targetDirectory = "imgs/";
                        $imgName = rtrim($_FILES['image']['name'], ".".$extension);
                        $uniqueName = $imgName."-".uniqid().".".$extension;
                        $_FILES["image"]["name"] = $uniqueName;
                        $targetFile = $targetDirectory.basename($_FILES["image"]["name"]);

                        move_uploaded_file($_FILES['image']['tmp_name'], "../".$targetFile);
                        echo ("L'envoi a bien été effectué !");
                    } else {
                        echo('J\'accepte que les images ...');
                    }
                } else {
                    echo('Le fichier est trop lourd pour un petit serveur ... ');
                }
            }

        $query = $db->prepare('INSERT INTO annonce(titre, auteur, contenu, imageUrl ,datePublication)
         VALUES(:titre, :auteur, :contenu, :imageUrl, NOW())');
         $query->execute([
            ":titre" => $_POST["titre"],
            ":auteur" => $_POST["auteur"],
            ":contenu" => $_POST["contenu"],
            ":imageUrl" => $targetFile
         ]);
         header("Location: http://localhost/examphp/admin/index.php");
    } else {
        $errors['global'] = "Un des champs obligatoires n'a pas été rempli.";
    }
?>
<a class="position-absolute m-5 text-decoration-none text-light rounded btn bg-secondary" href="index.php">< Retour</a>
<div class="container d-flex flex-column justify-content-center align-items-center">

    <h1 class="text-center m-5"><?php echo ($title ?? "Default Title") ?></h1>

    <form action="ajoutArticle.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column justify-content-center align-items-center">
        <div class="m-3">
            <label for="titre" class="fs-4 fw-bold">Titre :</label>    
            <input class="me-5" type="text" name="titre" id="titre" placeholder="Titre" required>
            <label for="auteur" class="fs-4 fw-bold">Auteur :</label>
            <input class="me-5" type="text" name="auteur" id="auteur" placeholder="Auteur" required>
            <label for="image" class="fs-4 fw-bold">Image <span class="fw-normal fst-italic fs-5">(facultatif)</span> :</label>
            <input class="" type="file" name="image" id="image" placeholder="Choisie une image">
        </div>
        <textarea class="m-3" type="text" name="contenu" id="contenu" cols="120" rows="12" required></textarea>
        <input class="btn rounded bg-primary text-light m-3" type="submit" value="Ajout">
    </form>
</div>

<?php include_once("../block/footer.php") ?>