<div class="ct-scroller">
   <div class="ct-inner-scroll">
		<ul class="client-list">
			<?php
			foreach($ClientList as $Client)
			{
			?>
			    <li>
			    	<a href="<?php echo ct\addhttp($Client->url); ?>" target="_blank">
			    		<img src="<?php echo ct\addhttp($Client->logo); ?>" class="cc-slider-img">
			    	</a>
			    </li>
			<?php
			}
			?>
		</ul>
	</div>
</div>