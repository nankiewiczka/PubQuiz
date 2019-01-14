
$(document).on('click','#createTeamButton',function(){
    $("#addTeamDiv").show("slow");
    $("#createTeamButton").css('visibility', 'hidden');
});


$(document).on('input','#inputMember',function(){
    listFilter($('#list'), $('.search-filter'))

});

$(document).on('click','#addMemberButton',function(){
    if (!confirm('Do you want to add this user?')) {
        return;
    }

    let userLogin = $('input[name=memberToAdd]:checked').val();
        let team = $('#teamName').val();

    if(userLogin) {
        $.ajax({
            type: "POST",
            url: "?page=add_member",
            data: {name: userLogin, team : team },
            success: function() {
                $("#userPanel").load("/views/user_panel_content.php");
            }
        });
    }

});

$(document).on('click','#deleteMemberButton',function(){
    if (!confirm('Do you want to delete this user?')) {
        return;
    }

    let memberLogin = $(this).attr("value")
    let team = $('#teamName').val();

    $.ajax({
        type: "POST",
        url: "?page=delete_member",
        data: {name: memberLogin, team : team },
        success: function() {
            $("#userPanel").load("/views/user_panel_content.php");
        }
    });

});

function createTeam() {
    let name = $('#inputTeamName').val();
    let valid = true;
    $.ajax({
        type: "POST",
        url: "?page=check_team_available",
        async: false,
        data: {name : name},
        success: function(data) {
            if (data != '0') {
                valid = false;
                $('#inputTeamName').css('background-color', '#f7f4ea');
            }
        }
    });

    if(valid) {
        $.ajax({
            type: "POST",
            url: "?page=add_team",
            data: {
                name : name,
            },
            success: function(data) {
                if (data != '0') {
                    $('#inputTeamName').css('background-color', '#f7f4ea');
                }
            }

        });

        $("#userPanel").load("/views/user_panel_content.php");
        $("#addTeamDiv").hide();
    }

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


