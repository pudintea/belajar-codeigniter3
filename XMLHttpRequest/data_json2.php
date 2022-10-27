<?php
	$row = array();
	$no = 0;
	$row[] = array(
		'edisi'		=> 'Majalah Al AZhar Edisi 325',
		'link'		=> 'https://majalah.al-azhar.or.id',
	);
	$row[] = array(
		'edisi'		=> 'Majalah Al AZhar Edisi 324',
		'link'		=> 'https://majalah.al-azhar.or.id',
	);
	$row[] = array(
		'edisi'		=> 'Majalah Al AZhar Edisi 323',
		'link'		=> 'https://majalah.al-azhar.or.id',
	);
	$row[] = array(
		'edisi'		=> 'Majalah Al AZhar Edisi 323',
		'link'		=> 'https://majalah.al-azhar.or.id',
	);
	$row[] = array(
		'edisi'		=> 'Majalah Al AZhar Edisi 321',
		'link'		=> 'https://majalah.al-azhar.or.id',
	);
	header('Content-Type: application/json');
	echo json_encode($row,TRUE);

?>