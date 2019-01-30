<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>

<body>
<?php include("header.php")?>

<!--Formulaire d'inscription -->
    <h1>S'enregistrer</h1>
    <div class="container1">
        <form method="POST" action="">
            <div class="form-row justify-content-md-center">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">email</label>
                <input type="email" class="form-control" id="validationDefault01" placeholder="email" name="email" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">mot de passe</label>
                <input type="password" class="form-control" id="validationDefault02" placeholder="mdp" name="mdp" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefaultUsername">Pseudo</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                </div>
                <input type="text" class="form-control" id="validationDefaultUsername" placeholder="pseudo" name="pseudo" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
            </div>
        
            <button class="btn btn-primary" type="submit" name="inscription">S'inscrire</button>
        </form>
    </div>

<!-- connexion base de données -->
<?php include("connectData.php")?>

<!-- ajout dans la base de donnée -->
<?php
if(isset($_POST['inscription'])){
        $pass_hache = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $email = $_POST["email"];


        
        $insertDB = $bdd -> prepare("INSERT INTO membre (pseudo_quest, email_quest, mdp_quest) VALUES (:pseudo, :email, :mdp)");
        $insertDB->execute(array(
            'pseudo' => $pseudo,
            'email' => $email,
            'mdp' => $pass_hache));

        echo '<h4 class="txtInscrit">'.'Vous êtes inscrit ! Genial !'.'</h4>';
        echo '<a class="btn btn-primary" href="index.php" role="button">'.'Accueil'.'</a>';

    } else ;
    
// }
?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>
