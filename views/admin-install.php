<?php $action = wp_nonce_url( '/wp-admin/admin.php?page=sharemark-admin-install', 'install-user-licence_' . $user->ID ); ?>

<div class="wrap sharemark-admin">
			
	<h1 class="logo"><img src="<?php echo plugins_url('../img/sharemark-logo-21.svg', __FILE__) ?>" /></h1>
	<h2 class="action">Installation</h2>

	<hr/>

	<h2>Thank you for downloading Sharemark’s WordPress plugin.</h2>

	<p>
	
		Sharemark lets you integrate ASX market information to your WordPress websites and web apps. <br/> Sign up for free and get your licence key from <strong><a href="http://www.sharemark.com.au" target="_blank">sharemark.com.au</a></strong>.
		
	</p>
	
	<?php if( $error > 0 ): ?>

		<?php if( $error == 1 || $error == 2 ): ?><p style="margin-top: 15px;" class="notice notice-error"><?php echo SHAREMARK_MSG_ERROR_INVALID_LICENCE; ?></p><?php endif; ?>

	<?php endif; ?>

	<form action="<?php echo $action ?>" method="post">

			<fieldset class="options">
					
					<legend>Sharemark Installation</legend>
					<label>License Key</label>
					<input type="text" name="license" size="32" value="" /><br />

			</fieldset>
			
			<input type="hidden" name="sharemark-install" value="Y" />

			<input type="submit" value="Install" class="button-primary" />

	</form>

</div>
