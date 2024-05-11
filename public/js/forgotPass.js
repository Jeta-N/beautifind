function checkEmail() {
    const email = document.getElementById('email').value
    axios.post('/check-email', {
        email: email
    }).then(function (response) {
        if (response.data == 404) {
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.classList.remove('d-none');
            errorMessage.classList.add('d-block');
        } else {
            const checkEmail = document.getElementById('checkEmail');
            checkEmail.classList.add('d-none');
            const securityQuestion = document.getElementById('securityQuestion');
            securityQuestion.classList.remove('d-none');

            const question = document.getElementById('question');
            question.innerHTML = `Question: ${response.data.securityQuestion.security_question.sq_question}`;

            const user_id = document.getElementById('user_id');
            user_id.value = response.data.account.user.user_id;
        }
    });
}

function checkAnswer() {
    const answer = document.getElementById('answer').value;
    axios.post('/check-answer', {
        answer: answer,
        user_id: document.getElementById('user_id').value
    }).then(function (response) {
        if (response.data == 404) {
            const errorAnswerMessage = document.getElementById('errorAnswerMessage');
            errorAnswerMessage.classList.remove('d-none');
            errorAnswerMessage.classList.add('d-block');
        } else {
            const changePassword = document.getElementById('changePassword');
            changePassword.classList.remove('d-none');
            const securityQuestion = document.getElementById('securityQuestion');
            securityQuestion.classList.add('d-none');

            const acc_id = document.getElementById('acc_id');
            acc_id.value = response.data.account.account_id;
        }
    });
}
