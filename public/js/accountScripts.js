$(document).ready(
    function(){
        $("#createTeamButton").click(function () {
            $("#addTeamDiv").show("slow");
        });
    });

function createTeam() {
    let name = $('#inputTeamName').val();
    let valid = true;
    // console.log(name);
    // $.ajax({
    //     type: "POST",
    //     url: "checkTeamAvailability.php",
    //     async: false,
    //     data: {name : name},
    //     success: function(data) {
    //         if (data != '0') {
    //             valid = false;
    //             $('#inputTeamName').css('background-color', '#178533');
    //         }
    //     }
    // });

    // console.log(valid);
    if(valid) {
        console.log(valid);
        $.ajax({
            type: "POST",
            url: "?page=account",
            data: {name : name}

        });
    }

}