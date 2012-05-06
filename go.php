<?php
date_default_timezone_set("Europe/London");

include_once (__DIR__ .'/config.php');

$numberToGenerate = 25;
$minLength = 10;
$maxLength = 2000;

$output = __DIR__ . "/output/" . date('ymd');

if (defined($wordnikKey)) {
	require(__DIR__ .'/lib/wordnik/api/APIClient.php');

	$client = new APIClient($wordnikKey, 'http://api.wordnik.com/v4');
	$wordsAPI = new WordsAPI($client);
	$word = $wordsAPI->getRandomWord(null);
	$output .= " " . $word->word;
}

mkdir($output);

exec("find /Users/jake/Documents/Samples/SFX/  -name *.wav -print | grep -v mine",$out);
echo "found " . count($out). " audio files.\n";
for ($i=0; $i < $numberToGenerate; $i++) { 
	$file = $out[rand(0,count($out)-1)];

	$info = shell_exec("soxi \"{$file}\"");
	preg_match("/\d+(?= samples)/", $info, $numberOfSamples);
	$length = rand($minLength,$maxLength);
	$start = rand (0,$numberOfSamples[0]-$length);

	$params = " trim {$start}s {$length}s";
	$cmd = "play \"{$file}\" {$params} repeat 25";
	passthru($cmd);
	$cmd = "sox \"{$file}\" \"{$output}/{$i}.wav\" {$params}";
	passthru($cmd);
}

echo ($output . "\n");

//
?>