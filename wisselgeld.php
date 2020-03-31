<?php
$euroArray   = array(
    '50',
    '20',
    '10',
    '5',
    '2',
    '1'
);
$inputTotaal = $argv[1];


if ($inputTotaal <= 0.05) {
    echo "Foutmeldig. Mogelijke oorzaken: " . PHP_EOL . "- U hebt geen bedrag meegegeven dat omgewisseld dient te worden" . PHP_EOL . "- U heeft geen geldig bedrag mee gegeven";
    exit;
}

if (is_numeric($inputTotaal)) {
} else {
    exit;
}

$euroTotaal       = intval($inputTotaal);
$restanten        = $inputTotaal;
$inputTotaal      = round($inputTotaal += 0.02, 2, PHP_ROUND_HALF_UP);
$inputCent        = ($inputTotaal - $euroTotaal) * 100;
$restantenCentjes = $inputCent;
foreach ($euroArray as $waarden) {
    if ($inputTotaal > 0) {
        $totaal = floor($restanten / $waarden);
        if ($totaal > 0) {
            echo "U krijgt $totaal x €$waarden " . PHP_EOL;
            $inputTotaal = $restanten;
            $restanten   = floor($restanten % $waarden);
        }
    }
}
$centjes = array(
    '50',
    '20',
    '10',
    '5'
);
foreach ($centjes as $waarden2) {
    if ($inputCent > 0) {
        $totaalCentjes = floor($restantenCentjes / $waarden2);
        if ($totaalCentjes > 0) {
            echo "U krijgt $totaalCentjes x $waarden2 cent" . PHP_EOL;
            $inputCent        = $restantenCentjes;
            $restantenCentjes = ($restantenCentjes % $waarden2);
        }
    }
}


?>
