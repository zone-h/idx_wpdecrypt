<?php
class wphash {
	private $exp;
	private $tools;
	private $color;
	private $hasher;
	private $wordlist = "wordlist.txt"; 	# wordlist file

	public function __construct() {
		$this->tools 	= array(
			"toolsname" => "IDX-WPhash",
			"version" 	=> "1.1",
			"codename" 	=> "KambingConge",
			"author" 	=> "L0c4lh34rtz",
			"email" 	=> "0x3a3a@gmail.com",
			"team"		=> "IndoXploit",
			"greetz"	=> "All Indonesian People",
		);
		$this->hasher   = new PasswordHash(8, FALSE);
		$this->exp 		= (substr(strtolower(PHP_OS), 0, 3) === "win") ? "\r\n" : "\n";
		$this->color 	= (substr(strtolower(PHP_OS), 0, 3) === "win") ? FALSE : TRUE;
		(substr(strtolower(PHP_OS), 0, 3) === "win") ? system("cls") : system("clear");
	}

	public function input() {
		$handle 	= fopen("php://stdin", "r");
		$fgets 		= fgets($handle);
		$fgets 		= str_replace(array("\n","\r"), "", $fgets);
		fclose($handle);
		return $fgets;
	}

	public function color() {
		if($this->color == TRUE) {
			return array(		# \e[1; ] -> bold , \e[0; ] -> normal
				"\e[0m",  		# 0 off
				"\e[1;34m",		# 1 blue (bold)
				"\e[1;91m",		# 2 red (bold)
				"\e[1;92m",		# 3 green (bold)
				"\e[0;92m",		# 4 green
				"\e[1;42m",		# 5 white (bold) font with green background
				"\e[1;93m" 		# 6 gold (bold)
			);
		}
	}

	public function cover() {
		echo "    ____          							\n";
		echo "   /# /_\      								\n";
		echo "  |  |/o\o\\                        			\n";
		echo "  |  \\_/_/     								\n";
		echo " / |_   |               		    			\n";
		echo "|  ||\_ ~|         							\n";
		echo "|  ||| \/            IndoXploit				\n";
		echo "|  |||_         (WordPress Hash Check)		\n";
		echo " \//  |      ".$this->tools['toolsname']." [".$this->tools['version']."] ".$this->tools['codename']." \n";
		echo "  ||  |      ".$this->tools['author']." (".$this->tools['email'].") \n";
		echo "  ||_  \   									\n";
		echo "  \_|  o|  									\n";
		echo "  /\___/   									\n";
		echo " /  ||||__ 									\n";
		echo "    (___)_)									\n";
		echo "----------------------------------------------\n";
	}

	public function run() {
		echo " WP HASH: ";
		$hash = trim($this->input());
		echo "----------------------------------------------\n";
		$list = explode($this->exp, file_get_contents($this->wordlist));
		if(!empty($hash)) {
			foreach($list as $password) {
				if($this->hasher->CheckPassword($password, $hash)) {
					echo "[+] $hash -> ".$this->color()[1].$password.$this->color()[0]." (".$this->color()[3]."MATCH".$this->color()[0].")\n";
					break;
				} else {
					# echo "[+] $hash -> ".$this->color()[1].$password.$this->color()[0]." (".$this->color()[2]."NOT MATCH".$this->color()[0].")\n";
				}
			}
		}
	}
}

$wphash = new wphash;
$wphash->cover();
$wphash->run();
?>
