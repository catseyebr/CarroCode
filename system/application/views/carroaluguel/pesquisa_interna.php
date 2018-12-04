<h3>Nova Pesquisa ?</h3>
<form id="pesquisaForm" method="post" action="/pesquisa" onSubmit="return validaCampos()">
<table width="445" border="0" cellpadding="5" cellspacing="5" class="geral_interna">
    <tr>
        <td width="202">
            <table width="100%" border="0">
                <tr>
                    <td>Local de Retirada:</td>
                </tr>
                <tr>
                    <td>
                        <input value="<?php echo $_SESSION['pesquisa']['cid_retirada'];?>" id="cityRetirada" name="cityRetirada" class="campo_interna" onclick="if(this.value=='Digite Cidade de Retirada'){this.value=''}"  />
                    </td>
                </tr>
            </table>
        </td>
        <td>&nbsp;</td>
        <td width="202">
            <table width="100%" border="0">
                <tr>
                    <td>Local de Devolu&ccedil;&atilde;o:</td>
                </tr>
                <tr>
                    <td>
                        <input value="<?php echo $_SESSION['pesquisa']['cid_devolucao'];?>" id="cityDevolucao" name="cityDevolucao" class="campo_interna" onclick="if(this.value=='Digite Cidade de Devolução'){this.value=''}" />

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0">
                <tr>

                    <td colspan="3">Data e Hora da Retirada:</td>
                </tr>
                <tr>
                    <td width="85">
                        <input type="text" value="<?php echo $_SESSION['pesquisa']['date_retirada'];?>" id="dataRetirada" name="dataRetirada" class="dataRetirada"/>
                    </td>
                    <td>&nbsp;</td>
                    <td width="85">
                        <select name="horaRetirada" id="horaRetirada" class="campo_hora">
                        <?php foreach ($this->arrayHoras as $horas){?>
                        <option value="<?php echo $horas?>" <?php if ($horas == $_SESSION['pesquisa']['hora_retirada'])echo 'selected="selected"'; ?>><?php echo $horas?></option>
                        <?php }?>
                        </select>

                    </td>
                </tr>
            </table>
        </td>
        <td>&nbsp;</td>
        <td>
            <table width="100%" border="0">
                <tr>
                    <td colspan="3">Data e Hora da Devolu&ccedil;&atilde;o:</td>

                </tr>
                <tr>
                    <td width="85">
                        <input type="text" value="<?php echo $_SESSION['pesquisa']['date_devolucao'];?>" id="dataDevolucao" name="dataDevolucao" class="dataDevolucao" /></td>
                    <td>&nbsp;</td>
                    <td width="85">
                        <select name="horaDevolucao" id="horaDevolucao" class="campo_hora">
                        <?php foreach ($this->arrayHoras as $horas){?>
                        <option value="<?php echo $horas?>" <?php if ($horas == $_SESSION['pesquisa']['hora_devolucao'])echo 'selected="selected"'; ?>><?php echo $horas?></option>
                        <?php }?>
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
                    <td><span>Categoria de Ve&iacute;culo:</span></td>
                </tr>

                <tr>
                    <td>
                        <select name="categoriasVeiculos" id="categoriasVeiculos" class="campo_interna">
                            <option value="todas">Todas as Categorias</option>
                            <?php foreach($this->menu->categorias as $categorias_menu => $links_cat){?>
                                <option value="<?php echo $links_cat->cat_id;?>" <?php if ($links_cat->cat_id == $this->dadosPesquisa->selCategoria)echo 'selected="selected"'; ?>><?php echo $links_cat->cat_nome;?></option>
               				<?php } ?>
                        </select>
                    </td>
                </tr>
            </table>
        </td>
        <td>&nbsp;</td>
        <td>
            <table width="100%" border="0">
                <tr>
                    <td><span>Prefer&ecirc;ncia por Locadora:</span></td>
                </tr>
                <tr>
                    <td>
                        <select name="selecionaLocadora" id="selecionaLocadora" class="campo_interna">
                            <option value="todas" selected="selected">Todas as Locadoras</option>
                            <?php foreach($this->menu->locadoras as $locadoras_menu => $links){?>
                                <option value="<?php echo $links->id;?>" <?php if ($links->id == $this->dadosPesquisa->selLocadora)echo 'selected="selected"'; ?>><?php echo $links->link_titulo;?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="46" colspan="3" align="center">
            <input type="image" src="/images/<?php echo SITE;?>/bt_buscar.jpg" />
        </td>
    </tr>
</table>
</form>