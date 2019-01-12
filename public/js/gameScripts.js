
$(function() {
    $('#quizButton').click(function(){
        let question =$('#questionId').val();
        let answer = $('input[name=answer]:checked').val();

        $.ajax({
            url: "game/check_answer.php",
            type: "POST",
            data: {question : question, answer : answer},
            success:function(data) {
                reloadNextQuestion()
            }
        });
    });
});

function reloadNextQuestion() {
    $("#quizField").load("/game/questions.php");
}
