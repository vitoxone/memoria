<div id="page-content" class="container">
    <div class="reports form">
<?php echo $this->Form->create('Test',array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>

        <div class="panel panel-default">
          <div class="panel-tab"> 
            <ul class="wizard-steps" id="wizardTab"> 
               <li class="active">
                <a href="#content1" data-toggle="tab">Instrucciones</a>
              </li> 
              <li>
                <a href="#content2" data-toggle="tab">Datos Personales</a>
              </li> 
              <li>
                <a href="#content3" data-toggle="tab">Cuestionario</a>
              </li> 
              <li>
                <a href="#content4" data-toggle="tab">Finalizar</a>
              </li>
            </ul>
          </div>
            <div class="tab-content">

              <!--        INSTRUCCIONES        -->

              <div class="tab-pane fade in active" id="content1">
                          <h2 class="headline m-top-md">
              Cuestionario Honey-Alonso de Estilos de Aprendizaje
              <span class="line"></span>
            </h2>
                  <div class="panel-body">
                      <h3 class="headline">
                  Instrucciones:
                </h3>
                <ul class="category">
                  <li><a><i class="fa fa-chevron-right"></i> Este cuestionario ha sido diseñado para identificar su Estilo preferido de Aprendizaje. No es un test de inteligencia , ni de personalidad</a></li>

                  <li><a><i class="fa fa-chevron-right"></i> No hay límite de tiempo para contestar al Cuestionario. No le ocupará más de 15 minutos</a></li>

                  <li><a><i class="fa fa-chevron-right"></i> No hay respuestas correctas o erróneas. Será útil en la medida que sea sincero/a en sus respuestas</a></li>

                  <li><a><i class="fa fa-chevron-right"></i> Si está más de acuerdo que en desacuerdo con el ítem seleccione 'Mas (+)'. Si, por el contrario, está más en desacuerdo que de acuerdo, seleccione 'Menos (-)'</a></li>

                  <li><a><i class="fa fa-chevron-right"></i> Por favor conteste a todos los items</a></li>

                  <li><a><i class="fa fa-chevron-right"></i> La información personal del usuario sólo será utilizada para fines académicos</a></li>
                </ul>
                  </div>
              </div>
              

              <!-- DATOS PERSONALES -->

              <div class="tab-pane fade" id="content2">
                          <h2 class="headline m-top-md">
              Datos Personales
              <span class="line"></span>
            </h2>
            <div class="row"> 
              <div class="col-md-6">
                <div class="panel">
            <div class="form-group">
                <label class="col-lg-3 control-label">Nombre</label>
                <div class="col-lg-4 input-group">
                  <?php echo $this->Form->input('User.name', array('class' => 'form-control', 'label'=>'', 'type' => 'text','autofocus' => 'autofocus', 'id' => 'name')); ?>
                   
                </div><!-- /.col -->
                </div><!-- /.col -->

                 <div class="form-group">
                <label class="col-lg-3 control-label">Rut</label>
                <div class="col-lg-4 input-group">
                  <?php echo $this->Form->input('User.rut', array('class' => 'form-control', 'label'=>'', 'type' => 'text', 'id' => 'rut')); ?>
                  
                </div><!-- /.col -->
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Número Matrícula</label>
                <div class="col-lg-4 input-group">
                  <?php echo $this->Form->input('User.register', array('class' => 'form-control', 'label'=>'', 'type' => 'text', 'id' => 'register')); ?>
                  
                </div><!-- /.col -->
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Carrera</label>
                <div class="col-lg-4 input-group">
                  <?php echo $this->Form->input('User.careers_id', array('class' => 'form-control', 'label'=>'', 'type' => 'select', 'id' => 'career')); ?>
                  
                </div><!-- /.col -->
              </div>

               <div class="form-group">
                <label class="col-lg-3 control-label">Año Ingreso</label>
                <div class="col-lg-4 input-group">
                  <?php echo $this->Form->input('User.year', array('class' => 'form-control', 'label'=>'', 'type' => 'text', 'id' => 'year')); ?>
                  
                </div><!-- /.col -->
              </div>




                 <div class="form-group">
                <label class="col-lg-3 control-label">Email</label>
                <div class="col-lg-4 input-group">
                  <?php echo $this->Form->input('User.email', array('class' => 'form-control', 'label'=>'', 'type' => 'text', 'id' => 'email')); ?>
                  
                </div><!-- /.col -->
              </div>

		<?php  $meses = array( 
			'01'=>'Enero',
			'02'=>'febrero',
			'03'=>'Marzo',
			'04'=>'Abril',
			'05'=>'Mayo',
			'06'=>'Junio',
			'07'=>'Julio',
			'08'=>'Agosto',
			'09'=>'Septiembre',
			'10'=>'Octubre',
			'11'=>'Noviembre',
			'12'=>'Diciembre',); 
?>


                 <div class="form-group">
                <label class="col-lg-3 control-label">Fecha Nacimiento</label>
                <div class="col-lg-6 input-group">
                  <?php echo $this->Form->input('User.birthdate',
		 array('label'=>'',
		 'type' => 'date',
		'dateFormat' => 'DMY',
		'monthNames' => $meses,
    		'minYear' => date('Y') - 70,
    		'maxYear' => date('Y') - 16 )); ?>

                  
                </div><!-- /.col -->

                </div><!-- /.col -->

              
                 <div class="form-group">
                <label class="col-lg-3 control-label">Género</label>
                <div class="col-lg-4 input-group">
                  <?php echo $this->Form->input('User.gender_id', array('class' => 'form-control', 'label'=>'', 'id' => 'gender')); ?>
                  
                </div><!-- /.col -->

                </div><!-- /.col -->


 
                </div><!-- /.col -->
                </div><!-- /.col -->
              </div><!-- /form-group -->
              </div><!-- /form-group -->


              <!-- CUESTIONARIO  -->

              <div class="tab-pane fade" id="content3">
                  <div class="padding-md">
        <div class="row">
          <div class="col-md-10"> 
            <h2 class="headline m-top-md">
              Cuestionario Honey-Alonso de Estilos de Aprendizaje
              <span class="line"></span>
            </h2>
            <div class="row">


   <div class="related">
  <h3><?php echo __('Preguntas'); ?></h3>
      <hr align="left" noshade="noshade" size="4" width="100%" />
    <?php if (!empty($questions)): ?>
        
      <table class="table table-striped table-bordered">
      <?php
      $i = 0;
      $j = 1;
      $total = count($questions);
      foreach ($questions as $question): ?>


      <?php if (($j-1)%20 == 0){?>


       <tr>
        <th><?php echo __('#'); ?></th>
        <th><?php echo __('Más (+)'); ?></th>
      <th><?php echo __('Menos (-)'); ?></th>
      <th><?php echo __('Pregunta'); ?></th>
      
      </tr>

      <?php  } ?>
      <tr>

          <td><span class="category"><?php echo $j ?></span></td>
          <td><span class="category">
                <?php

                  echo $this->Form->input('Answer.'.$i.'.value', array(
                   'id' => $i,
                   'div' => false,
                   'label' => false,
                   'type' => 'radio',
                   'legend' => false,
                   'separator' => '</span></td><td><span class="category">',
                   'options' => array(1 => ' ', 0 => ''),
                  ));         
                  ?>
                </span></td>
        <td><?php echo $question['Question']['name']; ?></td>
        <?php 
         echo $this->Form->hidden('Answer.'.$i.'.questions_id',array('value'=>$question['Question']['id']));
         echo $this->Form->hidden('Answer.'.$i.'.question_type',array('value'=>$question['Question']['style_id']));
       // echo $this->Form->hidden('Answer.'.$i.'.users_id',array('value'=>1));?>

        <?php
        $i++;
        $j++;
        ?>

      </td>
      </tr>
      <?php endforeach; ?>
      </table><!-- .table table-striped table-bordered -->
          
    <?php endif; ?>
        
      </div><!-- .related -->   

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.padding-md -->
    </div><!-- /.landing -->
              </div>

               <div class="tab-pane fade" id="content4">
                <h3>Gracias por contestar el test, presione finalizar para ver los resultados.</h3>
		<?php echo $this->Html->image('/img/gracias.png', array('class' => 'img')); ?>
              </div>
            </div>
          </div>
          <div class="bg-white text-left content-padding">
            <button class="btn btn-lg btn-success animated-element fadeInUp" id="prevStep" disabled>Anterior</button>
            <button class="btn btn-lg btn-success animated-element fadeInUp" id="nextStep">Siguiente</button>
            <button type = "submit" class="btn btn-lg btn-danger animated-element fadeInUp" id="finish">Finalizar</button> 
       

 


            <div class="pull-center" style="width:100%">
              <div class="progress progress-striped active m-top-sm m-bottom-true">
                <div class="progress-bar progress-bar-success" id="wizardProgress" style="width:25%;"></div>
              </div>
            </div>

<script src="/vocacion/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/vocacion/js/validarut.js"></script>

          <script>
    $(function  ()  {

      var currentStep = 1;
      var total = <?php echo $total; ?>;
      $('#finish').hide();

            
      $('#wizardTab li a').click(function() {
        return false;
      });
      
      $('#nextStep').click(function() {
  
       // currentStep++;
        

        if(currentStep == 1)  {
         // alert(total);
         // alert(currentStep);
          $('#wizardTab li:eq(1) a').tab('show');
              $('#wizardProgress').css("width","50%");
          
              $('#prevStep').attr('disabled',false);
              $('#prevStep').removeClass('disabled');
              currentStep++;
        }
        else if(currentStep == 2)  {
         // alert(currentStep);
           if(SoloTexto($('#name').val()) && Rut($('#rut').val()) && SoloNumeros1($('#register').val()) && Carrera($('#career').val()) && SoloNumeros2($('#year').val()) && Email($('#email').val()) && Genero($('#gender').val())){

          //if(true){
               $('#wizardTab li:eq(2) a').tab('show');
               $('#wizardProgress').css("width","75%");
               currentStep++;
             }
            
        }
        else if(currentStep == 3) {

          var completed = true;
          for(i=0; i< total; i++){
             // if(($(i).val() != 1 && $(i).val()) != 0 ){
              if(document.getElementById(i+'0').checked != true && document.getElementById(i+'1').checked != true){

                completed = false;
               // alert(i);
                break;
              }

          }
          
          if(completed){

                $('#wizardTab li:eq(3) a').tab('show');
                $('#wizardProgress').css("width","100%");
                
                $('#nextStep').attr('disabled',true);
                $('#finish').show();
                $('#nextStep').hide();
                currentStep++;
          }
           else alert("Debe responder todas las preguntas");
        }
        
        return false;
      });
      
      $('#prevStep').click(function() {
    
        
        if(currentStep == 2)  {
        
          $('#wizardTab li:eq(0) a').tab('show');
          $('#wizardProgress').css("width","50%");
            
          $('#prevStep').attr('disabled',true);
          $('#prevStep').addClass('disabled');
          
          $('#wizardProgress').css("width","25%");
          currentStep--;
        }
        else if(currentStep == 3) {
      
          $('#wizardTab li:eq(1) a').tab('show');
          $('#wizardProgress').css("width","50%");
              
          $('#nextStep').attr('disabled',false);
          $('#nextStep').removeClass('disabled');
          
          $('#wizardProgress').css("width","50%");
          currentStep--;
        }

           else if(currentStep == 4) {
        
          $('#wizardTab li:eq(2) a').tab('show');
          $('#wizardProgress').css("width","50%");
              
          $('#nextStep').attr('disabled',false);
          $('#nextStep').removeClass('disabled');
          
          $('#wizardProgress').css("width","75%");
          $('#finish').hide();
          $('#nextStep').show();
          currentStep--;
        }
        
        return false;
      });
    });
  </script>

<!--

            <script>
    $(function  ()  {

      var currentStep = 1;
      $('#finish').hide();
      
      $('#wizardTab li a').click(function() {
        return false;
      });
      
      $('#nextStep').click(function() {
  
        currentStep++;
        
        if(currentStep == 2)  {
          $('#wizardTab li:eq(1) a').tab('show');
          $('#wizardProgress').css("width","50%");
          
          $('#prevStep').attr('disabled',false);
          $('#prevStep').removeClass('disabled');
        }
        else if(currentStep == 3) {
          $('#wizardTab li:eq(2) a').tab('show');
          $('#wizardProgress').css("width","75%");
          
         // $('#nextStep').attr('disabled',true);
        }
          else if(currentStep == 4) {
          $('#wizardTab li:eq(3) a').tab('show');
          $('#wizardProgress').css("width","100%");
          
          $('#nextStep').attr('disabled',true);
          $('#finish').show();
          $('#nextStep').hide();

          
        }
        
        return false;
      });
      
      $('#prevStep').click(function() {
    
        currentStep--;
        
        if(currentStep == 1)  {
        
          $('#wizardTab li:eq(0) a').tab('show');
          $('#wizardProgress').css("width","50%");
            
          $('#prevStep').attr('disabled',true);
          $('#prevStep').addClass('disabled');
          
          $('#wizardProgress').css("width","25%");
        }
        else if(currentStep == 2) {
        
          $('#wizardTab li:eq(1) a').tab('show');
          $('#wizardProgress').css("width","50%");
              
          $('#nextStep').attr('disabled',false);
          $('#nextStep').removeClass('disabled');
          
          $('#wizardProgress').css("width","50%");
        }

           else if(currentStep == 3) {
        
          $('#wizardTab li:eq(2) a').tab('show');
          $('#wizardProgress').css("width","50%");
              
          $('#nextStep').attr('disabled',false);
          $('#nextStep').removeClass('disabled');
          
          $('#wizardProgress').css("width","75%");
          $('#finish').hide();
          $('#nextStep').show();
        }
        
        return false;
      });
    });
  </script>



-->
