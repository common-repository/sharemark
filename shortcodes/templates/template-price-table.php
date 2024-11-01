<div class="sharemark-widget">

	<table class="sm-price-table-widget">
		
		<thead>

			<tr style="background-color: <?php echo $background_color ?>;">
				<th>Code</th>
				<th>Last Price</th>
				<th>Change ($)</th>			
				<th>(%)</th>			
				<th>High</th>			
				<th>Low</th>			
				<th>Volume</th>			
			</tr>

		</thead>

		<tbody>

			<tr>
				<td><?php echo $asx_code; ?></td>
				<td class="sm-price"><?php echo $price; ?></td>
				<td class="sm-change <?php echo $change_class ?>"><?php echo $change; ?></td>			
				<td class="sm-change <?php echo $change_class ?>"><?php echo number_format( $change_percent, 2 ); ?></td>
				<td><?php echo $day_high; ?></td>
				<td><?php echo $day_low; ?></td>
				<td><?php echo $volume; ?></td>
			</tr>

		<tbody>
		
		<tfoot>

			<tr>
				<td colspan="7">Last updated <?php echo date( 'y/m/Y H:m', strtotime($created) ); ?></td>
			</tr>

		</tfoot>

	</table>

</div>
