var form = document.getElementById('formSeminar');

const komentar = document.getElementById('r1_catatan');

form.addEventListener('submit', function(event){
    var komentar = document.getElementById('r1_catatan').value;
    if (komentar == "")
    {
        alert('Saran Perbaikan tidak boleh kosong!');
        event.preventDefault();
    }
});