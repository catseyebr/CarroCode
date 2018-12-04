<h3>Os Mais Buscados</h3>
<ol>
	<?php foreach($this->mais_buscados as $row):?>
		<li class="contemfloat">
      <h4><a href="/hotel/index/<?php echo $row->hot_permalink; ?>" title="Veja mais informaes sobre este hotel <?php echo $row->hot_nome?>"><?php echo $row->hot_nome?></a></h4>
			<a class="detalhes" href="/hotel/index/<?php echo $row->hot_permalink; ?>" title="Veja mais informaes sobre este hotel <?php echo $row->hot_nome?>">+ detalhes</a>
		</li>
		<!-- <tr>
			<td colspan="2"><img src="/images/linha.gif" /></td>
		</tr> -->
	<?php endforeach;?>
</ol>