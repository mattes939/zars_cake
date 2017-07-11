<strong>OBJEDNÁVKA POBYTU</strong><br /><hr>
Zákazník: <?php
echo $order['User']['full_name'] . ', ';
echo $order['User']['Address'][0]['city'] . '<br>';
?>
<br>Rekreační objekt: <?php echo $order['HouseDate']['House']['full_name']; ?>
<br>Termín nástupu: <?php echo $this->Time->format($order['Order']['start_day'], '%e. %-m. %Y') . ', ' . $order['Order']['start_time']; ?>
<br>Termín ukončení: <?php echo $this->Time->format($order['Order']['end_day'], '%e. %-m. %Y') . ', ' . $order['Order']['end_time']; ?>
<br>Počet osob celkem: <?php echo $order['Order']['attendants']; ?>, z toho dospělých: <?php echo $order['Order']['adults']; 
if(!empty($order['Order']['young'])){
    echo ', dětí 4-18 let: '.$order['Order']['young'];
}
if(!empty($order['Order']['children'])){
    echo ', dětí do 3 let: '.$order['Order']['children'];
}
?>
<br>Domácí zvíře <?php echo $order['Order']['animals'] ? 'ANO ' . $order['Order']['animals_details'] : 'NE'; ?>
<br>
<br>
Cena celkem: <?php echo $order['Order']['owner_total']; ?> Kč
<br><br> <?php
if (!empty($order['Order']['owner_notes'])) {
    echo '<br>Poznámka: ' . $order['Order']['owner_notes'] . '<br>';
}
?>

<br>
Ubytovací služby. Prosím o potvrzení objednávky zpět na náš email. Děkuji a zůstávám s přáním pěkného dne. Monika Hadová za CA ZARS
<br><br />
CA ZARS<br>

Jičínská 543, Příbor<br />     
mobil: 608 77 55 82<br />
e-mail: info-zars@email.cz<br />
www.zars.cz<br />
