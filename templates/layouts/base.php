<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC Framework</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/journal/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/journal/_variables.scss">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="/register">Register</a></li>
                <li class="nav-item"><a class="nav-link active" href="/contact">Contact</a></li>
            </ul>
            <?php use App\repository\UserRepository;

            if (!UserRepository::userIsConnected()) { ?>
                <ul class="navbar-nav  me-lg-4 ">
                    <li class="nav-item"><a class="nav-link active" href="/login">Login</a></li>
                </ul>
            <?php };
            ?>
            <div class="">
                <?php if (UserRepository::userIsConnected()) {
                   echo ' <ul class="navbar-nav  me-lg-4 ">
                    <li class="nav-item"><a class="nav-link active" href="/logout">Logout</a></li>
                </ul>';
                }; ?>
            </div>

        </div>
    </div>
</nav>
<div class="container" style="margin-bottom: 34rem">
    {{ content }}
</div>

<footer class="navbar-expand-lg bg-primary">
    <div class="d-flex align-items-center justify-content-evenly">
    </div>
</footer>

</body>
</html>
