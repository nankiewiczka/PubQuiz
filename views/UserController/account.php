<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>
<script src="../../public/js/accountScripts.js"></script>


<body>
<?php include(dirname(__DIR__) . '/bar.html'); ?>

<h1>STRONA UŻYTKOWNIKA</h1>
<div id="userPanel">
    <?php include(dirname(__DIR__).'/user_panel_content.php'); ?>

</div>

    <div id="addTeamDiv">
        <div class="form-group row">
            <label for="inputName" class="col-sm-1 col-form-label">Team name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="inputTeamName" name="teamName" placeholder=" " required/>
            </div>
        </div>
        <input type="submit" onClick = "createTeam()" value="Create" class="btn btn-primary btn-lg float-left submitButton" />
    </div>

</body>
</html>