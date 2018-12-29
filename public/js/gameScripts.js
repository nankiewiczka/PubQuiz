
$(function() {
    $('#quizButton').click(function(){
        //TODO post sprawdz answer
        //TODO walidacja czy coś wybrano
        let question =$('#questionId').val();

        let valA = $('input[name=answerA]:checked').val();
        let valB = $('input[name=answerB]:checked').val();
        let valC = $('input[name=answerC]:checked').val();
        let valD = $('input[name=answerD]:checked').val();
        let answer = null;
        let array = [valA, valB,valC,valD];
        for(i=0; i<array.length; i++) {
            if(array[i] == 'on') {
                answer = i+1;
                break;
            }

        }
        console.log(answer);
        // console.log(valA);
        // console.log(valB);
        // console.log(valC);
        // console.log(valD);
        console.log(question);

        $.ajax({
            url: "/game/check_answer.php",
            type: "POST",
            data: {question : question, answer : answer},
            success:function(data) {
                console.log(data);
                nextQuestion()
            }
        });
    });
});

function nextQuestion() {
    $("#gameField").load("/views/game.php");
}
