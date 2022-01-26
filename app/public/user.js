function showFeedbackMessage(message, textColor, elementId) {
    const feedbackMessage = document.getElementById(elementId);
    feedbackMessage.innerHTML = "";
    feedbackMessage.style.display = 'block';
    feedbackMessage.innerHTML = message;

    setTimeout(function() {
        feedbackMessage.style.display = 'none';
    }, 5000);
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
    const elementId = "feedBackMessageRp";

    if (password === passConfirm) {
        const data = {
            'password': CryptoJS.MD5(password),
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
                const loginLink = document.getElementById('loginLink');
                showFeedbackMessage("Successfully updated your password.", "success", elementId)
                loginLink.innerHTML = 'Login';
            })
            .catch(err => console.error(err));

    } else {
        showFeedbackMessage("Passwords do not match.", "warning", elementId);
    }
}