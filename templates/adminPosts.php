<h1>Posts Manager</h1>

<main class="mb-4 card-list">
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

                <hr class="my-4" />

                <div class="post-preview text-center">
                    <div class="list-group">
                        <h3 href="#" class="list-group-item list-group-item-action disabled">{{post.title}}</h3>
                    </div>
                    <div class="card-footer text-muted">
                        Par <a href="#0">{{post.author}}</a> le {{post.createdAt}}
                    </div>



                    <div class="border border-secondary rounded alert alert-warning">
                        <a href="/post/{{post.id}}">
                            Commentaires en attente : <strong></strong>
                        </a>
                    </div>
                    <div class="alert alert-dismissible alert-info">
                        Aucun commentaire en attente
                    </div>

                </div>

                <div class="form-buttons" >
                    <form action="/admin/edit" method="post">
                        <input type="hidden" name="postId" value="{{post.Id}}" />
                        <input class="btn btn-info rounded" type="submit" value="Éditer" />
                    </form>

                    <a class="" href="/post/{{post.Id}}">
                        <button class="btn btn-primary rounded">Voir</button>
                    </a>

                    <form action="/admin/delete" method="post">
                        <input type="hidden" name="postId" value="{{post.Id}}" />
                        <input class="btn btn-danger rounded" type="submit" value="Supprimer"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer : \n{{ post.title }}?');"/>
                    </form>
                </div>

                <hr class="my-4" />

            </div>
        </div>
    </div>
</main>