$(function () {
    _passModal = new bootstrap.Modal(document.querySelector('#passModal'));
    $('#reports').off().on('click', manageDownload)

    $('#download-form').on('submit', (evt) => _passModal.hide());

    if(_error) {
        _passModal.show();
    }
});

function manageDownload(evt) {
    evt.preventDefault();
    $('#download-form ')[0].reset();
    _passModal.show();
}