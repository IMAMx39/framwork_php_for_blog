<?php

/**
 * @var FormBuilder $form
 */

use Core\Form\FormBuilder;

?>

<h1>Register</h1>

<?php echo $form->start(); ?>
<?php echo $form->row('username'); ?>
<?php echo $form->row('email'); ?>

<button type="submit"  value="submit" class="btn btn-primary mt-4">Valider</button>
<?php echo $form->end(); ?>


