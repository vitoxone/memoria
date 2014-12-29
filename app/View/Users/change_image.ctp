<?php echo $this->Form->create('User', array('class' => 'form-vertical', 'type' => 'file')); ?>
	<div class="bg-white text-left">
		<legend><?php echo __('Cambiar imagen'); ?></legend>
	
		<?php echo $this->Form->hidden('id'); ?>
		  <div class="col-lg-4">
                       <?php echo $this->Form->input('image', array('class' => 'form-control', 'label'=>'', 'type' => 'file')); ?>
            </div><!-- /.col -->
	
	      <div class="col-lg-3">
                       <?php echo $this->Form->input('code', array('class' => 'form-control', 'label'=>'Código de Autorización (enviado por email)', 'type' => 'text')); ?>
            </div><!-- /.col -->
	</div>   
            <div class="bg-white text-center">
            <button type = "submit" class="btn btn-lg btn-danger animated-element fadeInUp" id="finish">Guardar</button> 
	 <?php echo $this->Html->link(" Volver ", array('controller' => 'users','action'=> 'resume', $user['User']['id'] ), array( 'class' => 'btn btn-lg btn-warning animated-element fadeInUp'))?>
              </div>   
