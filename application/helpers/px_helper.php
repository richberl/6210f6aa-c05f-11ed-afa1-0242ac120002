<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('date_indo'))
{
	function date_indo($format, $date)
	{
		$timestamp = strtotime($date);
		$l = array('', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');
		$F = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		$return = '';
		if(is_null($timestamp))
		{ 
			$timestamp = mktime(); 
		}
		for($i = 0, $len = strlen($format); $i < $len; $i++) 
		{
			switch($format[$i])
			{
				case '\\' :
					$i++;
					$return .= isset($format[$i]) ? $format[$i] : '';
					break;
				case 'l' :
					$return .= $l[date('N', $timestamp)];
					break;
				case 'F' :
					$return .= $F[date('n', $timestamp)];
					break;
				default :
					$return .= date($format[$i], $timestamp);
					break;
			}
		}
		return $return;
	}
}
if ( ! function_exists('limit_words'))
{
	function limit_words($paragraph,$limit){
		$data = implode(' ', array_slice(explode(' ', strip_tags($paragraph)), 0, $limit));
		return $data;
	}
}

if ( ! function_exists('get_unique_year'))
{
    function get_unique_year($arr){
        $dates = array_unique(array_map(function($data) {
            return date('Y', strtotime($data->tgl_pinjam));
        }, $arr));
        return $dates;
    }
}