function setActiveNav() {
    switch (window.location.pathname) {
        case '/home':
            document.getElementById('homeNav').className += ' active';
            break;

        case '/movies':
            document.getElementById('moviesNav').className += ' active';
            break;

        case '/shows':
            document.getElementById('showsNav').className += ' active';
    }
}