<div id="tarifa_hora">
  <div>
  	<h3>Tarifas de Última Hora</h3>
    <ol>
      <?php foreach ($this->ultima_hora as $ultima_hora_row) { ?>
        <li class="contemfloat">
          <h4><?php echo $ultima_hora_row->hot_nome; ?></h4>
          <strong>R$ <?php echo number_format($ultima_hora_row->blo_tarifafinal, 2, ',', '.'); ?></strong>
          <a href="/hotel/index/<?php echo $ultima_hora_row->hot_permalink . '/' . $ultima_hora_row->cap_permalink . '/' . $ultima_hora_row->tap_permalink; ?>" title="Reservar este hotel">Reservar neste hotel</a>
        </li>
      <?php } ?>
    </ol>
	</div>
</div>