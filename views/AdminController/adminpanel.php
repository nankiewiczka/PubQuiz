<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/panelScripts.js"></script>

<body>
<?php include(dirname(__DIR__).'/adminnav.html'); ?>


<header class="masthead text-center text-white">
    <div class="container">
        <div class="row">
            <h1 class="col-12 pl-0">ADMIN PANEL</h1>

            <h4 class="mt-4">All users:</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Login</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $user->getName(); ?></td>
                    <td><?= $user->getSurname(); ?></td>
                    <td><?= $user->getLogin(); ?></td>
                    <td><?= $user->getRole(); ?></td>
                    <td>-</td>
                </tr>
                </tbody>
                <tbody class="users-list">
                </tbody>
            </table>
            <div class="col-sm-7">
            <button class="btn btn-primary btn-lg float-right submitButton" type="button" onclick="getUsers()">Get all users</button>
            </div>
        </div>
    </div>
</header>
<?php include(dirname(__DIR__).'/foot.html'); ?>


</body>
</html>
