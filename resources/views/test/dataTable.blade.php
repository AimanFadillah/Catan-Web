<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="GET">
        <input type="hidden" id="makan" name="makan" value="makan">
        <span id="jadimakan">Makan</span>
        <span id="minum">Minum</span>
        <button type="submit">Kirim</button>
      </form>

</body>
<script>
    
    var minum = document.getElementById("minum");
    var makan = document.getElementById("jadimakan");
    var input = document.getElementById("makan");

    if(typeof makan !== "click"){
        makan.style.border = "1px solid black";
        minum.style.border = "none";
        input.value = "makan";
    }

    minum.addEventListener("click", function() {
    minum.style.border = "1px solid black";
    makan.style.border = "none";
    input.value = "minum";
    });

    makan.addEventListener("click", function() {
    makan.style.border = "1px solid black";
    minum.style.border = "none";
    input.value = "makan";
    });



</script>

</html>