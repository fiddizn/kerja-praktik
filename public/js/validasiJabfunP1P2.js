var formP1P2 = document.getElementById('formPlottingP1P2');
const p1_id = document.getElementById('p1');
const p2_id = document.getElementById('p2');

formP1P2.addEventListener('submit', function(event){
    var p1Value = document.getElementById('p1').value;
    var p2Value = document.getElementById('p2').value;

 // only get jabfun (removing name)
    p1Value = removeName(p1Value);
    p2Value = removeName(p2Value);

    var p1Role = checkRole(p1Value);
    var p2Role = checkRole(p2Value);

     if(p1Role < p2Role){
        alert('Jabatan Fungsional Pembimbing 1 harus lebih tinggi atau setara dengan Pembimbing 2!');
        event.preventDefault();
     }
});

function checkRole (str){
    console.log(str)
    console.log(str == 'Lektor Kepala');
    console.log(str == 'Lektor');
    console.log(str == 'Asisten Ahli');
    console.log(str == 'Non Jabfun');
    if (str == 'Guru Besar'){
        return 5;
    }else if(str == 'Lektor Kepala'){
        return 4;
    }else if (str == 'Lektor'){
        return 3;
    }else if (str == 'Asisten Ahli'){
        return 2;
    }else{
        return 1;
    }
}

function removeName(str){
    var pos = findPos(str);
    str = str.slice(pos+1,str.length-1);
    return str;
}

function findPos(str){
    return str.indexOf("(");
}

