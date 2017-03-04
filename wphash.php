<?php
error_reporting(0);
require_once('pluggable.php');
$wp_hasher = new PasswordHash(8, FALSE);

# Coded by L0c4lh34rtz - IndoXploit

# \n -> linux
# \r\n -> windows
$list = explode("\n", file_get_contents($argv[1])); # change \n to \r\n if you're using windows
# ------------------- #

$hash = '$P$Bd2v1uNoAchuGhnGiwFdS52wmk5.8X0'; # hash here, NB: use single quote (') , don't use double quote (")

if(isset($argv[1])) {
	foreach($list as $wordlist) {
		print " [+]"; print ($wp_hasher->CheckPassword($wordlist, $hash)) ? "$hash -> $wordlist (MACTH)\n" : "$hash -> $wordlist (Not Match)\n";
	}
} else {
	print "usage: php ".$argv[0]." wordlist.txt\n";
}
?>