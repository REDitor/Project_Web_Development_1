function showFeedbackMessage(message, textColor, elementId) {
        const feedbackMessage = document.getElementById(elementId);
        feedbackMessage.innerHTML = "";
        feedbackMessage.style.display = 'block';
        feedbackMessage.className = `text-${textColor}`;
        feedbackMessage.innerHTML = message;

        setTimeout(function () {
            feedbackMessage.style.display = 'none';
        }, 5000);
}

function removeInputFields() {
    const passInput = document.getElementById('passInput');
    const confPassInput = document.getElementById('confPassInput');
    const resetButton = document.getElementById('resetButton');
    passInput.remove();
    confPassInput.remove();
    resetButton.remove();
}

function addLoginLink() {
    const form = document.getElementById('resetPassForm');

    const p = document.createElement('p');
    p.className = 'mt-4';

    const small = document.createElement('small');

    const a = document.createElement('a');
    a.className = 'text-decoration-none btn btn-danger';
    a.href = 'login';
    a.innerHTML = 'Login';
    a.type = 'button';

    small.appendChild(a);
    p.appendChild(small);
    form.appendChild(p);
}

function requestPasswordReset(email) {
    return fetch(`login/getEmail/${email}`)
        .then(res => res.json())
        .then(data => {
            if (data === email) {
                window.location.href = `resetpassword?email=${email}`;
            } else {
                showFeedbackMessage("We couldn't find that email in our system. Please check your input.", "warning", "feedbackMessageFp");
            }
        })
        .catch(err => console.error(err));
}

function resetPassword(password, passConfirm, email) {
    if (password.length > 0 && passConfirm.length > 0) {
        if (password === passConfirm) {
            const data = {
                'password': password,
                'email': email
            }

            fetch(`resetpassword/updatePassword`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(output => {
                    document.getElementById('formTitle').innerHTML = "Success";
                    showFeedbackMessage("Successfully updated your password.", "success", "feedbackMessageRp")
                    removeInputFields();
                    addLoginLink();
                })
                .catch(err => console.error(err));

        } else {
            showFeedbackMessage("Passwords do not match.", "warning", "feedbackMessageRp");
        }
    } else {
        showFeedbackMessage("Please enter all fields.", "warning", "feedbackMessageRp");
    }
}