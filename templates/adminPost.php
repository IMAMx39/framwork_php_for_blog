<?php

/**
 * @var FormBuilder $form
 */

use Core\Form\FormBuilder;

?>

<h1>Posts Manager</h1>

<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php echo $form->start(); ?>
                <?php echo $form->row('title'); ?>
                <?php echo $form->row('head'); ?>
                <?php echo $form->row('content'); ?>
                <button type="submit"  value="submit" class="btn btn-primary mt-4 me-lg-4">Valider</button>
                <?php echo $form->end(); ?>
            </div>
        </div>
    </div>
</main>

