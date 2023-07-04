<?php

/**
 * @var AdminController $posts
 * @var AdminController $data
 * @var Comment $comment
 */

use App\Controller\Admin\AdminController;
use App\Model\Comment;

?>

<main class="mb-4 card-list" style="margin-bottom: 1.5rem">
    <div class="container px-4 px-lg-5" style="margin-top: 3rem">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="row justify-content-center card-list" >
                    <a class="col-md-4 col-sm-4" href="/admin/users">
                        <button class="btn btn-primary rounded">Utilisateurs</button>
                    </a>
                    <a class="col-md-4 col-sm-4 col-px-4" href="/admin/edit">
                        <button class="btn btn-primary rounded">Nouveau Post</button>
                    </a>
                </div>
            </div>
            <hr class="my-4" />
            <?php
            foreach ($data['posts'] as $post) :?>

            <div class="post-preview text-center" style="margin-bottom: 1.5rem; ">
                <div href="/articles/<?php echo $post->getID()?>">
                    <h2 class="post-title" style="margin-top:0;"><?php echo $post->getTitle()?></h2>
                </div>
                <div class="post-meta">
                    Par <a href="#0"><?php echo $post->getAuthor(); ?></a> le  <?php echo $post->getCreatedAt(); ?>
                </div>
                <?php if ($post->getComments() == 'not_Approved'){?>
                    <?php  ?>
                <?php }?>

                <?php  ?>
                <div class="border border-secondary rounded alert alert-warning">
                    <a href="/articles/<?php echo $post->getID()?>">
                        Commentaires en attente : <strong><?php echo count($post->getComments())?></strong>
                    </a>
                </div>
                <?php { ?>
                <div class="alert alert-dismissible alert-info">
                    Aucun commentaire en attente
                </div>
                <?php } ?>
            </div>
                <div class="form-buttons" style="display: flex; justify-content: space-around;">
                    <form action="/admin/edit" method="post">
                        <input type="hidden" name="postId" value="<?php echo $post->getID()?>" />
                        <input class="btn btn-info rounded" type="submit" value="Éditer" />
                    </form>

                    <a class="" href="/articles/<?php echo $post->getID()?>">
                        <button class="btn btn-primary rounded">Voir</button>
                    </a>

                    <form action="/admin/delete" method="post">
                        <input type="hidden" name="postId" value="<?php echo $post->getID()?>" />
                        <input class="btn btn-danger rounded" type="submit" value="Supprimer"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer : <?php echo $post->getTitle()?>?');"/>
                    </form>
                </div>
            <hr class="my-4" />
            <?php endforeach; ?>
        </div>
    </div>
</main>