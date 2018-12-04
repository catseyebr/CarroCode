<?php $this->load->view(SITE.'/header'); ?>  
  <body id="sac">
	<div id="page">
      <div id="content">                                                                                                   <?php
        	$this->load->view(SITE.'/topo');
        	$this->load->view(SITE.'/menu');
        ?>
	      <div id="cont">
        	<h1>Em Reformas!</h1>
        	<p>Os Sistemas da Layum estão passando por uma atualização, para que possamos disponibilizar aos nossos clientes uma melhor experiência na hora de realizar suas reservas.</p>
					<p>Contamos com sua compreensão.</p>
	      </div>
      </div>

			<?php  $this->load->view(SITE.'/rodape'); ?>
        </div>
      </div>
          </div>
  </body>
</html>