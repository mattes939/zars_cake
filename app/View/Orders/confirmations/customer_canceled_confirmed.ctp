<strong>POTVRZENÍ PŘIJETÍ STORNO POPLATKU</strong><br />
<?php
//debug($order);
?>
Číslo dokladu: <?php echo $order['Order']['code']; ?><br />
Variabilní symbol: <?php echo $order['Order']['code']; ?><br />
<hr />
<?php
echo $order['Company']['name'] . '<br>';
echo $order['Company']['street'] . ', ' . $order['Company']['psc'] . ', ' . $order['Company']['city'] . '<br>';
echo $order['Company']['ico'] . '<br>';
echo 'č. ú.' . $order['Company']['account'];

?>
<hr>
<strong>Objednávka:</strong><br />
<?php
echo $order['User']['first_name'] . ' ' . $order['User']['last_name'] . '<br>';
echo $order['User']['Address'][0]['street'] . ', ' . $order['User']['Address'][0]['psc'] . ', ' . $order['User']['Address'][0]['city'] . '<br>';
?>
<br>Rekreační objekt: <?php echo $order['HouseDate']['House']['full_name']; ?>
<br>Termín: <?php echo $this->Time->format($order['Order']['start_day'], '%e. %-m. %Y') . ' - ' . $this->Time->format($order['Order']['end_day'], '%e. %-m. %Y'); ?>
<br>Počet osob celkem: <?php echo $order['Order']['attendants']; ?>, z toho dospělých: <?php
echo $order['Order']['adults'];
if (!empty($order['Order']['young'])) {
    echo ', dětí 4-18 let: ' . $order['Order']['young'];
}
if (!empty($order['Order']['children'])) {
    echo ', dětí do 3 let: ' . $order['Order']['children'];
}
?>
<br>Domácí zvíře <?php echo $order['Order']['animals'] ? 'ANO ' . $order['Order']['animals_details'] : 'NE'; ?>
<br> <?php
if (!empty($order['Order']['customer_notes'])) {
    echo '<br>Poznámka: ' . $order['Order']['customer_notes'] . '<br>';
}
?>
<hr>
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
$customerPaid = 0;
foreach ($order['Deposit'] as $i => $deposit) {
    $customerPaid += $deposit['price_paid'];
}
?>
Potvrzujeme uhrazení storno poplatku ve výši <b><?php echo $order['Order']['billing_price'] * $percentage - $customerPaid; ?> Kč</b>.