
<ul class="client-list">
	
	<?php
	foreach($ClientList as $Client)
	{
	?>
	    <li style="float: left; width: 25%;">
	    	<a href="<?php echo ct\addhttp($Client->url); ?>" target="_blank">
	    		<?php echo $Client->name; ?>
	    	</a>
	    </li>
	<?php
	}
	?>

</ul>