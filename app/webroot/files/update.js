$(document).ready(function(){               
		        jQuery.ajax({
		            type:'POST',
		            async: true,
		            cache: false,
			    dataType:'json',
		            url: '<?php echo Router::Url(array('controller' => 'careers','admin' => FALSE, 'action' => 'calculos'),TRUE,); ?>',
		            success: function(response) {
		            }
//,		            data:jQuery('form').serialize()
		        });
		        return false;
		    
	    

});