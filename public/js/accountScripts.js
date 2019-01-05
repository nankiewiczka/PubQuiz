
$(document).on('click','#createTeamButton',function(){
    $("#addTeamDiv").show("slow");
});


$(document).on('input','#inputMember',function(){
    listFilter($('#list'), $('.search-filter'))

});

$(document).on('click','#addMemberButton',function(){
    let userLogin = $('input[name=memberToAdd]:checked').val();
        let team = $('#teamName').val();

    if(userLogin) {
        $.ajax({
            type: "POST",
            url: "teamManagement/add_member.php",
            data: {name: userLogin, team : team },
        });
    }

    $("#userPanel").load("/views/user_panel_content.php")
});

$(document).on('click','#deleteMemberButton',function(){
    let memberLogin = $(this).attr("value")
    let team = $('#teamName').val();

    $.ajax({
        type: "POST",
        url: "teamManagement/delete_member.php",
        data: {name: memberLogin, team : team },
    });

    $("#userPanel").load("/views/user_panel_content.php")
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

