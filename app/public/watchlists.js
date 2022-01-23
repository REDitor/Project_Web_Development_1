//Dynamic UI
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

    //append
    formGroupName.appendChild(nameInput);
    formGroupDescription.appendChild(descriptionInput);
    formGroupButtons.append(cancelListButton, createListButton);
    createListForm.append(formGroupName, formGroupDescription, formGroupButtons);
    formContainer.append(title, createListForm);

    const createNewListSection = document.getElementById('createNewListSection');
    createNewListSection.appendChild(formContainer);
}

function getWatchListsForUser(userId) {
    const watchListsTableBody = document.getElementById('watchListsTableBody');
    watchListsTableBody.innerHTML = "";

    fetch(`api/mylists/getListsByUserId/${userId}`)
        .then(res => res.json())
        .then((data) => {
            displayWatchLists(data);
        })
        .catch((err) => console.error(err));
}

function displayWatchLists(watchLists) {
    const watchListsTable = document.getElementById('watchListsTableBody');

    watchLists.forEach(
        watchList => {
            const tr = document.createElement('tr');
            tr.id = 'watchListRow';
            tr.addEventListener('click', (event) => {
                displayListDetails();
            })

            const nameTh = document.createElement('th');
            nameTh.innerHTML = watchList.name;

            const descriptionTd = document.createElement('td');
            descriptionTd.innerHTML = watchList.description;

            const buttonTd = document.createElement('td');

            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger btn-sm';
            deleteButton.addEventListener('click', (event) => {
                void deleteWatchList(watchList.watchListId);
                alert(`Successfully Deleted List: ${watchList.name}`);
            });

            const trashCanIcon = document.createElement('i');
            trashCanIcon.className = 'fas fa-trash-can';

            deleteButton.appendChild(trashCanIcon);
            buttonTd.appendChild(deleteButton);
            tr.append(nameTh, descriptionTd, buttonTd);
            watchListsTable.appendChild(tr);
        }
    )
}

//CRUD
function getUserId() {
    return fetch(`api/myLists/getUserId`)
        .then(res => res.json())
        .then(data => {
            return data
        });
}

async function deleteWatchList(watchListId) {
    const userId = await getUserId();

    const url = `api/myLists/deleteWatchlist/${watchListId}`
    fetch(url, {
        method: 'DELETE',
    })
        .then(output =>  {
            getWatchListsForUser(userId);
        })
        .catch(err => console.error(err));
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

//List Details/Contents
function displayListDetails($watchList) {

}

function getItemsForList($watchlist) {

}

function removeFromList(id) {

}

function addToList(item) {

}