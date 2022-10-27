<?php
	$row = array();
	$no = 0;
	$row[] = array(
		'nama'		=> 'Pudin',
		'alamat' 	=> 'Ciamis',
		'email' 	=> 'Pudin@gmail.com',
	);
	$row[] = array(
		'nama'		=> 'Saepudin',
		'alamat' 	=> 'Ciamis',
		'email' 	=> 'saepudin@gmail.com',
	);
	$row[] = array(
		'nama'		=> 'Ilham',
		'alamat' 	=> 'Ciamis',
		'email' 	=> 'ilham@gmail.com',
	);
	$row[] = array(
		'nama'		=> 'Najzmi',
		'alamat' 	=> 'Ciamis',
		'email' 	=> 'najzmi@gmail.com',
	);
	$row[] = array(
		'nama'		=> 'Udin',
		'alamat' 	=> 'Ciamis',
		'email' 	=> 'udin@gmail.com',
	);
	header('Content-Type: application/json');
	echo json_encode($row,TRUE);

?>
