<?php require_once (__DIR__ . "/variables.php"); ?>
<?php if (!isset($_SESSION['LOGGED_USER'])): ?>
    <form action="submit_login.php" method="POST">
        <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help"
                placeholder="you@recette.fr">
            <div id="email-help" class="form-text"> Il s'agit de l'email utilisé lors de la création du compte</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" aria-descriedby="password-help">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
         <?php else: ?>
             <div class="alert alert-success" role="alert">
    Bonjour <?php echo $_SESSION['LOGGED_USER']['email']; ?> et bienvenue sur le site!
    </div>
<?php endif; ?>