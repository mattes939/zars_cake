Vážený zákazníku, <br />
Potvrzujeme přijetí platby "<?php echo $deposit['DepositType']['name']; ?>": <strong><?php echo $deposit['Deposit']['price']; ?></strong> Kč, dne <strong><?php echo $this->Time->format($deposit['Deposit']['pay_date'], '%e. %-m. %Y'); ?></strong><br>
za pobyt - objednávku č. <?php echo $deposit['Order']['code']; ?> ( <?php echo $deposit['Order']['HouseDate']['House']['full_name']; ?>, termín: <?php echo $this->Time->format($deposit['Order']['start_day'], '%e. %-m. %Y') .' - '.$this->Time->format($deposit['Order']['end_day'], '%e. %-m. %Y'); ?> ) <br /><br />
ZARS.cz
