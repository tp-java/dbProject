<tr>
        <td class="table__cell table__cell_fio"><?php echo $client->getLastName() ?></td>
        <td class="table__cell table__cell_fio"><?php echo $client->getFirstName() ?></td>
        <td class="table__cell table__cell_fio"><?php echo $client->getSecondName() ?></td>
        <td class="table__cell table__cell_address"><?php echo $client->getAddress() ?></td>
        <td class="table__cell table__cell_comment"><?php echo $client->getComment() ?></td>
        <td class="table__cell table__cell_status">
                <?php
                switch($client->getStatus()) {
                  case 'call':
                    echo '<button class="btn btn-primary">позвонить';
                    break;
                  case 'send_offer':
                    echo '<button class="btn btn-danger">выслать&nbsp;offer</button>';
                    break;
                  case 'offer_approve':
                    echo '<button class="btn btn-success">одобрен&nbsp;offer</button>';
                    break;
                  case 'deal':
                    echo '<button class="btn btn-warning">проходит&nbsp;сделка</button>';
                    break;
                  case 'money_wating':
                    echo '<button class="btn btn-warning">перечисление&nbsp;$</button>';
                    break;
                  case 'closed':
                    echo '<button class="btn btn-info">успешно&nbsp;закрыт</button>';
                    break;
                  case 'fail':
                    echo '<button class="btn btn-inverse">облом</button>';
                    break;
                }
                ?>    
                
        </td>							
</tr>

