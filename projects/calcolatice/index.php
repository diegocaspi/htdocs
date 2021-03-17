<?php
$n1 = isset($_POST['n1']) ? $_POST['n1'] : 0;
$n2 = isset($_POST['n2']) ? $_POST['n2'] : 0;

$result = 0;

if (isset($_POST['t'])) {
    switch ($_POST['t']) {
        case 'somma':
            $result = $n1 + $n2;
            break;
        case 'sottrazione':
            $result = $n1 - $n2;
        case 'moltiplicazione':
            $result = $n1 * $n2;
    }
}

?>
<html>
<title>
    Calcolatrice
</title>

<body>
    <h1>Calcolatrice</h1>
    <form method="POST">
        <p>Primo numero</p>
        <input type='text' name='n1' />
        <br /> <br />
        <p>Secondo numero</p>
        <input type='text' name='n2' />

        <br /> <br />
        <input type="radio" id="somma" name="t" value="somma">
        <label for="somma">Somma</label><br>
        <input type="radio" id="sottrazione" name="t" value="sottrazione">
        <label for="sottrazione">Sottrazione</label><br>
        <input type="radio" id="moltiplicazione" name="t" value="moltiplicazione">
        <label for="moltiplicazione">Moltiplicazione</label>

        <br /> <br />
        <input type='submit' />
    </form>
    <br />
    <?php echo '<p>Risultato: ' . $result . '</p>' ?>
</body>

</html>