<ul id="menu_cadastro_cliente">
	
	<?php if ($this->session->userdata('reservas') != NULL) {?>
		<li><a href="/cliente/reservaAtual">Reserva Atual</a></li>
	<?php } ?>
	
	<li><a href="/cliente/reservas/futuras">Reservas Futuras</a></li>
	<li><a href="/cliente/reservas/passadas">Reservas Passadas</a></li>
	<li><a href="/cliente/exibir">Dados Cadastrais</a></li>
</ul>