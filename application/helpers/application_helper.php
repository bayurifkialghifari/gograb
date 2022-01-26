<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function generateFont($length = 20) 
{
    $str 		= "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max 		= count($characters) - 1;
	for ($i = 0; $i < $length; $i++) 
	{
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}

	return $str;
}

function psql_date_format($time = NULL) 
{
	if($time === NULL) $time = time();
	return date('Y-m-d', $time);
}

function psql_datetime_format($time = NULL) 
{
	if($time === NULL) $time = time();
	return date('Y-m-d H:i:s', $time);
}

function psql_time_format($time = NULL) 
{
	if($time === NULL) $time = time();
	return date('H:i:s', $time);
}

const ID_MONTHS = array(
	1 => 'Januari',
	'Februari',
	'Maret',
	'April',
	'Mei',
	'Juni',
	'Juli',
	'Agustus',
	'September',
	'Oktober',
	'November',
	'Desember',
);

const ID_DAYS = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu');

function id_date_format($time = NULL, $format = 'long') 
{
	if($time === NULL) $time = time();
		$gd = getdate($time);
	if(!in_array($format, array('long', 'short', 'medium'))) 
	{
		$format = 'long';
	}
	switch ($format) {
		case 'long':
			return ID_DAYS[$gd['wday']] . ', ' . $gd['mday'] . ' ' . ID_MONTHS[$gd['mon']] . ' ' . $gd['year'];
			break;

		case 'short':
			return $gd['mday'] . ' ' . substr(ID_MONTHS[$gd['mon']], 0, 3) . ' ' . $gd['year'];
			break;

		case 'medium':
			return $gd['mday'] . ' ' . ID_MONTHS[$gd['mon']] . ' ' . $gd['year'];
			break;
	}
}