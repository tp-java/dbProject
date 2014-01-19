<tr>
        <td class="table__cell table__cell_fio"><?php echo $client->l_name ?></td>
        <td class="table__cell table__cell_fio"><?php echo $client->f_name ?></td>
        <td class="table__cell table__cell_fio"><?php echo $client->s_name ?></td>
        <td class="table__cell table__cell_address"><?php echo $client->address ?></td>
        <td class="table__cell table__cell_comment"><?php echo $client->comment ?></td>
        <td class="table__cell table__cell_status">
                <button class="btn btn
                <?php
                switch($client->status) {
                  case 0:
                    echo '-primary">позвонить';
                    break;
                  case 1:
                    echo '-danger">выслать&nbsp;offer';
                    break;
                  case 2:
                    echo '-success">одобрен&nbsp;offer';
                    break;
                  case 3:
                    echo '-warning">проходит&nbsp;сделка';
                    break;
                  case 4:
                    echo '-warning">перечисление&nbsp;$';
                    break;
                  case 5:
                    echo '-info">успешно&nbsp;закрыт';
                    break;
                  case 6:
                    echo '-inverse">облом';
                    break;
                }
                
                ?>    
                </button>
        </td>							
</tr>

