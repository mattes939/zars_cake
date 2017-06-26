<?php

App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

/**
 * Reminder Model
 *
 * @property Order $Order
 * @property ReminderType $ReminderType
 */
class Reminder extends AppModel {
    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Deposit' => array(
            'className' => 'Deposit',
            'foreignKey' => 'deposit_id',
            'conditions' => '',
            'fields' => '',
        ),
        'ReminderType' => array(
            'className' => 'ReminderType',
            'foreignKey' => 'reminder_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function sendReminder($orderId, $reminderTypeId) {
        $order = $this->Order->find('first', [
            'conditions' => ['Order.id' => $orderId],
            'contain' => [
            ]
        ]);

        $email = new CakeEmail('smtp');
        $email->to($order['User']['email'], $order['User']['full_name'])
                ->viewVars(['order' => $order])
                ->helpers(['Html', 'Time'])
                ->emailFormat('html')
                ->template('customer_confirmation', 'default')
                ->subject('Potvrzení objednávky - výzva k platbě');
        $email->send();
    }

    public function composeText($depositId) {
        $deposit = $this->Deposit->find('first', [
            'conditions' => ['Deposit.id' => $depositId],
            'contain' => [
                'DepositType',
                'Order' => [
                    'User' => [
                        'Address'
                    ],
                    'HouseDate' => [
                        'House'
                    ],
                    'Company'
                ]
            ]
        ]);
        $subject = 'ZARS - ' . $deposit['DepositType']['name'] . ' - výzva k zaplacení ';
        $text = '<p>Vážený zákazníku,</p>';
        $text .= '<p>k dnešnímu dni evidujeme neuhrazenou částku <b>' . $deposit['Deposit']['price'] . '&nbsp;Kč</b> splatnou ke dni <b>' . strftime('%e. %-m. %Y', strtotime($deposit['Deposit']['maturity'])) . '</b>.</p>';
        $text .= '<p>Detaily objednávky:</p>'
                . '<table><tbody>'
                . '<tr><td>Číslo objednávky:&nbsp;</td><td>' . $deposit['Order']['code'] . '</td></tr>'
                . '<tr><td>Jméno zákazníka:&nbsp;</td><td>' . $deposit['Order']['User']['full_name'] . '</td></tr>'
                . '<tr><td>Název objektu:&nbsp;</td><td>' . $deposit['Order']['HouseDate']['House']['full_name'] . '</td></tr>'
                . '<tr><td>Termín: </td><td>' . strftime('%e. %-m. %Y', strtotime($deposit['Order']['start_day'])) . ' - ' . strftime('%e. %-m. %Y', strtotime($deposit['Order']['end_day'])) . '</td></tr>'
//                . '<tr><td></td><td></td></tr>'
                . '</tbody></table>';
        $text .= '<p>Záloha i doplatek jsou splatné k uvedenému datu bezhotovostním převodem na účet, vkladem na účet nebo poštovní složenkou na bankovní účet č: <b>' . $deposit['Order']['Company']['account'] . '</b></p>
Na platebním dokladu vždy uvedete variabilní symbol: <strong>' . $deposit['Order']['code'] . '</strong><br />
Bez uvedení správného variabilního symbolu nebude možno platbu identifikovat.<br />
<strong>Rozhodli jste se objednávku zrušit ještě před zaplacením zálohy? Dejte nám o tom prosím neprodleně vědět, ať můžeme termín uvolnit pro další zákazníky.</strong>
<br /><br />';
//        debug($text);
//        debug($deposit);die;
        return [
            'subject' => $subject,
            'text' => $text,
            'email' => $deposit['Order']['User']['email'],
            'name' => $deposit['Order']['User']['full_name']
        ];
    }

}
