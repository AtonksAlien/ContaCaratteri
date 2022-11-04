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
            background-color: #637394;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container{
            width: 50%;
            height: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            border: 3px solid #000;
            background-color: #fff;
            flex-direction: column;
            padding: 20px;
        }

        .title{
            font-size: 50px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .input{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 10px;
            width: 100%;
        }

        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 50%;
            gap: 10px;
        }

        .input input{
            width: 80%;
            height: 30px;
            border-radius: 5px;
            border: 1px solid #000;
            padding: 5px;
        }
    </style>
    <title>ContaCaratteri</title>
</head>
<body>
    <div class="container">
        <div class="input">
            <h1 class="title">Inserisci la frase</h1>
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
                }
            }
    
            ?>
        </div>
    </div>

</body>
</html>