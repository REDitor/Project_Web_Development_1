//region WatchLists
function displayCreateList() {
    document.getElementById('createNewListSection').innerHTML = "";

    const formContainer = document.createElement('section');
    formContainer.className = 'container mb-5';
    formContainer.id = 'formContainer';

    const title = document.createElement('h4');
    title.innerText = 'Create a new List';

    const createListForm = document.createElement('form');
    createListForm.method = 'POST';
    createListForm.className = 'mt-4';

    const formGroupName = document.createElement('section');
    formGroupName.className = 'form-group'

    const nameInput = document.createElement('input');
    nameInput.type = 'text';
    nameInput.name = 'name';
    nameInput.placeholder = 'Enter list name';
    nameInput.id = 'createListName';
    nameInput.className = 'form-control mb-3';

    const formGroupDescription = document.createElement('section');
    formGroupDescription.className = 'form-group';

    const descriptionInput = document.createElement('input')
    descriptionInput.type = 'text';
    descriptionInput.name = 'description';
    descriptionInput.placeholder = 'Enter list description';
    descriptionInput.id = 'createListDescription';
    descriptionInput.className = 'form-control mb-3';

    const formGroupButtons = document.createElement('section');
    formGroupButtons.className = 'form-group d-flex justify-content-between';

    const createListButton = document.createElement('button');
    createListButton.name = 'createNewList';
    createListButton.className = 'btn btn-success btn-sm';
    createListButton.innerText = 'Create';
    createListButton.style.width = '45%';
    createListButton.addEventListener('click', (event) => {
        createWatchList();
    })

    const cancelListButton = document.createElement('button');
    cancelListButton.name = 'cancelCreateList';
    cancelListButton.type = 'button';
    cancelListButton.className = 'btn btn-outline-danger btn-sm'
    cancelListButton.innerText = 'Cancel';
    cancelListButton.style.width = '45%';
    cancelListButton.addEventListener('click', (event) => {
        cancelCreateList();
    })

    //append
    formGroupName.appendChild(nameInput);
    formGroupDescription.appendChild(descriptionInput);
    formGroupButtons.append(cancelListButton, createListButton);
    createListForm.append(formGroupName, formGroupDescription, formGroupButtons);
    formContainer.append(title, createListForm);

    const createNewListSection = document.getElementById('createNewListSection');
    createNewListSection.appendChild(formContainer);
}

function cancelCreateList() {
    const createNewListSecion = document.getElementById('createNewListSection');
    const formContainer = document.getElementById('formContainer');
    createNewListSecion.removeChild(formContainer);
}

function displayWatchLists(watchLists) {
    const watchListsTableBody = document.getElementById('watchListsTableBody');

    watchLists.forEach(
        watchList => {
            const tr = document.createElement('tr');
            tr.id = 'watchListRow';
            tr.style.padding = '5rem';

            const nameTh = document.createElement('th');
            nameTh.innerHTML = watchList.name;
            nameTh.addEventListener('click', (event) => {
                displayListDetails(watchList.watchListId);
            })

            const descriptionTd = document.createElement('td');
            descriptionTd.innerHTML = watchList.description;

            const buttonTd = document.createElement('td');

            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger btn-sm py-1';
            deleteButton.addEventListener('click', (event) => {
                void deleteWatchList(watchList.watchListId);
                alert(`Successfully Deleted List: ${watchList.name}`);
            });

            const trashCanIcon = document.createElement('i');
            trashCanIcon.className = 'fas fa-trash-can';

            deleteButton.appendChild(trashCanIcon);
            buttonTd.appendChild(deleteButton);
            tr.append(nameTh, descriptionTd, buttonTd);
            watchListsTableBody.appendChild(tr);
        }
    )
}

function displayListDetails(watchListId) {
    window.location.href = 'listdetails';
    getMoviesForList(watchListId);
    // getShowsForList(watchListId);
    // displayMovies(watchListId);
    // displayShows(watchListId);
}

//CRUD
function getUserId() {
    return fetch(`api/myLists/getUserId`)
        .then(res => res.json())
        .then(data => {
            return data
        });
}

function getWatchListsForUser(userId) {
    if (document.body.contains(document.getElementById('watchListsTableBody')))
        document.getElementById('watchListsTableBody').innerHTML = "";


    fetch(`api/mylists/getListsByUserId/${userId}`)
        .then(res => res.json())
        .then((data) => {
            displayWatchLists(data);
        })
        .catch((err) => console.error(err));
}

function createWatchList() {
    const listName = document.getElementById('createListName');
    const listDescription = document.getElementById('createListDescription');

    const data = {
        'name': listName.value,
        'description': listDescription.value
    }


    fetch('api/mylists/createWatchList', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(output => {
            listName.value = null;
            listDescription.value = null;
            const userId = getUserId();
            getWatchListsForUser(userId);
        })
        .catch(err => console.error(err));
}

async function deleteWatchList(watchListId) {
    const userId = await getUserId();

    const url = `api/myLists/deleteWatchlist/${watchListId}`
    fetch(url, {
        method: 'DELETE',
    })
        .then(output => {
            getWatchListsForUser(userId);
        })
        .catch(err => console.error(err));
}
//endregion

//region WatchListItems(Movies/Shows)
function getMoviesForList(watchListId) {

    if (document.body.contains(document.getElementById('moviesTableBody')))
        document.getElementById('moviesTableBody').innerHTML = "";

    fetch (`api/myLists/getMoviesByWatchListId/${watchListId}`)
        .then(res => res.json())
        .then((data) => {

            displayMovies(data, watchListId);
        })
        .catch((err) => console.error(err));
}

function getShowsForList(watchListId) {
    if (document.body.contains(document.getElementById('showsTableBody')))
        document.getElementById('showsTableBody').innerHTML = "";

    fetch (`api/myLists/getShowsByWatchListId/${watchListId}`)
        .then(res => res.json())
        .then((data) => {
            displayShows(data, watchListId);
        })
        .catch((err) => console.error(err));
}

function displayMovies(movies, watchListId) {
    const moviesTableBody = document.getElementById('moviesTableBody');

    movies.forEach(
        movie => {
            const tr = document.createElement('tr');
            tr.id = 'moviesRow';
            tr.style.padding = '5rem';

            const titleTh = document.createElement('th');
            titleTh.innerHTML = movie.title;

            const writerTd = document.createElement('td');
            writerTd.innerHTML = movie.writer;

            const durationTd = document.createElement('td');
            durationTd.innerHTML = movie.durationInMinutes;

            const buttonTd = document.createElement('td');

            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger btn-sm py-1';
            deleteButton.addEventListener('click', (event) => {
                void removeFromList(movie.itemId, watchListId);
                alert(`Successfully removed ${movie.title}`); //change to confirm dialog
            });

            const trashCanIcon = document.createElement('i');
            trashCanIcon.className = 'fas fa-trash-can';

            deleteButton.appendChild(trashCanIcon);
            buttonTd.appendChild(deleteButton);
            tr.append(titleTh, writerTd, durationTd, buttonTd);
            moviesTableBody.appendChild(tr);
        }
    )
}

function displayShows(shows, watchListId) {
    const showsTableBody = document.getElementById('showsTableBody');

    shows.forEach(
        show => {
            const tr = document.createElement('tr');
            tr.id = 'moviesRow';
            tr.style.padding = '5rem';

            const titleTh = document.createElement('th');
            titleTh.innerHTML = show.title;

            const writerTd = document.createElement('td');
            writerTd.innerHTML = show.writer;

            const episodesTd = document.createElement('td');
            episodesTd.innerHTML = show.numberOfEpisodes;

            const buttonTd = document.createElement('td');

            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger btn-sm py-1';
            deleteButton.addEventListener('click', (event) => {
                void removeFromList(show.itemId, watchListId);
                alert(`Successfully removed ${show.title}`); //change to confirm dialog
            });

            const trashCanIcon = document.createElement('i');
            trashCanIcon.className = 'fas fa-trash-can';

            deleteButton.appendChild(trashCanIcon);
            buttonTd.appendChild(deleteButton);
            tr.append(titleTh, writerTd, episodesTd, buttonTd);
            showsTableBody.appendChild(tr);
        }
    )
}

function removeFromList(itemId, watchListId) {

}


//endregion

//region Movies


//CRUD
function addToList(itemId, watchListId) {


    const data = {
        'watchListId': watchListId,
        'itemId': itemId
    }

    fetch('api/movies/addToList', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(output => {
            alert(`Successfully added to list`);
        })
        .catch(err => console.error(err));
}
//endregion