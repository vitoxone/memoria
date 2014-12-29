
	<div class="bg-light padding-md" id="feature">
	</br>
				

					<div class="row">
						<div class="bg-white">
						<div class="col-sm-6 content-padding">
							<div class="text-center content-padding" id="contact">
								<h3>COMPARTIR TEST</h3>
						<p class="m-bottom-md">Para compartir el test con sus alumnos sólo debe copiar el siguiente enlace.</p>

						<?php echo $this->Html->image('/img/arrow.png', array('class' => 'img-rounded')); ?>
						<form class="form-inline no-margin">
							<div class="form-group">
								<input  type="text" class="form-control input-lg" value="<?php echo $link ?>" id="newsletter">
							</div>
							

						</form>	
						</br>	
						<form class="form-inline no-margin">

						<p class="m-bottom-md">Su código es</p>
						<div class="form-group">
							<input  type="text" class="form-control input-lg" value="<?php echo $code ?>">
							
						</div>
					</form>	
							</div>
							</div>
						</div><!-- /.col -->


						<div class="bg-white">
						<div class="col-sm-6 content-padding">
							<div class="text-center content-padding" id="contact">
						<div class="pull-left">
							<h3>REVISAR TESTS</h3>
								<p class="font-lg">¿Cómo visualizar los test de sus alumnos?</p>
								<p class="text-muted">Debe ingresar el código  que compartió con sus alumnos en el siguiente recuadro </p>
							</div>
							<form action="search" method="post">
							<div class="input-group">
								<input name="fname" type="text" class="form-control input-lg">
								<span class="input-group-btn">
												
										<input  class="btn btn-success btn-lg" type="submit" value="Buscar">			
								</span>
							</div>
							</div><!-- /input-group -->

						</div><!-- /.col -->
					</div><!-- /.row -->	
					</div><!-- /.row -->	
					</div><!-- /.row -->
			
			</div>



		<script src="/vocacion/js/jquery-1.10.2.min.js"></script>

<script>
    $(function  ()  {            
      $('#copy').click(function() {
    	    
      	var text = "hola";
      	alert("hola");

if (window.clipboardData) 
    { 

    // the IE-manier 
   window.clipboardData.setData("Text", text); 

   // waarschijnlijk niet de beste manier om Moz/NS te detecteren; 
   // het is mij echter onbekend vanaf welke versie dit precies werkt: 
   } 
   else if (window.netscape) 
   { 

   // dit is belangrijk maar staat nergens duidelijk vermeld: 
   // you have to sign the code to enable this, or see notes below 
   netscape.security.PrivilegeManager.enablePrivilege('UniversalXPConnect'); 

   // maak een interface naar het clipboard 
   var clip = Components.classes['@mozilla.org/widget/clipboard;1'] 
       .createInstance(Components.interfaces.nsIClipboard); 
   if (!clip) return; 

   // maak een transferable 
   var trans = Components.classes['@mozilla.org/widget/transferable;1'] 
       .createInstance(Components.interfaces.nsITransferable); 
   if (!trans) return; 

   // specificeer wat voor soort data we op willen halen; text in dit geval 
   trans.addDataFlavor('text/unicode'); 

   // om de data uit de transferable te halen hebben we 2 nieuwe objecten 
   // nodig om het in op te slaan 
   var str = new Object(); 
   var len = new Object(); 

   var str = Components.classes["@mozilla.org/supports-string;1"] 
       .createInstance(Components.interfaces.nsISupportsString); 

   var copytext=text; 

   str.data=copytext; 

   trans.setTransferData("text/unicode",str,copytext.length*2); 

   var clipid=Components.interfaces.nsIClipboard; 

   if (!clip) return false; 

   clip.setData(trans,null,clipid.kGlobalClipboard); 

   } 
   alert("Following info was copied to your clipboard:\n\n" + text); 
   return false; 
} 
      });
    });
  </script>
		
		