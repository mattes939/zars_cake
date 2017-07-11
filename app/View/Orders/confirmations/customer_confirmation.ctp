<?php if (!$order['Order']['pp']) { ?>
    Vážený zákazníku, děkujeme za Vaši objednávku.<br />
    Tato e-mailová zpráva slouží jako potvrzení Vaší objednávky a najdete zde rozpis jednotlivých plateb.<br />
    Již 20 let pro Vás připravujeme pobyty na chatách a chalupách v České a Slovenské republice.<br />
    Přejeme Vám krásnou dovolenou plnou odpočinku a pohody.<br />
    <br />
<?php } ?>
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
echo $order['User']['first_name'] . ' ' . $order['User']['last_name'] . '<br>';
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
}  ?>
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
?><br>
Záloha i doplatek jsou splatné k uvedenému datu bezhotovostním převodem na účet, vkladem na účet nebo poštovní složenkou na bankovní účet č: <strong> <?php echo $order['Company']['account']; ?></strong><br /><br />
Na platebním dokladu vždy uvedete variabilní symbol: <strong><?php echo $order['Order']['code']; ?></strong><br />
Bez uvedení správného variabilního symbolu nebude možno platbu identifikovat.<br />
<strong>Rozhodli jste se objednávku zrušit ještě před zaplacením zálohy? Dejte nám o tom prosím neprodleně vědět, ať můžeme termín uvolnit pro další zákazníky.</strong>
<br /><br />
Poukaz k pobytu obdržíte do týdne po zaplacení celé částky. V poukazu k pobytu je uvedena přesná příjezdová cesta, čas nástupu a ukončení pobytu, kontakt na majitele objektu aj. důležité informace. Po obdržení si překontrolujte správnost uvedených dat.
<br><br>
V Příboře dne <?php echo $this->Time->format($order['Order']['confirmed'], '%e. %-m. %Y'); ?>
<br><br />
<?php echo $order['Company']['name']; ?><br>

Jičínská 543, Příbor<br />     
mobil: 608 77 55 82<br />
e-mail: info-zars@email.cz<br />
www.zars.cz<br />