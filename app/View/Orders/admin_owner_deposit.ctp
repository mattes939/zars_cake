
<strong>Informace majiteli objektu o zaslané záloze za pobyt od CA ZARS</strong><br />
<hr>
Vážený majiteli/majitelko rekreačního objektu <?php echo $order['HouseDate']['House']['full_name']; ?>,<br />
zasíláme Vám informaci o záloze za objednaný pobyt:<br /> <br />
<strong>číslo objednávky:</strong> <?php echo $order['Order']['code']; ?><br />
<strong>jméno zákazníka:</strong> <?php echo $order['User']['full_name'];?><br />
<strong>tel. na zákazníka:</strong> <?php echo $order['User']['phone1'];?><br />
<strong>Počet osob celkem:</strong> <?php echo $order['Order']['attendants']; ?>, z toho dospělých: <?php echo $order['Order']['adults']; 
if(!empty($order['Order']['young'])){
    echo ', dětí 4-18 let: '.$order['Order']['young'];
}
if(!empty($order['Order']['children'])){
    echo ', dětí do 3 let: '.$order['Order']['children'];
} 
?>
<br><b>termín:</b> <?php echo $this->Time->format($order['Order']['start_day'], '%e. %-m. %Y') . ' - ' . $this->Time->format($order['Order']['end_day'], '%e. %-m. %Y');?><br><br>
<?php
if(!empty($order['Order']['owner_deposit'])){
    echo '<b>záloha majiteli:</b> '.$order['Order']['owner_deposit'].' Kč, <b>zaplacena dne:</b> '.$order['Order']['owner_deposit_date'];
}
//if(!empty($order['Order']['owner_payment'])){
//    echo '<b>platba majiteli:</b> '.$order['Order']['owner_payment'].' Kč, <b>zaplacena dne:</b> '.$order['Order']['owner_payment_date'];
//}
?>
<strong>bankovní spojení: </strong><?php echo $order['HouseDate']['House']['User']['account']; ?>
<br /><br />Těšíme se na další spolupráci a jsme s pozdravem, CA ZARS, Příbor
