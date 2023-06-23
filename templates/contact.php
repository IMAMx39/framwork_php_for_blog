
<?php

/**
 * @var FormBuilder $form
 */

use Core\Form\FormBuilder;

?>

<h1>Contact us</h1>

<?php echo $form->start(); ?>
<?php echo $form->row('username'); ?>
<?php echo $form->row('email'); ?>
<?php echo $form->row('subject'); ?>

<button type="submit"  value="submit" class="btn btn-primary mt-4 me-lg-4">Valider</button>
<?php echo $form->end(); ?>
