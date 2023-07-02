<?php

/**
 * @var PostController $post
 * @var PostController $data
 * @var FormBuilder $form
 * @var array $errors
 */


use App\Controller\PostController;
use Core\Form\FormBuilder;

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

<div class="mb-4 container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <hr class="my-4"/>
            <h4>{{ session_username }}, donnez-nous votre avis :</h4>
            <br/>
            <form id="commentForm" action="/comment/add" method="post" data-sb-form-api-token="">
                <div class="form-group">
                    <div class="mb-0">
                                <textarea class="form-control" name="commentContent" rows="3"
                                          placeholder="Votre message"></textarea>
                        <small class="form-text text-muted"><em>Le commentaire sera validé par un modérateur
                                avant d'apparaître.</em></small>
                    </div>
                </div>
                <input type="hidden" name="postId" value="<?php echo $data['postId']?>">
                <br/>
                <div class="row justify-content-center">
                    <input type="submit" id="submitButton"
                           class="col-md-3 col-sm-6 btn btn-primary text-uppercase rounded" value='Envoyer'>
                </div>
            </form>

            <hr class="my-4"/>
            <h3>Commentaires publiés</h3>
            <hr class="my-4"/>
<!---->
<!--            <ul>-->
<!--                {% for com in comments %}-->
<!--                {% set approved = com.status is same as('approved') %}-->
<!---->
<!--                {# Comments and commands shown for admins #}-->
<!--                {% if session_isAdmin %}-->
<!--                <li class="alert alert-{{ approved ? "success" : "warning" }} rounded">-->
<!--                <span class="meta">-->
<!--                                Par <a href="#!">{{ com.author }}</a>, le {{ com.createdAt}}-->
<!--                            </span>-->
<!--                <p class="com-content">{{ com.content|nl2br }}</p>-->
<!--                <div class="form-buttons"-->
<!--                     style="margin-bottom: 0.5rem; display: flex;  justify-content: space-around;">-->
<!--                    {% if not approved %}-->
<!--                    <form action="/comment/approve" method="post">-->
<!--                        <input type="hidden" name="postId" value="{{ postId }}"/>-->
<!--                        <input type="hidden" name="commentId" value="{{ com.id }}"/>-->
<!--                        <input class="btn btn-success rounded"-->
<!--                               type="submit" value="Approuver"/>-->
<!--                    </form>-->
<!--                    {% else %}-->
<!--                    <button class="btn border border-secondary rounded" disabled>Approuvé</button>-->
<!--                    {% endif %}-->
<!--                    <form action="/comment/delete" method="post">-->
<!--                        <input type="hidden" name="postId" value="{{ postId }}"/>-->
<!--                        <input type="hidden" name="commentId" value="{{ com.id }}"/>-->
<!--                        <input class="btn btn-danger rounded"-->
<!--                               type="submit" value="Supprimer"-->
<!--                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');"/>-->
<!--                    </form>-->
<!---->
<!--                </div>-->

                <?php
                foreach ($data['comments'] as $comment) :?>
                <div class="card " style="margin-top: 1.5rem">
                    <div class="card-body">
                        <h4 class="card-title">Par <?php echo $comment->getAuthor(); ?></h4>
                        <h6 class="card-subtitle mb-2 text-muted">
                            le <?php echo $comment->getCreatedAt(); ?> </h6>
                        <p class="card-text"> <?php echo $comment->getContent(); ?> </p>
                    </div>
                </div>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>
