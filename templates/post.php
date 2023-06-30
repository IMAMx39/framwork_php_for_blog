<?php

/**
 * @var PostController $post
 */

use App\Controller\PostController;

?>

<h1>Le post</h1>
<!-- Post Content -->
<article class="mb-4 container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="card border-primary bg-light  mb-auto justify-content-between" style="max-width: 80rem; margin-top: 3rem">
                <div class="card-header"><?php echo $post->getTitle(); ?></div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $post->getHead(); ?></h4>
                    <p class="card-text"><?php echo $post->getContent(); ?></p>
                </div>
                <div class="card-footer text-muted">
                    Par <a href="#!"><?php echo $post->getAuthor(); ?></a> Le <?php echo $post->getCreatedAt() ?>
                    <?php if ($post->getUpdatedAt() !== null) { ?>
                         <small>Modifié le </small><span><?php echo $post->getUpdatedAt() ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</article>