  <?php 
    $postData = $_POST;
    if (
        !isset($postData['email'])
        || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
        || empty($postData['message'])
        || trim($postData['message']) === ''
    ) {
        echo('il faut un email et un message valide pour soumettre le formulaire.');
        return;
    } 

    $isFileLoaded = false;

if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0 )
{
    if ($_FILES['screenshot']['size'] > 1000000 ) {
        echo "l'envoi n'a pas pu être effectué, erreur ou fichier trop volumineux";
        return;
    }


    $fileInfo = pathinfo($_FILES['screenshot']['name']);
    $extension = $fileInfo['extension'];
    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        if(!in_array($extension, $allowedExtensions)) {
            echo "l'envoi n'a pas pu être effectué, l'extension {$extension} n'est autorisée";
            return;
        }

    $path = __DIR__ . '/uploads/';
    if (!is_dir($path)) {
        echo "l'envoi n'a pas pu être effectué, le dossier uploads est manquant";
        return;
    }

    move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name']));
    $isFileLoaded = true;
}
?>


<!DOCTYPE <html>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> La recette - contact reçu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php require_once(__DIR__ . '/header.php'); ?>
    <h1>Bien reçu! 👨‍🍳</h1>
    <div class="card">
    <div class="card-body">
        <h5 class="card-title"> Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo $postData['email']; ?></p>
        <p class="card-text"><b>Message
        </b> : <?php echo (strip_tags($postData['message']));?></p>
        <?php if ($isFileLoaded) : ?>
            <div class="alert alert=sucess" role="alert">
            L'envoi a bien été effectué</div>
            <?php endif; ?>
</div>
</div>
</div>
</body>
</html>
