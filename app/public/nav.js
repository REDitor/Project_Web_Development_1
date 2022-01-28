function setActiveNav() {
    switch (window.location.pathname) {
        case '/home':
            document.getElementById('homeNav').className += ' text-danger';
            break;

        case '/movies':
            document.getElementById('moviesNav').className += ' text-danger';
            break;

        case '/shows':
            document.getElementById('showsNav').className += ' text-danger';
    }
}