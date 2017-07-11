<strong>STORNO POBYTU</strong><br />
Vážený majiteli/majitelko rekreačního objektu <?php echo $order['HouseDate']['House']['full_name']; ?>,<br />
zasíláme Vám informaci o STORNU objednaného pobytu:<br /> <br />
<strong>číslo objednávky:</strong> <?php echo $order['Order']['code']; ?><br />
<strong>jméno zákazníka:</strong> <?php echo $order['User']['full_name']; ?><br />
<br>
<?php
$canceled = new DateTime($order['Order']['canceled']);
$startDay = new DateTime($order['Order']['start_day']);
$diff = $canceled->diff($startDay)->format('%a');
$percentage = 1;
if ($diff >= 41) {
    $percentage = 0.1;
} elseif ($diff >= 11) {
    $percentage = 0.5;
} elseif ($diff >= 4) {
    $percentage = 0.8;
}
//echo $diff . ' (' . $percentage * 100 . '%)';
?>
Objednávka stornována dne: <?php echo $this->Time->format($order['Order']['canceled'], '%e. %-m. %Y') . ' (' . $diff . ' dnů před začátkem pobytu)'; ?><br>
Na základě data stornování byl vyměřen storno poplatek ve výši <b><?php echo $order['Order']['owner_total'] * $percentage; ?> Kč</b><br>
<?php
$ownerReceived = 0;
$ownerReceived += $order['Order']['owner_deposit'] + $order['Order']['owner_payment'];

if ($ownerReceived > 0) {
    echo 'Jelikož Vám k tomuto datu uhrazeno již ' . $ownerReceived . ' Kč, ';

    $sum = $order['Order']['owner_price'] * $percentage - $ownerReceived;

    if ($sum > 0) {
        echo 'zašleme Vám pouze doplatek ve výši <b>' . $sum . ' Kč</b><br>';
    } elseif ($sum < 0) {
        'zašlete nám prosím přeplatek ve výši <b>' . abs($sum) . ' Kč</b> na náš účet č. <b>' . $order['Company']['account'] . '</b> a použijte variabilní symbol <b>' . $order['Order']['code'] . '</b>.';
    } else {
        'je storno poplatek již plně uhrazen.';
    }
} else {
    echo 'Částku Vám zašleme na Váš účet.';
}
?>
