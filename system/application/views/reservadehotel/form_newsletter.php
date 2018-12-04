<div class="box_baixo">
    <?php 
    $attributes = array('enctype' => 'multipart/form-data', 'id' => 'newsletter');
    echo form_open("home/addNewsletter", $attributes);?>
      <table width="250" border="0">
            <tr>
                <td colspan="2">
                    <h3>Assine Nossa Newsletter</h3>
                </td>
            </tr>
            <tr>
                <td width="56" valign="top">
                    <img src="/images/icon_news.jpg" alt="Newsletter"/>
                </td>
                <td width="167">
                    Fique por dentro do que acontece 
                    no <strong>Reserva de Hotel!</strong>
                    Receba em seu 
                    e-mail nossas promo&ccedil;&otilde;es e not&iacute;cias 
                    atualizadas.
                </td>
            </tr>
            <tr>
                <td width="56" rowspan="3">&nbsp;
                    
                </td>
                <td>
                    <?php $dados = array(
							'name'		=> 'new_email',
							'id'		=> 'new_email',
							'class'	=> 'texbox validate required email',
						);
					echo form_input($dados);?>
					<div class="error"><p><?php echo form_error('new_email');?></p></div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="image" src="/images/bt_news.jpg" class="botao_baixo"/>
                </td>
            </tr>
        </table>
    <?php echo form_close();?>
</div>