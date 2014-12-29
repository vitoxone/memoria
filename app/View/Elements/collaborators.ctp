<div class="row">

<?php


$i = 0;
foreach ($users as $user):
$i++;
if (($i % 6) == 0) { echo "\n<div class=\"row\">\n\n";}
?>
 <article class="span2 javascript html">
                <div class="thumbnail hover-pf1">
<?php echo $this->Html->image('/images/users/' . $user['User']['image'], array('url' => array('controller' => 'users', 'action' => 'public_resume', $user['User']['id']), 'alt' => $user['User']['name'], 'class' => 'img-rounded')); ?>

  <div class="caption">
                        <h2><?php echo $user['User']['name'] ?></h2>
			</br>
                        <h4><?php echo $user['Career']['name'] ?></h4>
                    <span class="ico_block">

			<?php echo $this->Html->image('/img/lupa.png', array('url' => array('controller' => 'users', 'action' => 'prev_resume', $user['User']['id']), 'class' => 'ico_zoom')); ?>
                    </span>
                    </div>
 </div>
            </article>
<?php
if (($i % 6) == 0) { echo "\n</div>\n\n";}
endforeach;
?>

<br />

<br />

</div>

	<div class="pagination pagination-centered">
			
		<?php echo $this->element('pagination'); ?>

	</div> <!-- pagination -->




