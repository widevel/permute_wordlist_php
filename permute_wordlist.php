<?php

function permute($dictWord) {
	global $leetDict;
	if(strlen($dictWord) == 0) return null;

	$currentLetter = $dictWord{0};

	$restOfWord = substr($dictWord, 1);

	if(array_key_exists($currentLetter, $leetDict)) {
		$substitutions = array_merge($leetDict[$currentLetter], [$currentLetter]);
	} else {
		$substitutions = [$currentLetter];
	}
	
	if(strlen($restOfWord) > 0) {
		foreach($substitutions as $s) {
			foreach(permute($restOfWord) as $p) {
				$perms[] = $s . $p;
			}
		}
	} else {
		$perms = $substitutions;
	}
	
	

	return $perms;

}

$leetDict = [
'c' => ['c', '(', 'k', 'K'],
'f'=> ['f', 'ph', 'pH', 'Ph', 'PH'],
'i'=> ['i', 'l', '!', '1'],
'k'=> ['k', '(', 'c', 'C'],
'l'=> ['l', '1', '!', 'i'],
'u'=> ['u', 'v', 'V'],
'v'=> ['v', 'u', 'U'],
'w'=> ['w', 'vv', 'VV']
];

$words = ['alfalfa', 'mississippi'];
$results = [];

foreach($words as $word) {
	$perm = permute($word);
	foreach($perm as $p) {
		$results[] = $p;
	}
	
}
print_r($results);
