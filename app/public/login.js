function addFeedbackMessage(message) {
    const feedbackMessage = document.getElementById('feedbackMessage');
    feedbackMessage.innerHTML = "";
    feedbackMessage.innerHTML = message;
}

function sendPassResetEmail(email) {
    const dbEmail = getEmail(email);

    fetch(`sendResetLink/${email}`, {
        method: 'POST',
    })
        .then(output => {
        })
}

function getEmail(email) {
    return fetch(`getEmail/${email}`)
        .then(res => res.json())
        .then(data => {
            return data;
        })
}