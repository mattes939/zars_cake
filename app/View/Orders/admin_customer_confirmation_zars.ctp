
<strong>POTVRZENÍ OBJEDNÁVKY - VÝZVA K ZAPLACENÍ</strong><br />

(slouží jako potvrzení objednaných služeb a k vyúčtování plateb)<br />
<br />
Číslo dokladu: <?php echo $order['Order']['code']; ?><br />
Variabilní symbol: <?php echo $order['Order']['code']; ?><br />
<hr />
<?php
echo $order['Company']['name'] . '<br>';
echo $order['Company']['street'] . ', ' . $order['Company']['psc'] . ', ' . $order['Company']['city'] . '<br>';
echo $order['Company']['ico'] . '<br>';
echo 'č. ú.' . $order['Company']['bank_account'] . '/' . $order['Company']['bank_code'];

if ($order['Order']['pp']) {
    
}
?>
<hr>
<strong>Objednávka:</strong><br />
<?php
echo $order['User']['full_name'] . '<br>';
echo $order['User']['Address'][0]['street'] . ', ' . $order['User']['Address'][0]['psc'] . ', ' . $order['User']['Address'][0]['city'] . '<br>';

?>
<br>Rekreační objekt: <?php echo $order['HouseDate']['House']['full_name']; ?>
<br>Termín: <?php echo $this->Time->format($order['Order']['start_day'], '%e. %-m. %Y') . ' - ' . $this->Time->format($order['Order']['end_day'], '%e. %-m. %Y'); ?>
<br>Počet osob celkem: <?php echo $order['Order']['attendants']; ?>, z toho dospělých: <?php echo $order['Order']['adults']; 
if(!empty($order['Order']['young'])){
    echo ', dětí 4-18 let: '.$order['Order']['young'];
}
if(!empty($order['Order']['children'])){
    echo ', dětí do 3 let: '.$order['Order']['children'];
} 
?>
<br>Domácí zvíře <?php echo $order['Order']['animals'] ? 'ANO ' . $order['Order']['animals_details'] : 'NE'; ?>
<br> <?php
if (!empty($order['Order']['customer_notes'])) {
    echo '<br>Poznámka: ' . $order['Order']['customer_notes'] . '<br>';
}
?>
<hr><strong>Rozpis plateb</strong><br />
Katalogová cena: <?php echo $order['Order']['price']; ?> Kč<br>
Sleva: <?php echo empty($order['Order']['discount']) ? 0 : $order['Order']['discount']; ?> Kč<br>
<?php
if ($order['Order']['pp']) {
    echo 'Výsledná cena: ' . $order['Order']['final_price'] . ' Kč<br />';
    echo 'Provize smluvního prodejce: ' . $order['Order']['provision'] . ' Kč<br />';
}
?>
Fakturační cena: <?php echo $order['Order']['billing_price']; ?> Kč<br>
<br>
<?php
foreach ($order['Deposit'] as $deposit) {
    if (!empty($deposit['price'])) {
        echo $deposit['DepositType']['name'] . ': ' . $deposit['price'] . ', splatnost do ' . $this->Time->format($deposit['maturity'], '%e. %-m. %Y') . '<br>';
        
    }
}
?><hr>
<strong>
    Celkem: <?php echo $order['Order']['billing_price']; ?> Kč<br>
    Majitel: <?php echo $order['Order']['owner_total']; ?> Kč<br>
    Zajištění ubytování <?php echo $order['Order']['billing_price'] - $order['Order']['owner_total']; ?> Kč
</strong>

<br><br>
V Příboře dne <?php echo $this->Time->format($order['Order']['confirmed'], '%e. %-m. %Y'); ?>
<br><br />
<?php echo $order['Company']['name']; ?><br>

Jičínská 543, Příbor<br />     
mobil: 608 77 55 82<br />
e-mail: info-zars@email.cz<br />
www.zars.cz<br />
