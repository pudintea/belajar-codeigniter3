<?php defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed'); 
/*
* Pudin S I
* pudin.alazhar@gmail.com
* Ciamis, Jawa Barat
* https://t.me/pudin_ira
* https://instagram.com/pudin.ira
* https://www.pdn.my.id
* https://www.pudin.my.id
*/

// Pemanggilanya : pdn_rupiah(angkanya)
if ( ! function_exists('pdn_rupiah'))
{
	function pdn_rupiah($angka)
	{	
		$hasil_rp = "Rp ".number_format($angka,0,',','.');
		return $hasil_rp;
	}
}

if ( ! function_exists('pdn_pisah_titik'))
{
	function pdn_pisah_titik($angka)
	{	
		$hasil = number_format($angka,0,',','.');
		return $hasil;
	}
}

if ( ! function_exists('pdn_htmlspecial'))
{
	function pdn_htmlspecial($text)
	{	
		$hasil = htmlspecialchars($text);
		return $hasil;
	}
}

// Pemanggilanya : pdn_tanggal(tanggalnya)
if ( ! function_exists('pdn_tanggal'))
{
	function pdn_tanggal($tanggal)
	{	
		$hasil_tgl = date('d-m-Y', strtotime($tanggal));
		return $hasil_tgl;
	}
}

// Pemanggilanya : pdn_titikhilang(angkanya)
if ( ! function_exists('pdn_titikhilang'))
{
	function pdn_titikhilang($angkaa)
	{	
		$hasil_nya = str_replace(".", "", $angkaa);
		return $hasil_nya;
	}
}
// Pemanggilanya : pdn_titikhilang(angkanya)
if ( ! function_exists('pdn_sepasihilang'))
{
	function pdn_sepasihilang($datanya)
	{	
		$hasil_nya = str_replace(' ', '', $datanya);
		return $hasil_nya;
	}
}
// Pemanggilanya : pdn_sepasihilang(angkanya)

if ( ! function_exists('pdn_tgl_indo'))
{
	function pdn_tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}

if ( ! function_exists('pdn_tgl_indo_bulan_tahun'))
{
	function pdn_tgl_indo_bulan_tahun($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $bulan.' '.$tahun;
	}
}

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if ( ! function_exists('pdn_nama_hari'))
{
	function pdn_nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Ahad";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}

if( ! function_exists('waktu_dulu'))
    {
        function waktu_dulu($datetime, $full = false) {
        	$today = time();
		    $targetday = strtotime($datetime);

		    if ($today > $targetday) {
		        // return "Waktu sudah berlalu";
		        // $today = time();
			    $createdday = strtotime($datetime);
			    $datediff = abs($today - $createdday);
			    $difftext = "";

			    // $units = [
			    //     'tahun' => 365 * 60 * 60 * 24,
			    //     'bulan' => 30 * 60 * 60 * 24,
			    //     'hari' 	=> 60 * 60 * 24,
			    //     'jam' 	=> 60 * 60,
			    //     'menit' => 60,
			    //     'detik' => 1,
			    // ];

			    $units = [
			        'tahun' => 365 * 60 * 60 * 24,
			        'bulan' => 30 * 60 * 60 * 24,
			        'hari' 	=> 60 * 60 * 24,
			    ];

			    foreach ($units as $unit => $value) {
			        if ($datediff >= $value) {
			            $unitCount = floor($datediff / $value);
			            $datediff %= $value;
			            $unitName = ($unitCount > 1) ? $unit . '' : $unit;
			            $difftext = "$unitCount $unitName yang lalu";
			            if (!$full) break;
			        }
			    }

			    return 'Lewat '.$difftext;
		    }else{
		    	// Counth down
		    	$datediff = $targetday - $today;
			    $difftext = "";

			    // $units = [
			    //     'tahun' => 365 * 60 * 60 * 24,
			    //     'bulan' => 30 * 60 * 60 * 24,
			    //     'hari' 	=> 60 * 60 * 24,
			    //     'jam' 	=> 60 * 60,
			    //     'menit' => 60,
			    //     'detik' => 1,
			    // ];

			    $units = [
			        'tahun' => 365 * 60 * 60 * 24,
			        'bulan' => 30 * 60 * 60 * 24,
			        'hari' 	=> 60 * 60 * 24,
			    ];

			    foreach ($units as $unit => $value) {
			        if ($datediff >= $value) {
			            $unitCount = floor($datediff / $value);
			            $datediff %= $value;
			            $unitName = ($unitCount > 1) ? $unit  : $unit;
			            $difftext .= "$unitCount  $unitName ";
			        }
			    }

			    return trim($difftext).' Lagi';
		    }
		    
		}

    }

/*
======================= CARA MENGGUNAKAN ============================
$this->load->helper('Pdn_tgl_indo');
function index()
	{
		echo nama_hari('2010-11-23').' '. tgl_indo('2010-11-23');
		echo "<br>";
		echo hitung_mundur(strtotime('2010-11-23'));
		echo "<br>";
		echo waktu_dulu('2010-11-23 23:59:59'); // date('Y-m-d H:i:s');
	}
hasilnya
========
Selasa 23 November 2010
1 tahun 7 bulan 1 hari 23 jam 26 menit yang lalu
Lebih dari 2 Menit yang lalu
*/
