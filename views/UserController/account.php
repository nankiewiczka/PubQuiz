<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/accountScripts.js"></script>


<body>
<?php include(dirname(__DIR__) . '/usernav.html'); ?>

<header class="masthead text-center text-white">
    <h1>USER PAGE</h1><br>
    <div id="userPanel">
        <?php include(dirname(__DIR__).'/user_panel_content.php'); ?>

    </div>

    <div id="addTeamDiv">
        <div class="col-sm-5 offset-sm-3">
            <div class="form-group row">
                <label for="inputName" class="col-sm-4 col-form-label">Team name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputTeamName" name="teamName" placeholder=" " required/>
                </div>
                <input type="submit" onClick = "createTeam()" value="+" class="btn btn-primary btn-lg float-left submitButton" />

            </div>
        </div>

</header>

<?php include(dirname(__DIR__) . '/foot.html'); ?>

</body>
</html>