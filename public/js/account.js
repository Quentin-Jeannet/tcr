const addFormToCollection = (e) => {
    $('#no-address').hide();
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
    console.log(collectionHolder);
    const item = document.createElement('div');
    item.classList.add('addresses');
    // item.classList.add('col-md-6');
    // item.classList.add('d-flex');
    item.innerHTML = collectionHolder.dataset.prototype.replace(/__name__/g, collectionHolder.dataset.index);
    collectionHolder.appendChild(item);
    collectionHolder.dataset.index ++;
    addTagFormDeleteLink(item);
};

document.querySelectorAll('.add_item_link').forEach(btn => {
    btn.addEventListener("click", addFormToCollection)
});

const addTagFormDeleteLink = (item) => {
    console.log(item);
    const removeFormButton = document.createElement('button');
    removeFormButton.className = "btn";
    removeFormButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
    item.querySelector('.delete-div').append(removeFormButton);
    removeFormButton.addEventListener('click', (e) => {
        e.preventDefault();
        // remove the li for the tag form
        item.remove();
        if($('.addresses').length == 0) {
            $('#no-address').show();
        }
    }); 
}

$('.delete-address').on('click', function(e) {
    $(this).parent().parent().remove();
});

$('.heart').on('click', function (e) {
    e.preventDefault();
    var _this = $(this);
    $.ajax({
        url: 'removecolor',
        type: 'POST',
        data: 'id=' + $(this).data('id')
    }).done(function (data) {
        _this.parent().parent().parent().parent().remove()
    }).fail(function (data) {

    })
})

$(document).ready(function () {

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('commande')) {
            $('#commandes-tab').trigger("click");
        }
        if (urlParams.has('address')) {
            $('#addresses-tab').trigger("click");
        }

});