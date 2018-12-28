$(document).ready(
    function(){
        $("#createTeamButton").click(function () {
            $("#addTeamDiv").show("slow");
        });
    });

function createTeam() {
    let name = $('#inputTeamName').val();
    let valid = true;
    console.log(name);
    $.ajax({
        type: "POST",
        url: "checkTeamAvailability.php",
        async: false,
        data: {name : name},
        success: function(data) {
            if (data != '0') {
                valid = false;
                $('#inputTeamName').css('background-color', '#178533');
            }
        }
    });

    if(valid) {
        $.ajax({
            type: "POST",
            url: "add_team.php",
            data: {
                name : name,
            }

        });
    }

    $("#userPanel").load("/views/user_panel_content.php");
    $("#addTeamDiv").hide();


}
