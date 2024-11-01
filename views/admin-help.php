<div class="wrap sharemark-admin">

	<h1 class="logo"><img src="<?php echo plugins_url('../img/sharemark-logo-21.svg', __FILE__) ?>" /></h1>
	<h2 class="action">Documentation</h2>
	
	<hr/>

	<p>This <i>FREE</i> version of Sharemark lets you display ASX market prices on your WordPress websites and web apps using the following options:</p>

	<h2>Shortcodes</h2>	

	<p>Non-developers can add widgets to their websites using Sharemark’s shortcodes.</p>	

	<fieldset>

	<h3 style="margin-top: 0px;">Last Price Shortcode</h3>

	<h4 style="background-color: #fff; padding: 3px;"><pre>[sharemark-price code='IFN' color='#76376B']</pre></h4>

	<p><strong>Parameters:</strong></p>

	<ul>

		<li><strong><pre style="display: inline;">code</pre></strong> (mandatory) - the company’s ASX code (<i>e.g. CBA</i>)</li>
		<li><strong><pre style="display: inline;">color</pre></strong> (mandatory) - the title’s background color in hexdecimal (<i>e.g. #489382</i>)</li>		

	</ul>

	<p><strong>Output:</strong></p>

	<p><img src="<?php echo plugins_url('../img/widget-last-price.png', __FILE__) ?>" /></p>

	<hr/>

	<h3>Price Table Shortcode</h3>	

	<h4 style="background-color: #fff; padding: 3px;"><pre>[sharemark-price-table code='CBA' color='#FCCC06']</pre></h4>	

	<p><strong>Parameters:</strong></p>

	<ul>

		<li><strong><pre style="display: inline;">code</pre></strong> (mandatory) - the company’s ASX code (<i>e.g. CBA</i>)</li>
		<li><strong><pre style="display: inline;">color</pre></strong> (mandatory) - the title’s background color in hexdecimal (<i>e.g. #489382</i>)</li>		

	</ul>

	<p><strong>Output:</strong></p>

	<p><img src="<?php echo plugins_url('../img/widget-price-table.png', __FILE__) ?>" /></p>	

	</fieldset>

	<h2>Functions</h2>

	<p>Developers can create their own widgets using functions thta connects directly to the Sharemark’s API.</p>

	<fieldset>

	<h3>Get Share Price</h3>
	
	<h4 style="background-color: #fff; padding: 3px;">sharemark_get_shareprice( $asx_code );</h4>	

	<p><strong>Parameters:</strong></p>

	<ul>

		<li><strong><pre style="display: inline">$asx_code</pre></strong> (mandatory) - the company’s ASX code (<i>e.g. CBA</i>)</li>

	</ul>

	<p><strong>Returns:</strong> JSON string</p>

	<p><strong>Output:</strong></p>

	<p>
	<pre>
{
  "company": "ASX Limited",
  "data": {
    "id": "397",
    "asx_code": "asx",
    "price": "46.950",
    "change": "1.450",
    "change_percent": "3.187",
    "day_high": "47.230",
    "day_low": "46.320",
    "volume": "1772",
    "year_high": "52.410",
    "year_low": "37.400",
    "created": "2016-11-10 16:10:47"
  },
  "error": false
} 
	</pre>	
	</p>

	</fieldset>

</div>
