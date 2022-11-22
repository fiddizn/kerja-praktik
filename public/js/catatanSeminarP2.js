var form = document.getElementById('formSeminar');

const komentar = document.getElementById('p2_catatan');

form.addEventListener('submit', function(event){
    var komentar = document.getElementById('p2_catatan').value;
    if (komentar == "")
    {
        alert('Catatan Seminar tidak boleh kosong!');
        event.preventDefault();
    }
});