<?php 
    $title = "Login";
    include_once("utils/connectionDB.php");
    include_once("block/header.php");
    $errors =[];
    if (
        $_SERVER["REQUEST_METHOD"] === "POST" &&
        isset($_POST["username"], $_POST["password"]) // check if the form is validated
        ) {
            $query = $db->prepare('SELECT username, password FROM utilisateur WHERE username = :username');
            $query->execute([
                ":username" =>  $_POST["username"]
            ]);
            $user = $query->fetch();

            if($user !== false) { //check if user has been found
                if(password_verify($_POST["password"], $user["password"])){ 
                    // session_start(); the header should already had started the connection
    
                    $_SESSION["username"] = $user["username"];
            
                    header("Location: http://localhost/examphp/admin/index.php");
                } else {
                    $errors["global"] = "Nom d'utilisateur et/ou mot de passe incorrect"; // this line runs if the password was incorrect
                }
            } else {
                $errors['global'] = "Nom d'utilisateur et/ou mot de passe incorrect"; // this line runs if an user with the given username was NOT found in the database
            }  
    }
?>
<div class="d-flex justify-content-center align-items-center flex-column m-5">
    <h1><?php echo($title) ?></h1>

    <form action="login.php" method="POST"  class="d-flex justify-content-center align-items-center flex-column m-5">
        <label for="username" class="m-2">Username</label>
        <input type="text" name="username" id="username" class="m-2" required>
        <label for="password" class="m-2">Password</label>
        <input type="password" name="password" id="password" class="m-2" required>
        <?php 
            if(isset($errors['global'])) {
        ?>
            <p class="m-3" style="color: red"><?php echo($errors['global']) ?></p>
        <?php
            }
        ?>
        <input type="submit" value="Log in" class="m-3 btn rounded bg-primary text-light">
    </form>
</div>
<?php
    include_once("block/footer.php")
?>