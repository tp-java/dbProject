<div class="title">
	<h4><?php echo ($client->getLastName() . ' ' . $client->getFirstName() . ' ' . $client->getSecondName()) ?> </h4>
</div>
<div class="form-horizontal call__body">
	<div class="control-group">
		<label class="control-label lead" for="inputWarning">Телефоны:</label>
		<div class="controls lead value">
			<?php 
                        foreach($client->getTelNumbers() as $phone)
                            echo (' ' . $phone->number);
                        ?>
		</div>
	</div>	

	<div class="control-group">
		<label class="control-label lead" for="inputWarning">Адрес:</label>
		<div class="controls lead value">
			<?php 
                        if ($client->getAddress()) 
                            echo $client->getAddress();
                        else
                            echo ('<input class="input-xlarge" type="text">');
                        ?>
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label lead" for="inputWarning">Статус:</label>
		<div class="controls">
                    <?php $tmp_status = $client->getStatus();?>
			<select name="result">
			<option <?php if ($tmp_status == 'call') echo('selected');?>>позвонить </option>
			<option <?php if ($tmp_status == 'send_offer') echo('selected');?>>выслать&nbsp;offer</option>
			<option <?php if ($tmp_status == 'offer_approve') echo('selected');?>>одобрен&nbsp;offer</option>
			<option <?php if ($tmp_status == 'deal') echo('selected');?>>проходит&nbsp;сделка</option>
			<option <?php if ($tmp_status == 'money_wating') echo('selected');?>>перечисление&nbsp;</option>
			<option <?php if ($tmp_status == 'closed') echo('selected');?>>успешно&nbsp;закрыт</option>
			<option <?php if ($tmp_status == 'fail') echo('selected');?>>облом</option>
			</select>
		</div>
	</div>

	<div class="modal__table-container">
			<div class="modal-table__title">
				<h4>Offers:</h4>
			</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="table__cell table__cell_off-type">Тип оффера</th>
					<th class="table__cell table__cell_off-comment">Комментарий</th>
					<th class="table__cell table__cell_off-result">Результат</th>
					<th class="table__cell table__cell_off-price">Цена</th>	
				</tr>
			</thead>
			<tbody>
                                <?php
                                $offers = $client->getOffers();
				foreach($offers as $offer)
                                    include('client_modal_offer_tpl.php')
                                ?>
			</tbody>
                        
		</table>
	</div>

	<div class="modal__table-container">
		<div class="modal-table__title">
			<h4>Звонки</h4>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="table__cell table__cell_surname">Сотрудник</th>
					<th class="table__cell table__cell_result">Результат</th>
					<th class="table__cell table__cell_duration">Длительность</th>
					<th class="table__cell table__cell_comment">Комментарий</th>
					<th class="table__cell table__cell_date">Дата</th>
				</tr>
			</thead>
			<tbody>
                                <?php
				foreach($client->getCalls() as $call)
                                    include('client_modal_calls_tpl.php')
                                ?>
			</tbody>
		</table>									
	</div>
</div>