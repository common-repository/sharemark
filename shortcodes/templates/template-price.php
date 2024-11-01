<div class="sharemark-widget">

	<div class="sm-price-widget">
		<div class="sm-title" style="background-color: <?php echo $background_color ?>"><?php echo $asx_code ?></div>
		<div class="sm-price"><?php echo $price ?></div>
		<div class="sm-change <?php echo $change_class ?>"><span class="sm-change-container"><?php echo number_format($change, 2) ?></span></div>	
		<div class="sm-timestamp">Last updated <?php echo date( 'y/m/Y H:m', strtotime($created) ); ?></div>		
	</div>

</div>
