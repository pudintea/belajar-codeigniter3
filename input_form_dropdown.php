<?php
// CodeIgniter 3
$data [
  'nama' => 'Pudin',
  'alamat' => 'Ciamis',
  'telpon' => '102030'
  ];

echo echo form_dropdown('datasaya', $data, 'nama');

echo echo form_dropdown('ukuran_baju', array ('S'=>'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL'), 'XL');

//==================================================================================
// mengambil data dari database dengan result()
    $stts_menikah = $this->M_Najzmi->get_status_menikah();
		$e = []; // Inisialisasi array di luar loop

		foreach($stts_menikah as $d) {
			$e[$d->id_status_nikah] = $d->status_nikah;
		}
		echo form_dropdown('statu_menikah', $e, 'lajang');


// ====================== PUDIN.MY.ID ===============================
