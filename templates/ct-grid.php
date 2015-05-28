<?php

$Config = shortcode_atts(
	array(
		'numcols' => CT_SHRT_NUMCOLUMNS,
		'class' => '',
		'showlogo' => true
		), $Config);

$Clients = array_chunk($ClientList, $Config['numcols']);

$Width = 100 / $Config['numcols'];
?>

<div id="client-grid-list">

	<?php
	foreach ($Clients as $Row) 
	{
		?>
		<div class="client-row clients-list-holder">
			<?php
			foreach ($Row as $key => $Client) 
			{
				?>
				<div class="client-col clients-list-item <?php echo $Config['class']; ?>" style="width:<?php echo $Width.'%'; ?>; float: left;">
					<a href="<?php echo $Client->url; ?>" title="<?php echo $Client->name; ?>" target="_blank">
						<img src="<?php echo $Client->logo; ?>" alt="<?php echo $Client->name; ?>">
						<?php //echo $Client->name?>
					</a>
				</div>		
				<?php
			}
			?>
		</div>
		<?php	
	}
	?>

</div>