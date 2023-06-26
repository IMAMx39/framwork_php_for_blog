<?php

/**
 * @var FormBuilder $form
 */

use Core\Form\FormBuilder;

?>

<h1>Login</h1>

<?php use App\repository\UserRepository;


if (!UserRepository::userIsConnected()) { ?>

    <?php echo $form->start(); ?>
    <?php echo $form->row('email'); ?>
    <?php echo $form->row('password'); ?>

    <button type="submit" value="submit" class="btn btn-primary mt-4 me-lg-4">Valider</button>
    <?php echo $form->end(); ?>
<?php }


if (UserRepository::userIsConnected()) { ?>
    <h1>Welcome</h1>
<?php }

?>

