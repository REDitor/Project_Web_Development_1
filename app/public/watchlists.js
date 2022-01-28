//region WatchLists
function displayCreateList(userId) {
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
    createListButton.type = 'button';
    createListButton.className = 'btn btn-success btn-sm';
    createListButton.innerText = 'Create';
    createListButton.style.width = '45%';
    createListButton.addEventListener('click', (event) => {
        createWatchList(userId);
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

    const createNewListSection = document.createElement('section');
    createNewListSection.id = 'createNewListSection';
    createNewListSection.className = 'mb-3 col-sm-11 col-md-8 col-lg-6 col-xl-4 m-auto my-5 text-center h-50';
    createNewListSection.appendChild(formContainer);

    const myListsContainer = document.getElementById('myLists-container');
    const tableSection = document.getElementById('tableSection');

    cancelCreateList();
    myListsContainer.insertBefore(createNewListSection, tableSection);
}

function cancelCreateList() {
    if (document.body.contains(document.getElementById('createNewListSection'))) {
        const createNewListSection = document.getElementById('createNewListSection');
        createNewListSection.remove();
    }
}

function displayWatchLists(watchLists) {
    const watchListsTableBody = document.getElementById('watchListsTableBody');

    if (Object.keys(watchLists).length < 1) {
        const noListsSection = document.createElement('section');

        const noListsMessage = document.createElement('p');
        noListsMessage.className = 'text-danger';
        noListsMessage.innerHTML = "It seems like you don't have any lists yet...";

        noListsSection.appendChild(noListsMessage);
        watchListsTableBody.appendChild(noListsSection);

    } else {
        watchLists.forEach(
            watchList => {
                const tr = document.createElement('tr');

                const nameTh = document.createElement('th');
                nameTh.innerHTML = watchList.name;
                nameTh.style.cursor = 'pointer';
                nameTh.addEventListener('click', (event) => {
                    window.location.href = `mylistdetails?name=${watchList.name}&id=${watchList.watchListId}`;
                })

                const descriptionTd = document.createElement('td');
                descriptionTd.innerHTML = watchList.description;
                descriptionTd.style.cursor = 'pointer';
                descriptionTd.addEventListener('click', (event) => {
                    window.location.href = `mylistdetails?name=${watchList.name}&id=${watchList.watchListId}`;
                })

                const buttonTd = document.createElement('td');

                const deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-danger d-flex px-2 py-2 mx-auto';
                deleteButton.addEventListener('click', (event) => {
                    void deleteWatchList(watchList.watchListId, watchList.name);
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
            displayWatchLists(data, userId);
        })
        .catch((err) => console.error(err));
}

function createWatchList(userId) {
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
            getWatchListsForUser(userId);
            cancelCreateList();
        })
        .catch(err => console.error(err));
}

async function deleteWatchList(watchListId, watchListName) {
    if (confirm(`Are you sure you want to delete ${watchListName}?`)) {
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
}

//endregion

//region WatchListItems(Movies/Shows)
function getMoviesForList(watchListId, watchListName) {
    if (document.body.contains(document.getElementById('detailsTableBody')))
        document.getElementById('detailsTableBody').innerHTML = "";

    fetch(`api/myLists/getMoviesByWatchListId/${watchListId}`)
        .then(res => res.json())
        .then((data) => {
            displayMovies(data, watchListId, watchListName);
        })
        .catch((err) => console.error(err));
}

function getShowsForList(watchListId, watchListName) {
    if (document.body.contains(document.getElementById('detailsTableBody')))
        document.getElementById('detailsTableBody').innerHTML = "";

    fetch(`api/myLists/getShowsByWatchListId/${watchListId}`)
        .then(res => res.json())
        .then((data) => {
            displayShows(data, watchListId, watchListName);
        })
        .catch((err) => console.error(err));
}

function displayMovies(movies, watchListId, watchListName) {
    const detailsTableBody = document.getElementById('detailsTableBody');

    movies.forEach(
        movie => {
            const tr = document.createElement('tr');

            const typeTd = document.createElement('td');
            typeTd.id = 'movieIconTd';
            const movieIcon = document.createElement('i');
            movieIcon.className = 'fas fa-video';

            const titleTh = document.createElement('th');
            titleTh.innerHTML = movie.title;

            const writerTd = document.createElement('td');
            writerTd.id = 'movieWriterTd';
            writerTd.innerHTML = movie.writer;

            const durationTd = document.createElement('td');
            durationTd.innerHTML = `${movie.durationInMinutes} min.`;

            const episodesTd = document.createElement('td');

            const buttonTd = document.createElement('td');

            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger d-flex px-2 py-2 mx-auto';
            deleteButton.addEventListener('click', (event) => {
                removeFromList(movie.itemId, watchListId, movie.title, watchListName);
            });

            const trashCanIcon = document.createElement('i');
            trashCanIcon.className = 'fas fa-trash-can';

            typeTd.appendChild(movieIcon);
            deleteButton.appendChild(trashCanIcon);
            buttonTd.appendChild(deleteButton);
            tr.append(typeTd, titleTh, writerTd, durationTd, episodesTd, buttonTd);
            detailsTableBody.appendChild(tr);
        }
    )
}

function displayShows(shows, watchListId, watchListName) {
    const detailsTableBody = document.getElementById('detailsTableBody');

    shows.forEach(
        show => {
            const tr = document.createElement('tr');
            tr.id = 'moviesRow';
            tr.style.padding = '5rem';

            const typeTd = document.createElement('td');
            typeTd.id = 'showIconTd';
            const showIcon = document.createElement('i');
            showIcon.className = 'fas fa-layer-group';

            const titleTh = document.createElement('th');
            titleTh.innerHTML = show.title;

            const writerTd = document.createElement('td');
            writerTd.id = 'showWriterTd';
            writerTd.innerHTML = show.writer;

            const durationTd = document.createElement('td');

            const episodesTd = document.createElement('td');
            episodesTd.innerHTML = `${show.numberOfEpisodes}`;

            const buttonTd = document.createElement('td');

            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger d-flex px-2 py-2 mx-auto';
            deleteButton.addEventListener('click', (event) => {
                removeFromList(show.itemId, watchListId, show.title, watchListName);
                //confirm dialog
            });

            const trashCanIcon = document.createElement('i');
            trashCanIcon.className = 'fas fa-trash-can';

            typeTd.appendChild(showIcon);
            deleteButton.appendChild(trashCanIcon);
            buttonTd.appendChild(deleteButton);
            tr.append(typeTd, titleTh, writerTd, durationTd, episodesTd, buttonTd);
            detailsTableBody.appendChild(tr);
        }
    )
}

function addToList(itemId, watchListId) {
    const data = {
        'watchListId': watchListId,
        'itemId': itemId
    }

    fetch('api/mylists/addToList', {
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

function removeFromList(itemId, watchListId, itemTitle, watchListName) {
    if (confirm(`Are you sure you want to remove ${itemTitle} from ${watchListName}?`)) {
        const url = 'api/myLists/removeFromList';

        const data = {
            'watchListId': watchListId,
            'itemId': itemId
        }

        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
            .then(output => {
                getMoviesForList(watchListId);
                getShowsForList(watchListId);
            })
            .catch(err => console.log(err));
    }
}

//endregion