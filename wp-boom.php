#!/usr/bin/php
<?php

$string = file_get_contents("wordpress.json");
$json = json_decode($string, true);

// DOWNLOAD
if($json["download"]){

	$shell = 'wp core download';

	foreach ($json["download"] as $key => $value){
    	$shell .= ' --'.$key.'='. $value;
	}
	echo "\n";
	echo "*************************************************************\n";
	echo "DOWNLOAD\n";
	echo "*************************************************************\n";
	echo "\n";

	$output = shell_exec($shell);
	echo "$output";
}


// CONFIG
if($json["config"]){
	
	$shell = 'wp core config';

	foreach ($json["config"] as $key => $value){
    	$shell .= ' --'.$key.'='. $value;
	}
	echo "\n";
	echo "*************************************************************\n";
	echo "CONFIG\n";
	echo "*************************************************************\n";
	echo "\n";

	$output = shell_exec($shell);
	echo "$output";
}

// INSTALL
if($json["install"]){
	
	$shell = 'wp core install';

	foreach ($json["install"] as $key => $value){
	   	$shell .= ' --'.$key.'='. $value;
	}
	
	echo "\n";
	echo "*************************************************************\n";
	echo "INSTALL\n";
	echo "*************************************************************\n";
	echo "\n";

	$output = shell_exec($shell);
	echo "$output";
}

// PLUGINS
if($json["plugins"]){

	foreach ($json["plugins"] as $plugin) {

	 $shell = 'wp plugin install '.$plugin['slug'];
		
		if($plugin['activate'] === true){
			$shell .= ' --activate';
		}
		
		echo "\n";
		echo "*************************************************************\n";
		echo "PLUGINS\n";
		echo "*************************************************************\n";
		echo "\n";

	    $output = shell_exec($shell);
		echo "$output";
	}
}


// THEMES
if($json["themes"]){
	
	foreach ($json["themes"] as $theme) {

	 $shell = 'wp theme install '.$theme['slug'];
		
		if($theme['activate'] === true){
			$shell .= ' --activate';
		}
		
		echo "\n";
		echo "*************************************************************\n";
		echo "THEMES\n";
		echo "*************************************************************\n";
		echo "\n";

	    $output = shell_exec($shell);
		echo "$output";
	}
}

echo "\n";
echo "*************************************************************\n";
echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!! BOOM !!!!!!!!!!!!!!!!!!!!!!!!!!!\n";
echo "*************************************************************\n";
echo "\n";
?>