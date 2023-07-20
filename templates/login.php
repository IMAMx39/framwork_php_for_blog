<?php

/**
 * @var FormBuilder $form
 * @var array $errors
 */

use Core\Form\FormBuilder;

?>

<h1>Login</h1>


<?php if ($errors !== []) : ?>
    <p style="padding: 0.5em; background-color: red; color: white"><?= implode(', ', $errors); ?></p>
<?php endif; ?>
<?= $form->start(); ?>
<?= $form->row('email'); ?>
<?= $form->row('password'); ?>

<button type="submit" value="submit" class="btn btn-primary mt-4 me-lg-4">Valider</button>
<?= $form->end(); ?>

