<?php
$this->Html->addCrumb('Preuntas', array('controller' => 'questions', 'action' => 'index'));
$this->Html->addCrumb('Agregar Pregunta');
?>

	<h2>Agregar Preunta</h2>
						<hr align="left" noshade="noshade" size="8" width="100%" />


<div class="panel panel-body">
<div class="col-lg-9">
<?php echo $this->Form->create('Question', array('class' => 'form-vertical')); ?>
<br />



<div class="form-group">
                <label class="col-lg-3 control-label">Pregunta</label>
                <div class="col-lg-6 input-group">
                  <?php echo $this->Form->input('name', array('class' => 'form-control', 'label'=>'', 'type' => 'text','autofocus' => 'autofocus')); ?>
                  
                </div><!-- /.col -->
              </div><!-- /form-group -->


<div class="form-group">
                <label class="col-lg-3 control-label">Etilo Asociado</label>
                <div class="input-group">
                  <?php echo $this->Form->input('styles_id', array(
                    'class' => 'form-control',
                    'label' => '',
                )); ?>
                  
                </div><!-- /.col -->
              </div><!-- /form-group -->


<?php $options = array(
    array('name' => 'Inactiva', 'value' => '0')
 );
 ?>
<div class="form-group">
                <label class="col-lg-3 control-label">Estado</label>
                <div class="input-group">
                  <?php echo $this->Form->input('active', array(
                    'class' => 'form-control',
                    'label' => '',
                    'type' => 'select',
                    'options' => $options,
                    'empty' => array('name' => 'Activa', 'value' => '1'),
                )); ?>
                  
                </div><!-- /.col -->
              </div><!-- /form-group -->

<br />

<br />
</div>
</div>

<div class="panel panel-default panel-footer">
<?php echo $this->Form->button('Guardar', array('class' => 'btn btn-primary','label'=>'Guardar'));?>
<?php echo $this->Form->end(); ?>
</div>
