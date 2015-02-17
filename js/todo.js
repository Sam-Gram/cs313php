function addList(username, password, pListName) {
    $.ajax({
        type: "POST",
        url:  "addList.php",
        data: {
            username: username,
            password: password,
            listname: pListName
        },
        success: function (data) {
            location.reload()
        },
        dataType: 'json'
    });

}

function addItem(username, password, pListName, pListItem, pListItemDueDate) {
    $.ajax({
        type: "POST",
        url:  "addItem.php",
        data: {
            username: username,
            password: password,
            listname: pListName,
            itemname: pListItem,
            itemduedate: pListItemDueDate
        },
        success: function (data) {
            location.reload()
        },
        dataType: 'json'
    });

}

function deleteItem(username, password, pListName, pListItem, pListItemDueDate) {
    $.ajax({
        type: "POST",
        url:  "deleteItem.php",
        data: {
            username: username,
            password: password,
            listname: pListName,
            itemname: pListItem,
            itemduedate: pListItemDueDate ? pListItemDueDate : null
        },
        success: function () {
            location.reload()
        },
        dataType: 'json'
    });

}

$(document).ready (function () {
    $('#addListForm').click(function (e){
        addList(username, password, $('#newlistname').val())
    });
    $('.list-item').click(function (e) {
        deleteItem(username, password, $(e.target).attr('list'), $(e.target).attr('item'));
    });
    $('.list-item-add').keypress(function (e) {
        if (e.keyCode === 13) {
            console.log('Inside list item add');
            addItem(username, password, $(e.target).attr('list'), $(e.target).val());
        }
    });
});


