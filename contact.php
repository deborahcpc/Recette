<!DOCTYPE html>
<html>

<head>
<meta chartset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-.e=1.0">
<title>La recette - La page d'accueil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">   
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php require_once( __DIR__ . '/header.php'); ?>
<h1> Nous contacter </h1>
<form>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
    <div id="email-help" class="form-text"> On garde votre email pour nous. </div>
</div>
<div class="mb-3">
    <label for="message" class="form-label"> Votre message</label>
    <textarea class="form-control" placeholder="Exprimez vous" id="message" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
        <?php require_once(__DIR__ . '/submit_contact.php'); ?>
    </div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>


</html>