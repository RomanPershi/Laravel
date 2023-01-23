const form = document.getElementById("new_document_attachment");
const fileInput = document.getElementById("document_attachment_doc");
window.addEventListener('paste', e => {
    fileInput.files = e.clipboardData.files;
    const [file] = document_attachment_doc.files
    if (file) {
        blah.src = URL.createObjectURL(file);
        $('#blah').css('display', 'block');
    }
});
document_attachment_doc.onchange = evt => {
    const [file] = document_attachment_doc.files
    if (file) {
        blah.src = URL.createObjectURL(file);
        $('#blah').css('display', 'block');
    }
}
$('#title').change = evt => {
    $('#img').val($('#title').val());
}
