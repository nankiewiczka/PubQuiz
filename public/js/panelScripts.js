$(document).ready(
    function(){
        $("#addQuizButton").click(function () {
            $("#addQuizDiv").show("slow");
        });
    });


function createQuiz() {
    let name = $('#inputQuizName').val();
    let date = $('#inputQuizDate').val();
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
    if(valid) {
        $.ajax({
            type: "POST",
            url: "add_quiz.php",
            data: {
                name : name,
                date:date
            }

        });
    }

    $("#quizListForAdmin").load("/views/load_quizes_for_admin.php");
    $("#addQuizDiv").hide();

}
