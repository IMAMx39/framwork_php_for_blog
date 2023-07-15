<?php

/**
 * @var FormBuilder $form
 * @var array $data
 * @var Post $post
 */

use App\Model\Post;
use Core\Form\FormBuilder;

?>

<h1><?php echo $data['title'] ?></h1>

<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

            <?= $data['post'] = $post ?>
            <?= $title = $post ? $post->getTitle() : 'Titre' ?>
            <?= $head = $post ? $post->getHead() : 'Chapo' ?>
            <?= $content = $post ? $post->getContent() : 'Contenu du Post' ?>
            <form class="justify-content-center" action="/admin/articles" method="post">
                <input type="hidden" name="postId" value="<?=$post ? $post->getId() : 0 ?>" />
                <input class="form-control" name="title" type="text" placeholder="<?= $title ?>" value="<?= $post ? $title : '' ?>"/>
                <textarea class="form-control" name="head" placeholder="<?= $head?>" style="height: 6rem"><?= $post ? $head : ''?></textarea>
                <textarea class="form-control" name="content" placeholder="<?= $content?>" style="height: 18rem"><?= $post ? $content : ''?></textarea>
                <input type="submit" class="btn btn-primary text-uppercase" value='Enregistrer'>
            </form>
        </div>
    </div>
</main>

