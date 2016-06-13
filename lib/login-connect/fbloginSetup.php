<?php 

	require_once '/lib/facebook-sdk-v5/autoload.php';
	$fb = new Facebook\Facebook([
		'app_id' => '1738453169730920',
		'app_secret' => '05f18d428b1558c886c7c5808708ae1f',
		'default_graph_version' => 'v2.5'
		]);

	$permissions = ['email'];

	$helper = $fb->getRedirectLoginHelper();
	$loginUrl = $helper->getLoginUrl('http://localhost:89/vincentLeads/dashboard.php', $permissions);

?>