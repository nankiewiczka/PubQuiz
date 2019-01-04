$(document).ready(
    function(){
        $("#createTeamButton").click(function () {
            $("#addTeamDiv").show("slow");
        });

        $("#addMemberButton").click(function () {
            $.ajax({
                type: "POST",
                url: "teamManagement/add_member.php",
                data: {name: name}
            }); //TODO after success reload div with members
        });

        listFilter($('#list'), $('.search-filter'));
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


function listFilter(list, input) {
    let $lbs = list.find('.memberLabel');

    function filter(){
        let regex = new RegExp('\\b' + this.value);
        let $els = $lbs.filter(function(){
            return regex.test($(this).text());
        });
        $lbs.not($els).hide().prev().hide();
        $els.show().prev().show();
    }

    input.keyup(filter).change(filter)
}

