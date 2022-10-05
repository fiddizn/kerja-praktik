<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hallo</h1>
    <h3>Test JavaScript :</h3>

    <!-- INI DIA -->
    <select type="text" class="form-select" name="algo" id="algo" onchange="getSelectValue();">
        <option disabled selected>Pilih.. </option>
        <option>A</option>
        <option>AB</option>
        <option>B</option>
        <option>BC</option>
        <option>C</option>
        <option>D</option>
        <option>E</option>
        <option>Belum Diambil</option>
    </select>

    <script>
    function getSelectValue() {
        var selectedValue = document.getElementById('algo').value;
        console.log(selectedValue);
    }
    </script>
    <!-- INI DIA -->

</body>

</html>