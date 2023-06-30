<?php

/**
 * @var PostsListController $posts
 * @var PostsListController $data
 */

use App\Controller\PostsListController;

?>
<h1>Les posts</h1>

<?php
foreach ($data['posts'] as $post) :?>
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $post->getTitle(); ?></h4>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $post->getHead(); ?></h6>
                    <a href="/articles/<?php echo $post->getId(); ?>" class="card-link">Voir plus</a>
                </div>
                <div class="card-footer text-muted">
                   Par <a href="#"> <?php echo $post->getAuthor(); ?> </a>  le  <?php echo $post->getCreatedAt(); ?></div>
            </div>
        </div>
    </main>
<?php endforeach; ?>

