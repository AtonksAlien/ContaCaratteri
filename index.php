<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="index.php" method="post">
            <input type="text" name="stringa">
            <input type="submit" value="Invia">
    </div>

    <div class="out">
        <?php
        if (isset($_POST["stringa"])) {
            $stringa = $_POST["stringa"];
            $vocali = 0;
            $consonanti = 0;
            $numeri = 0;
            $caratteri = 0;
            $lunghezza = strlen($stringa);
            $parole = explode(" ", $stringa);
            $numParole = count($parole);
            echo "La frase è: " . $stringa . "<br>";
            echo "La frase è composta da " . $numParole . " parole" . "<br>";
            for ($i = 0; $i < $lunghezza; $i++) {
                if (is_numeric($stringa[$i])) {
                    $numeri++;
                } elseif (preg_match('/[A-Za-z]/', $stringa[$i])) {
                    if (preg_match('/[aeiouAEIOU]/', $stringa[$i])) {
                        $vocali++;
                    } else {
                        $consonanti++;
                    }
                } elseif ($stringa[$i] != " ") {
                    $caratteri++;
                }
                $count = 0;
                for ($j = 0; $j < $lunghezza; $j++) {
                    for ($k = $j; $k > 0 ; $k--) { 
                        if ($stringa[$i] == $stringa[$j] && $i == 32 && $stringa[$j] = $stringa[$k]) {
                            $count++;
                        }
    
                    }
                }
                if ($count > 1) {
                    echo $stringa[$i] . " è stato ripetuto " . $count . " volte" . "<br>";
                }
            }
            echo "Numero di vocali: " . $vocali . "<br>";
            echo "Numero di consonanti: " . $consonanti . "<br>";
            echo "Numero di numeri: " . $numeri . "<br>";
            echo "Numero di caratteri speciali: " . $caratteri . "<br>";
        }

        ?>
    </div>
</body>
</html>