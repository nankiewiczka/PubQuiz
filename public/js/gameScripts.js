
$(function() {
    $('#quizButton').click(function(){
        let question =$('#questionId').val();
        let answer = $('input[name=answer]:checked').val();
        console.log(answer);
        console.log(question);

        $.ajax({
            url: "game/check_answer.php",
            type: "POST",
            data: {question : question, answer : answer},
            success:function(data) {
                console.log(data);
                reloadNextQuestion()
            }
        });
    });
});

function reloadNextQuestion() {
    $("#quizField").load("/game/questions.php");
}
