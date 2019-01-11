
$(document).on('click','#addQuizButton',function(){
    $("#addQuizDiv").css('visibility', 'visible');
});


function getUsers() {
    const apiUrl = "http://localhost:8080";
    const $list = $('.users-list');

    $.ajax({
        url : apiUrl + '/?page=admin_users',
        dataType : 'json'
    })
        .done((res) => {
            console.log(res);
            $list.empty();
            //robimy pętlę po zwróconej kolekcji
            //dołączając do tabeli kolejne wiersze
            res.forEach(el => {
                $list.append(`<tr>
                    <td>${el.name}</td>
                    <td>${el.surname}</td>
                    <td>${el.login}</td>
                    <td>${el.role}</td>
                    <td>
                    <button class="btn btn-danger" type="button" onclick="deleteUser(${el.id_user})">
                        <i class="material-icons">delete_forever</i>
                    </button>
                    </td>
                    </tr>`);
            })
        });
}

function deleteUser(id) {
    if (!confirm('Do you want to delete this user?')) {
        return;
    }

    const apiUrl = "http://localhost:8080";

    $.ajax({
        url : apiUrl + '/?page=admin_delete_user',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            alert('Selected user successfully deleted from database!');
            getUsers();
        }
    });
}


function createQuiz() {
    let name = $('#inputQuizName').val();
    let valid = true;
    $.ajax({
        type: "POST",
        url: "?page=check_quiz_available",
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
            url: "?page=add_quiz",
            data: {
                name : name
            }

        });

        $("#quizListForAdmin").load("/views/load_quizes_for_admin.php");
        $("#addQuizDiv").css('visibility', 'hidden');
        $("#inputQuizName").val('');
    }
}

function startQuiz(id) {
    if (!confirm('Do you want to start this quiz?')) {
        return;
    }

    const apiUrl = "http://localhost:8080";

    $.ajax({
        url : apiUrl + '/?page=start_quiz',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            alert('Selected quiz successfully started');
            $("#quizListForAdmin").load("/views/load_quizes_for_admin.php");
        }
    });
}

function endQuiz(id) {
    if (!confirm('Do you want to end this quiz?')) {
        return;
    }

    const apiUrl = "http://localhost:8080";

    $.ajax({
        url : apiUrl + '/?page=end_quiz',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            alert('Selected quiz successfully started!');
            $("#quizListForAdmin").load("/views/load_quizes_for_admin.php");
        }
    });
}