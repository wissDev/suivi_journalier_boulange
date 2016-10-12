<?php 
require_once('view\parts\header.php');
?>
            <div id="connexion" >
                    <form method="post" class="form-connexion">
                        <label for="login">Login:</label>
                        <input type="text" name="login">
                        <br>
                        <label for="mot_de_passe">Mot de Passe:</label>
                        <input type="password" name="mot_de_passe">
                        <br>
                        <label for="code_securite">Code sécurité:</label>
                        <input type="password" name="code_securite">
                        <br>
                        <button type="submit" class="btn-form-connexion">Connexion</button>
                    </form>
            </div>

<?php
require_once('view\parts\footer.php');
include_once('controler\controleur.php');
?>
