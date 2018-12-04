<div class="box_baixo">
    <?php 
    $attributes = array('enctype' => 'multipart/form-data', 'id' => 'envie_amigo');
    echo form_open("home/addIndique", $attributes);?>
    <table width="250" border="0">
            <tr>
                <td colspan="2">
                    <h3>Indique para um amigo</h3>
                </td>
            </tr>
            <tr>
                <td width="54" rowspan="10" valign="top">
                    <img src="/images/icon_indique.jpg" alt="Enquete"/>
                </td>
                <td width="186">
                    <?php $dados = array(
							'name'		=> 'sender',
							'id'		=> 'sender',
							'class'	=> 'texbox validate required alpha',
						);
					echo form_input($dados);?>
					<div class="error"><p><?php echo form_error('sender');?></p></div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php $dados = array(
							'name'		=> 'email_sender',
							'id'		=> 'email_sender',
							'class'	=> 'texbox validate required email',
						);
					echo form_input($dados);?>
					<div class="error"><p><?php echo form_error('email_sender');?></p></div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php $dados = array(
							'name'		=> 'nome',
							'id'		=> 'nome',
							'class'	=> 'texbox validate required alpha',
						);
					echo form_input($dados);?>
					<div class="error"><p><?php echo form_error('nome');?></p></div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php $dados = array(
							'name'		=> 'email',
							'id'		=> 'email',
							'class'	=> 'texbox validate required email',
						);
					echo form_input($dados);?>
					<div class="error"><p><?php echo form_error('email');?></p></div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="image" src="/images/bt_indique.jpg" class="botao_baixo"/>
                </td>
            </tr>
        </table>
    <?php echo form_close();?>
</div>