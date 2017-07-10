<strong>POUKAZ k POBYTU č. <?php echo $order['Order']['code']; ?></strong><br />
<br />
CA ZARS<br />
Jičínská 543, 742 58 Příbor<br />
mobil: 608 77 55 82<br />
e-mail: info-zars@email.cz<br />
<br />
<strong>Objednávající:</strong><br />
<?php
echo $order['User']['first_name'] . ' ' . $order['User']['last_name'] . '<br>';
echo $order['User']['Address'][0]['street'] . ', ' . $order['User']['Address'][0]['psc'] . ', ' . $order['User']['Address'][0]['city'] . '<br>';
?>
<br>Rekreační objekt: <?php echo $order['HouseDate']['House']['full_name']; ?>
<br>Termín nástupu: <?php echo '<b>' . $this->Time->format($order['Order']['start_day'], '%e. %-m. %Y') . '</b>, čas nástupu: <b>' . $order['Order']['start_time'] . '</b>'; ?>
<br>Termín ukončení: <?php echo '<b>' . $this->Time->format($order['Order']['end_day'], '%e. %-m. %Y') . '</b>, čas ukončení: <b>' . $order['Order']['end_time'] . '</b>'; ?>
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
<br /><br />
<strong>Informace o majiteli objektu a předání klíčů:</strong><br />
Majitel: <?php echo $order['HouseDate']['House']['User']['full_name']; ?><br />
Tel. kontakt: <?php echo $order['HouseDate']['House']['User']['phone1']; ?><br />
Předání klíčů: <?php
$keysArray = [252, 253, 254, 255, 349];
foreach ($keysArray as $key) {
    if ($properties[$key]['Value'][0]['switch']) {
        echo $properties[$key]['Property']['name'];
        if (!empty($properties[$key]['Value'][0]['value'])) {
            echo ' ' . $properties[$key]['Value'][0]['value'];
        }
        if (!empty($properties[$key]['Value'][0]['value2'])) {
            echo ' ' . $properties[$key]['Value'][0]['value2'];
        }
        break;
    }
}
?><br /><br />
<br /><br /><strong>PŘÍJEZDOVÁ CESTA K OBJEKTU:</strong><br /><br />
<strong>Adresa objektu:</strong> <?php echo $properties[1]['Value'][0]['value'] . ', ' . $properties[0]['Value'][0]['value']; ?><br />
<strong>GPS:</strong>  <?php echo $properties[250]['Value'][0]['value']; ?><br />
<strong>Příjezdová cesta:</strong>  <?php echo $properties[251]['Value'][0]['value']; ?><br />

<br />
Jestliže nemůžete převzít objekt dle ujednání, např. kvůli dopravní zácpě, z osobních důvodů apod., je nutno informovat majitele objektu nebo pověřenou osobu o zpoždění !
<br />
DOPLATKY <br /> <br /> <br /> <br />
<?php
//debug($properties);
?>
<strong>Povlečení na lůžkoviny:</strong>
<?php
for ($i = 280; $i <= 282; $i++) {
    if ($properties[$i]['Value'][0]['switch']) {
        echo $properties[$i]['Property']['name'] . ' ';
    }
}
?><br>
<strong>Domácí zvíře v objektu:</strong>
<?php
for ($i = 269; $i <= 273; $i++) {
    if ($properties[$i]['Value'][0]['switch']) {
        echo $properties[$i]['Property']['name'] . ' ';
    }
}
?><br>
<strong>Kouření uvnitř objektu:</strong> 
<?php
for ($i = 277; $i <= 279; $i++) {
    if ($properties[$i]['Value'][0]['switch']) {
        echo $properties[$i]['Property']['name'] . ' ';
    }
}
?><br>
<strong>Dřevo k dispozici:</strong> 
<?php
for ($i = 283; $i <= 285; $i++) {
    if ($properties[$i]['Value'][0]['switch']) {
        echo $properties[$i]['Property']['name'] . ' ';
    }
}
?><br>
<strong>Voda v objektu:</strong>
<?php
for ($i = 286; $i <= 289; $i++) {
    if ($properties[$i]['Value'][0]['switch']) {
        echo $properties[$i]['Property']['name'] . ' ';
    }
}
?><br>
<?php
if (!empty($properties[302]['Value'][0]['value'])) {
    echo '<strong>Další služby objektu:</strong>';
    echo $properties[302]['Value'][0]['value'] . '<br>';
}
?>
<br /><strong>Kauce:</strong> 
<?php
for ($i = 274; $i <= 276; $i++) {
    if ($properties[$i]['Value'][0]['switch']) {
        if (empty($properties[$i]['Value'][0]['value'])) {
            echo $properties[$i]['Property']['name'] . ' ';
        } else {
            echo $properties[$i]['Value'][0]['value'];
        }
    }
}
?><br><br />
Pro upřesňující informace ohledně příjezdu, povlečení, vybavení objektu, zda je voda v objektu pitná či užitková apod. Vám doporučujeme kontaktovat přímo majitele objektu.<br /><br />

<br /><br /><strong>PŘEDÁVACÍ PROTOKOL:</strong><br />
<strong>Jméno zákaznika:</strong> <?php echo $order['User']['full_name']; ?>,  datum narození: <?php echo $this->Time->format($order['User']['birthday'], '%e. %-m. %Y'); ?><br />
Poukaz č: <?php echo $order['Order']['code']; ?><br /><br />
<strong>Při zahájení pobytu:</strong><br />
Objekt jsme převzal k užívání dle ubytovacích podmínek a složil majiteli kauci ve výši .........  Kč<br /> <br />
dne:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; podpis zákazníka: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;podpis majitele:
<br /><br />
<strong>Při ukončení pobytu:</strong><br />
Objekt jsem předal majiteli, přičemž byly/nebyly zjištěny škody na objektu a zařízení.<br />
Kauce byla vrácena ve výši ........... Kč<br /><br />
dne:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; podpis zákaznika: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;podpis majitele:<br /><br />

<strong>ODEČET:</strong> (viz. ceník doplatky na místě)<br /><br />
<strong>Položka:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Počáteční stav:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Konečný stav:</strong><br /><br />
Elektrická energie<br /><br />
Plyn<br /><br />
Voda<br /><br />
dne:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; podpis zákazníka: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;podpis majitele:

<br /><br />
<strong>UBYTOVACÍ PODMÍNKY</strong><br />
1, Zákazník je povinen dodržovat čas nástupu a čas ukončení pobytu uvedený v poukazu.<br />
2, Zákazník nastupuje na pobyt s poukazem k pobytu vystaveným cestovní agenturou ZARS, kterým se při nástupu prokáže. <br />
3, Zákazník je povinen dodržet nahlášený počet osob k ubytování. Nenahlášenou osobu má majitel právo neubytovat. Rovněž může odmítnout účast domácího zvířete neuvedeného v poukazu.<br />
4, V průběhu pobytu není zákazníkovi dovoleno nehlášené ubytování pozvaných návštěv a jiných osob.           <br />
5, Majitel objektu zodpovídá za bezvadné poskytnutí ubytovacích a jiných dohodnutých služeb. Při zahájení pobytu seznámí zákazníka s technickým a ubytovacím řádem, s počátečním stavem elektroměru, plynoměru aj.                            <br />
6, Pobyt zákazníků v objektu se řídí výhradně pokyny majitele objektu, jemuž je zákazník odpovědný i za případné škody. Před odevzdáním objektu majiteli je zákazník povinen po sobě uklidit.                        <br />
7, Majitel objektu může vybrat od zákazníka při zahájení pobytu kauci, ze které je čerpána úhrada za případné škody na zařízení objektu. Při odevzdání objektu bez poškození se kauce v den ukončení pobytu vrací zákazníkovi v plné výši.  <br />
8, Zákazník má právo na reklamaci, pokud objednané služby nebyly poskytnuty v plném rozsahu nebo kvalitě. Reklamaci závad může zákazník uplatnit pouze u majitele nebo u pověřené osoby v místě pobytu. 
Majitel odpovídá za technický a hygienický stav objektu v souladu s existujícími normami. Dále odpovídá za vybavenost objektu a šíři nabízených služeb, jak je uvedeno v nabídkovém katalogu. 
Zákazník je povinen zjištěné nedostatky a závady neprodleně oznámit majiteli objektu (pověřené osobě), aby mohla být učiněna jejich náprava. 
Pokud se nedostatky a závady opravňující zákazníka k reklamaci nepodaří neprodleně odstranit, je nutné uplatňovat nároky vůči majiteli přímo na místě kupříkladu formou slev. 
Reklamaci zprostředkovatelských služeb uplatňuje zákazník u CA ZARS.

<br /><br /> 