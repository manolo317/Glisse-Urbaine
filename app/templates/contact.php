<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 05/01/2017
 * Time: 11:40
 */
?>

<div id="corps" >
    <h2 class="contact">Contact par mail :</h2>
    <p>Les champs obligatoires sont indiqués avec *</p>
    <br>
    <?php if(!empty($_SESSION['errors'])): ?>
        <?= implode('<br>', $_SESSION['errors']); ?>
    <?php endif; ?>
    <?php if(array_key_exists('success',$_SESSION)): ?>
        <p>Votre email à bien été transmis !</p>
    <?php endif; ?>
    <form method="post">
        <div>
            <label class="contact" for="name"><strong>Nom* :</strong></label>
            <input required type="text" name="name" id="name" value="">
        </div>
        <br>
        <div>
            <label class="contact" for="email"><strong>Adresse de messagerie* :</strong></label>
            <input required type="email" name="email" id="email" value="">
        </div>
        <br>
        <div>
            <label class="contact" for="message"><strong>Votre message* :</strong></label>
            <textarea required id="message" name="message" rows="10" cols="23"></textarea>
        </div>

        <br>
        <button type='submit'>Envoyer</button>
    </form>
</div>

<?php
unset($_SESSION['inputs']); // on nettoie les données précédentes
unset($_SESSION['success']);
unset($_SESSION['errors']);
