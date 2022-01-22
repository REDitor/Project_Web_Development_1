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
    createListButton.onclick = createWatchList;

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
    getWatchListsForUser(sessionStorage.getItem('userId'));
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
            // deleteButton.addEventListener('click', (event) => {
            //     deleteWatchList();
            // })

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

    fetch(`api/mylists/${userId}`)
        .then(result => result.json())
        .then((data) => {
            displayWatchlists(data);
        })
        .catch((err) => console.error(err));
}

function deleteWatchList(watchListId) {
    const url = `api/myLists/deleteWatchList/${watchListId}`;
    fetch(url, {
        method: 'DELETE',
    })
        .then(output => {
            // getWatchListsForUser();
        })
        .catch(err => console.error(err));
    alert('successfully deleted list');
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

            // getWatchListsForUser();

        })
        .catch(err => console.error(err));

    alert(`Successfully created ${listName.value}`);
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