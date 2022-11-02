var form = document.getElementById('formPlottingP1P2');

const p1 = document.getElementById('p1');
const p2 = document.getElementById('p2');


form.addEventListener('submit', function(event){
    var p1Value = document.getElementById('p1').value;
    var p2Value = document.getElementById('p2').value;

    if(p1Value == p2Value)
    {
        alert('Pembimbing 1 tidak boleh sama dengan Pembimbing 2!');
        event.preventDefault();
    }
});