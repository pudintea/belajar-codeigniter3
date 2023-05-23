<?php
//Controller
// Mundur 2 tahun 3 bulan
$min2th = mktime(0,0,0,date("n")-3,date("j"),date("Y")-1);
$tgl_start = date("Y-m-d", $min2th);

$tgl_end = $this->input->post('tanggal', true);

//MODEL
$this->db->where(array(
			'tanggal >= ' => $tgl_start,
			'tanggal <=' => $tgl_end
));

// Pudin, https://t.me/pudin_ira, https://instagram.com/pudin.ira
