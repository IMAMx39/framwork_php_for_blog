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
use App\Controller\HomeController;

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
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data['users'] as $user) :?>
            <tr class="table-success">
                <th><?php echo $user->getPseudo(); ?></th>
                <td> <?php echo $user->getFirstname(); ?></td>
                <td> <?php echo $user->getLastname(); ?></td>
                <td> <?php echo $user->getEmail(); ?></td>
                <td> <?php echo $user->getStatus();?></td>
                <td> <a href="" type="button" class="btn btn-outline-success">Bannir</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>


</div>
