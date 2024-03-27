const addFormToCollection = (e) => {
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
    const item = document.createElement('div');
    item.classList.add('col-12');
    item.classList.add('col-md-6');
    item.classList.add('d-flex');
    item.innerHTML = collectionHolder.dataset.prototype.replace(/__name__/g, collectionHolder.dataset.index);
    collectionHolder.appendChild(item);
    collectionHolder.dataset.index ++;
    addTagFormDeleteLink(item);
    window.scrollTo(0, item.offsetTop);
};

document.querySelectorAll('.add_item_link').forEach(btn => {
    btn.addEventListener("click", addFormToCollection)
});

const addTagFormDeleteLink = (item) => {
    const removeFormButton = document.createElement('button');
    removeFormButton.className = "btn";
    removeFormButton.innerHTML = '<i class="align-middle" data-feather="trash-2"></i>';
    item.querySelector('.delete-div').append(removeFormButton);
    removeFormButton.addEventListener('click', (e) => {
        e.preventDefault();
        // remove the li for the tag form
        item.remove();
    });
    feather.replace();
}

$('.delete-photo').on('click', function(e) {
    e.preventDefault();
    $(this).parent().parent().parent().parent().remove();
});