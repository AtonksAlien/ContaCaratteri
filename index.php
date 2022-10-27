<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            background-color: #f1f1f1;
        }

        .container{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            flex-direction: column;
        }

        .input{
            margin: 10px;
        }

        form{
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 10px;
        }
    </style>
    <title>ContaCaratteri</title>
</head>
<body>
    <div class="container">
        <div class="input">
        <form action="index.php" method="post">
            <input type="text" name="stringa">
            <input type="submit" value="Invia">
        </div>
        <div class="out">
            <?php
            if (isset($_POST["stringa"])) {
                $stringa = $_POST["stringa"];

                //Cancella spazi superflui
                $stringa = trim($stringa);
                $stringa = preg_replace('/\s+/', ' ', $stringa);

                $vocali = 0;
                $consonanti = 0;
                $numeri = 0;
                $caratteri = 0;

                //Ricavo la lunghezza della frase
                $lunghezza = strlen($stringa);

                //Conto numero parole
                $parole = explode(" ", $stringa);
                $numParole = count($parole);


                if ($stringa != "") {
                    echo "La frase è: " . $stringa . "<br>";
                    echo "La frase è composta da " . $numParole . " parole" . "<br>";

                    //Controllo ogni carattere della frase
                    for ($i = 0; $i < $lunghezza; $i++) {

                        //Controllo se è un numero
                        if (is_numeric($stringa[$i])) {
                            $numeri++;

                            //Controllo se è una lettera
                        } elseif (preg_match('/[A-Za-z]/', $stringa[$i])) {

                            //Controllo se è una vocale
                            if (preg_match('/[aeiouAEIOU]/', $stringa[$i])) {
                                $vocali++;
                            } else {
                                $consonanti++;
                            }

                            //Controllo se è un carattere speciale diverso da uno spazio
                        } elseif ($stringa[$i] != " ") {
                            $caratteri++;
                        }

                        //Controllo quanti e quali caratteri sono ripetuti
                        $conta = substr_count($stringa, $stringa[$i]);
                        if ($conta > 1) {
                            echo "Il carattere " . $stringa[$i] . " è ripetuto " . $conta . " volte" . "<br>";
                        }

                    }
                    echo "Numero di vocali: " . $vocali . "<br>";
                    echo "Numero di consonanti: " . $consonanti . "<br>";
                    echo "Numero di numeri: " . $numeri . "<br>";
                    echo "Numero di caratteri speciali: " . $caratteri . "<br>";    
                } else {
                    echo "Inserisci una frase";
                }
            }
    
            ?>
        </div>
    </div>

</body>
</html>