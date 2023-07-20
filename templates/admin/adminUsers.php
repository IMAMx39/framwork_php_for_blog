<?php

/**
 * @var AdminController $usersLastname
 * @var AdminController $usersPseudo
 * @var AdminController $usersEmail
 * @var AdminController $usersFirstname
 * @var AdminController $users
 * @var AdminController $data
 */

use App\Controller\Admin\AdminController;

?>
<div>
    <h1>Hello Admin</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Pseudo</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">action</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($data['users'] as $user) : ?>
            <?= $banned = $user->getStatus() == 'banned' ?>
            <?= $text = $banned ? 'Banni' : 'Visiteur' ?>
            <?= $btnClass = $banned ? 'btn-outline-success' : 'btn-outline-danger' ?>
            <?= $btnText = $banned ? 'Débannir' : 'Bannir' ?>
            <?= $statusValue = $banned ? 'visitor' : 'banned' ?>

            <form action="/admin/userstatus" method='post'>
                <tr class="table-success">
                    <th><input type="hidden" name="userPseudo"
                               value="<?= $user->getPseudo(); ?>"/><?= $user->getPseudo(); ?></th>
                    <td> <?= $user->getFirstname(); ?></td>
                    <td> <?= $user->getLastname(); ?></td>
                    <td> <?= $user->getEmail(); ?></td>
                    <input type="hidden" name="userStatus" value="<?= $statusValue ?>"/> <?= $statusValue; ?>
                    <td><input type="submit" class="btn <?= $btnClass ?>" value="<?= $btnText ?>"
                               onclick="return  confirm('Êtes-vous sûr de vouloir [<?= $btnText ?>] <?= $user->getPseudo(); ?> ?'); "/>
                    </td>
                </tr>
            </form>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>
