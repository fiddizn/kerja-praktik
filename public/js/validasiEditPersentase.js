var form = document.getElementById('form');

const administrasi = document.getElementById('administrasi');
const bimbingan = document.getElementById('bimbingan');
const pembimbing = document.getElementById('pembimbing');
const penguji = document.getElementById('penguji');

form.addEventListener('submit', function(event){
    var administrasi = document.getElementById('administrasi').value;
    var bimbingan = document.getElementById('bimbingan').value;
    var pembimbing = document.getElementById('pembimbing').value;
    var penguji = document.getElementById('penguji').value;
    
    var total = Number(administrasi)+Number(bimbingan)+Number(pembimbing)+Number(penguji);
    if (total > 100 ){
        alert('Total persentase penilaian lebih dari 100%');
        event.preventDefault();
    }else if (total < 100 ){
        alert('Total persentase penilaian kurang dari 100%');
        event.preventDefault();
    }
});