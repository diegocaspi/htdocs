<?php
    $welcome = (isset($_GET['nome']) && isset($_GET['cognome'])) && ($_GET['nome'] != '' && $_GET['cognome']) ?
        "Welcome ".$_GET['nome']. " ".$_GET['cognome'] 
        : 'Insert your credentials';
?>

<html>
    <head>
        <title>
            ciao
        </title>
    </head>
    <body>
        <h1>
            <?php
                echo $welcome;
            ?>
        </h1>

        <form>
            
        </form>
        <form type="GET">
            <p> Nome </p>
            <input type="text" name="nome" value="<?php print_r($_GET['nome']);?>"/>

            <p> Cognome </p>
            <input type="text" name="cognome" value="<?php print_r($_GET['cognome']);?>"/>

            <br /> <br />
            <input type="submit" id="submit" />
        </form>
    </body>
</html>