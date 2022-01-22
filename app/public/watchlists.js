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

window.addEventListener('DOMContentLoaded', (event) => {
    getWatchListsForUser();
})

function displayWatchlists(watchlists) {
    const watchListsTable = document.getElementById('watchListsTableBody');

    watchlists.forEach(
        watchlist => {
            const tr = document.createElement('tr');
            tr.id = 'watchListRow';
            tr.addEventListener('click', (event) => {
                displayListDetails();
            })

            const nameTh = document.createElement('th');
            // nameTh.innerHTML = '${watchlist.name}';

            const descriptionTd = document.createElement('td');
            // descriptionTd.innertext = watchlist.description;

            const buttonTd = document.createElement('td');

            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger btn-sm';
            deleteButton.addEventListener('click', (event) => {
                deleteWatchList();
            })

            const trashCanIcon = document.createElement('i');
            trashCanIcon.className = 'fas fa-trash-can';

            deleteButton.appendChild(trashCanIcon);
            buttonTd.appendChild(deleteButton);
            tr.append(nameTh, descriptionTd, buttonTd);
            watchListsTable.appendChild(tr);
        }
    )
}

function getWatchListsForUser(userId) {
    const watchListsTable = document.getElementById('watchListsTable');
    watchListsTable.innerHTML = "";

    fetch('api/mylists')
        .then(result => result.json())
        .then((data) => {
            displayWatchlists(data);
        })
        // .catch((err) => console.error(err));
}

function deleteWatchList(watchListId) {

}

function createWatchList() {

}

//List Details/Contents

function displayListDetails($watchList) {
    const row = document.getElementById('watchListRow');

    row.appendChild()
}

function getItemsForList($watchlist) {

}

function removeFromList(id) {

}

function addToList(item) {

}