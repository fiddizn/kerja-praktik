var form = document.getElementById('formAdministrasi');

const alt1_p1 = document.getElementById('alt1_p1');
const alt2_p1 = document.getElementById('alt2_p1');
const alt3_p1 = document.getElementById('alt3_p1');
const alt4_p1 = document.getElementById('alt4_p1');
const alt1_p2 = document.getElementById('alt1_p2');
const alt2_p2 = document.getElementById('alt2_p2');
const alt3_p2 = document.getElementById('alt3_p2');
const alt4_p2 = document.getElementById('alt4_p2');

form.addEventListener('submit', function(event){
    var alt1_p1Value = document.getElementById('alt1_p1').value;
    var alt2_p1Value = document.getElementById('alt2_p1').value;
    var alt3_p1Value = document.getElementById('alt3_p1').value;
    var alt4_p1Value = document.getElementById('alt4_p1').value;
    var alt1_p2Value = document.getElementById('alt1_p2').value;
    var alt2_p2Value = document.getElementById('alt2_p2').value;
    var alt3_p2Value = document.getElementById('alt3_p2').value;
    var alt4_p2Value = document.getElementById('alt4_p2').value;

    // only get jabfun (removing name)
    alt1_p1Value = removeName(alt1_p1Value);
    alt2_p1Value = removeName(alt2_p1Value);
    alt3_p1Value = removeName(alt3_p1Value);
    alt4_p1Value = removeName(alt4_p1Value);
    alt1_p2Value = removeName(alt1_p2Value);
    alt2_p2Value = removeName(alt2_p2Value);
    alt3_p2Value = removeName(alt3_p2Value);
    alt4_p2Value = removeName(alt4_p2Value);

    var alt1_p1Role = checkRole(alt1_p1Value);
    var alt2_p1Role = checkRole(alt2_p1Value);
    var alt3_p1Role = checkRole(alt3_p1Value);
    var alt4_p1Role = checkRole(alt4_p1Value);

    var alt1_p2Role = checkRole(alt1_p2Value);
    var alt2_p2Role = checkRole(alt2_p2Value);
    var alt3_p2Role = checkRole(alt3_p2Value);
    var alt4_p2Role = checkRole(alt4_p2Value);

    if(alt1_p1Role < alt1_p2Role ||
       alt2_p1Role < alt2_p2Role ||
       alt3_p1Role < alt3_p2Role ||
       alt4_p1Role < alt4_p2Role )
        {
        alert('Jabatan Fungsional calon Pembimbing 1 harus lebih tinggi atau setara dengan calon Pembimbing 2!');
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