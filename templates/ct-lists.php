
<ul class="clients-list-holder">
	
	<?php
	foreach($ClientList as $Client)
	{
	?>
	    <li class="clients-list-item <?php $Config['class']; ?>">
	    	<a href="<?php echo $Client->url; ?>" target="_blank">
	    		<?php echo $Client->name; ?>
	    	</a>
	    </li>
	<?php
	}
	?>

</ul>