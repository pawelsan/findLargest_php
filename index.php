<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Wyszukiwanie największej liczby w ciągu</h1>
    <p>Wpisz index (n) ostatniej liczby w ciągu. Długośc zbioru wynosić będzie n+1.</p>
    <p>Index musi zawierać się w zbiorze liczb od 1 do 99999 włącznie.</p>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <label for="">Wpisz n:</label>
            <input type="text" name="number">
        </div>
        <input type="submit" value="Zaakceptuj">
    </form>
    <?php
    if(isset($_POST['number'])) {
        $min = 1;
        $max = 99999;
        if( ctype_digit($_POST['number']) && $_POST['number'] >= 1 && $_POST['number'] <= 99999) {
            function findLargest($n){
                // initial elements of an array
                // - according to the task it has to have at least 2 elements
                // index of the last one has to be greater or equal 1
                $myArray = array(0, 1);
                // conditions for an n that is an odd number
                if ($n % 2 == 1) {
                    for ($i = 0; $i <= ($n - 1) / 2; $i++) {
                
                        $myArray[2 * $i] = $myArray[$i];
                        $myArray[2 * $i + 1] = $myArray[$i] + $myArray[$i + 1];
                
                    };
                // conditions for n that is an even number
                } else {
                    for ($i = 0; $i <= $n / 2; $i++) {
                
                        $myArray[2 * $i] = $myArray[$i];
                        $myArray[2 * $i + 1] = $myArray[$i] + $myArray[$i + 1];
                
                    };
                    // removing the last elemtn of the array as the index of its last element would be greater than the value of n by one
                   array_pop($myArray);
                };
                $largest = max($myArray);
                // echo '<pre>';
                // print_r($myArray);
                // echo '</pre>';
                echo "<p>Największa liczba w zbiorze, której ostatni element ma index <span style='font-weight:bold'>".$n."</span> to: <span style='font-weight:bold'>".$largest."</span></p>";
                };
                findLargest(htmlentities($_POST['number']));
        } else {
            echo "<p style='color:red'>Wpisz liczbę całkowitę w zakresie 1 do 99999 włącznie</p>";
        };

    };
    ?>
</body>
</html>