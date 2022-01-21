window.addEventListener('DOMContentLoaded', (event) => {
    getWatchLists();
})

function displayWatchlists(watchlists) {
    const watchListsTable = document.getElementById('watchListsTable');

    watchlists.forEach(
        watchlist => {
            //row
            const tr = document.createElement('tr');

            //columns
            const nameTh = document.createElement('th');
            const descriptionTd = document.createElement('td');
            const buttonTd = document.createElement('button');
            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger';
            buttonTd.appendChild(deleteButton);

            tr.append(nameTh, descriptionTd, buttonTd);
            watchListsTable.appendChild(tr);
        }
    )
}

function getWatchLists(/*userId*/) {
    const watchListsTable = document.getElementById('watchListsTable');
    watchListsTable.innerHTML = '';
    fetch('localhost/mylists')
        .then(result => result.json())
        .then((out) => {
            displayWatchlists(out);
        })
        .catch((err) => console.error(err));
}

function deleteWatchList(watchListId) {

}

function createWatchList() {

}

function removeFromList(id) {

}

function addToList(item) {

}