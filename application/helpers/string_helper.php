<?php defined('BASEPATH') or exit('No direct script access allowed');

function split_string($string, $length)
{
	$middle = strlen($string) / 2;
	$first = substr($string, 0, $middle);
	$last = substr($string, $middle);
	return substr($first, 0, $length) . "..." . substr($last, -$length, $length);
}
