
<h2 class="text-center" style="margin-bottom: 2rem">Chat-dev, could you provide me with a keyboard? <br> I will create some regex for you.</h2>
<p class="mt-5">I found what I need. And it's not friends, it's things.
    Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what would appear to be some
    sort of cruel muslin and the cute little pom-pom curtain pull cords. Cruel though they may be… I've got to find
    a way to escape the horrible ravages of youth. Suddenly, I'm going to the bathroom like clockwork, every three
    hours. And those jerks at Social Security stopped sending me checks. Now 'I'' have to pay ''them'!
    Incidentally, you have a dime up your nose. Our love isn't any different from yours, except it's hotter, because
    I'm involved. Leela's gonna kill me. Who said that? SURE you can die! You want to die?!</p>
<div class="d-flex justify-content-center">
    <a href="" class="mt-4 btn btn-primary">My resume</a>
</div>

<div class="row mt-5 justify-content-md-center" id="contact">
    <div class="col-6">
        <h2 class="text-center">Send me a message</h2>
        <?php

        /**
         *  @var FormBuilder $form
         */

        use Core\Form\FormBuilder;

        ?>

        <?php echo $form->start(); ?>
        <?php echo $form->row('username'); ?>
        <?php echo $form->row('email'); ?>
        <?php echo $form->row('subject'); ?>

        <button type="submit"  value="submit" class="btn btn-primary mt-4 me-lg-4">Valider</button>
        <?php echo $form->end(); ?>
    </div>
</div>
