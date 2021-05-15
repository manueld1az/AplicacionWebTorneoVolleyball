<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script type="text/javascript">
        let counter = 0;
        let counterb = 0;

        function countingClicks(){
            document.getElementById("counting").innerHTML = ++counter;
        }
        function deductClicks(){
            if (counter >= 1) {
                document.getElementById("counting").innerHTML= --counter;
            }
        }

        function countingClicksb(){
            document.getElementById("countingb").innerHTML = ++counterb;
        }
        function deductClicksb(){
            if (counterb >= 1) {
                document.getElementById("countingb").innerHTML= --counterb;
            }
        }
    </script>
</body>
</html>
