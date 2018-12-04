<h3>Solicite sua Loca&ccedil;&atilde;o Online</h3>
<form id="pesquisaForm" method="post" action="/pesquisa" onSubmit="return validaCampos()">
	<table width="453" border="0" class="form_busca">
		<tr>
			<td>
				<table width="100%" border="0">
					<tr>
						<td>
                        	<input value="<?php echo $this->cidade_definida;?>" id="cityRetirada" name="cityRetirada" class="campo_maior" onclick="if(this.value=='Digite Cidade de Retirada'){this.value=''}" onblur="if(this.value==''){this.value='Digite Cidade de Retirada'}else{document.getElementById('cityDevolucao').value=this.value}"/>
                        </td>
					</tr>
				</table>
            </td>
        </tr>
		<tr>
			<td>
				<table width="100%" border="0">
					<tr>
						<td>
							<strong>Devolu&ccedil;&atilde;o do Ve&iacute;culo:</strong>
						</td>
						<td>&nbsp;</td>
                        <td>
                        	<label>
                        		<input name="selecDevolucao" type="radio" value="sameCity" checked="checked" onclick="this.value=document.getElementById('cityRetirada').value;" onblur="if(this.value==''){this.value='Digite Cidade de Devolução'}" class="sameCity" />
                            </label>
                        </td>
                        <td>mesma Cidade</td>
                        <td>&nbsp;</td>
                        <td>
                        	<input name="selecDevolucao" type="radio" value="otherCity" onclick="document.getElementById('cityDevolucao').value=''" class="otherCity" />
                        </td>
                        <td>Cidade diferente</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0">
					<tr>
						<td>
							<span>Selecione abaixo o local de devolu&ccedil;&atilde;o de ve&iacute;culo:</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
        <tr>
			<td>
				<table width="100%" border="0" class="devolucao">
					<tr>
						<td>
							<input value="<?php echo $this->cidade_definida2;?>" id="cityDevolucao" name="cityDevolucao" class="campo_maior" onclick="if(this.value=='Digite Cidade de Devolução'){this.value=''}" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0">
					<tr>
						<td width="120">
							<input type="text" value="Data Retirada" id="dataRetirada" name="dataRetirada" class="dataRetirada" /></td>
						<td width="120">
							<select name="horaRetirada" id="horaRetirada" class="campo_selecao">
								<option value="">Hora Retirada</option>
								<?php foreach ($this->arrayHoras as $horas){?>
								<option value="<?php echo $horas?>"><?php echo $horas?></option>
								<?php }?>
                            </select>
						</td>
						<td width="10">&nbsp;</td>
                        <td width="185" align="right">
                        	<select name="categoriasVeiculos" id="categoriasVeiculos" class="campo_categoria">
                            	<option value="todas">Todas as Categorias</option>
                                <?php foreach($this->menu->categorias as $categorias_menu => $links_cat){?>
                                	<option value="<?php echo $links_cat->cat_id;?>"><?php echo $links_cat->cat_nome;?></option>
               					<?php } ?>
                            </select>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0">
					<tr>
						<td width="120">
							<input type="text" value="Data Devolução" id="dataDevolucao" name="dataDevolucao" class="dataDevolucao" />
						</td>
						<td width="120">
							<select name="horaDevolucao" id="horaDevolucao" class="campo_selecao">
								<option value="">Hora Devolução</option>
								<?php foreach ($this->arrayHoras as $horas){?>
								<option value="<?php echo $horas?>"><?php echo $horas?></option>
								<?php }?>
							</select>
						</td>
                        <td width="10">&nbsp;</td>
                        <td width="185" align="right">
                        	<select name="selecionaLocadora" id="selecionaLocadora" class="campo_categoria">
                            	<option value="todas">Todas as Locadoras</option>
                                <?php foreach($this->menu->locadoras as $locadoras_menu => $links){?>
                                	<option value="<?php echo $links->id;?>"><?php echo $links->link_titulo;?></option>
               					<?php } ?>
      						</select>
                        </td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0">
					<tr>
						<td align="center">
							<input type="image" src="/images/<?php echo SITE;?>/bt_buscar.jpg" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>