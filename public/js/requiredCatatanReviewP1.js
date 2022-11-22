var form = document.getElementById('formReview');

const komentar = document.getElementById('komentar');

form.addEventListener('submit', function(event){
    var komentar = document.getElementById('komentar').value;
    if (komentar == "")
    {
        alert('Saran Perbaikan tidak boleh kosong!');
        event.preventDefault();
    }
});