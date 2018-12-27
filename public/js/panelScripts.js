$(document).ready(
    function(){
        $("#addQuizButton").click(function () {
            $("#addQuizDiv").show("slow");
        });
    });


function createQuiz() {
    let name = $('#inputQuizName').val();
    let valid = true;
    console.log(name);
    $.ajax({
        type: "POST",
        url: "checkQuizAvailability.php",
        async: false,
        data: {name : name},
        success: function(data) {
            if (data != '0') {
                valid = false;
                $('#inputQuizName').css('background-color', '#178533');
            }
        }
    });

    console.log(valid);
    // if(aval) {
    //     $.ajax({
    //         type: "POST",
    //         url: "checkQuizAvailability.php",
    //         async: false,
    //         data: {name : name}
    //
    //     });
    // }

}
