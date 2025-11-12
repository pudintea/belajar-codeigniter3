<?php

	function cetak_excel(){
		
		$this->load->model($this->MainModel(),'Pmb_m');
		$dataTable	= $this->Pmb_m->get_data();

		require_once APPPATH . 'third_party/SimpleXLSXGen.php';

		$data = [];

		// Judul Laporan
		$data[] = ['DIREKTORAT DIKDASMEN YPI AL AZHAR'];
		$data[] = ['REKAPITULASI KEADAAN JUMLAH PEGAWAI TK/SD/SMP/SMA ISLAM AL AZHAR SE-INDONESIA'];
		$data[] = ['TAHUN PELAJARAN ' . $this->config->item('pdn_murid_ta')];

		// Header 2 baris
		$header1 = ['Jenjang Sekolah'];
		$header2 = [''];

		// KEpala Sekolah
		$header1 = array_merge($header1, ['KEPALA SEKOLAH', '', '']);
		$header2 = array_merge($header2, ['L', 'P', 'JML']);

		// Waka
		$header1 = array_merge($header1, ['WAKASEK', '', '']);
		$header2 = array_merge($header2, ['L', 'P', 'JML']);

		// Guru
		$header1 = array_merge($header1, ['GURU', '', '']);
		$header2 = array_merge($header2, ['L', 'P', 'JML']);

		// TU
		$header1 = array_merge($header1, ['TU', '']);
		$header2 = array_merge($header2, ['L', 'P']);

		// PSB
		$header1 = array_merge($header1, ['PSB / Laboran', '']);
		$header2 = array_merge($header2, ['L', 'P']);

		// JML TU & PSB
		$header1 = array_merge($header1, ['JML TU & PSB']);
		$header2 = array_merge($header2, ['']);

		// Kebersihan
		$header1 = array_merge($header1, ['K. KEBERSIHAN', '']);
		$header2 = array_merge($header2, ['L', 'P']);

		// Satpam
		$header1 = array_merge($header1, ['SATPAM', '']);
		$header2 = array_merge($header2, ['L', 'P']);

		// JML K. Kebersihan & Satpam
		$header1 = array_merge($header1, ['JML K. KEBERSIHAN & SATPAM']);
		$header2 = array_merge($header2, ['']);

		// Total
		$header1 = array_merge($header1, ['TOTAL', '', '']);
		$header2 = array_merge($header2, ['L', 'P', 'JML']);

		// Masukkan header ke data
		$data[] = $header1;
		$data[] = $header2;

		// Data Baris
		foreach ($dataTable as $row) {
			$data[] = [
				$row->nama,
				$row->ks_L,
				$row->ks_P,
				$row->jml_kepsek,

				$row->wakasek_L,
				$row->wakasek_P,
				$row->jml_wakasek,

				$row->guru_L,
				$row->guru_P,
				$row->guru_JML,

				$row->tu_L,
				$row->tu_P,

				$row->psb_L,
				$row->psb_P,

				$row->jumlah_tu_psb,

				$row->kebersihan_L,
				$row->kebersihan_P,

				$row->satpam_L,
				$row->satpam_P,

				$row->jumlah_kebersihan_satpam,

				$row->total_L,
				$row->total_P,
				$row->total_JML,

			];
		}

		// Buat file XLSX
		$xlsx = Shuchkin\SimpleXLSXGen::fromArray($data);

		// Merge kolom judul
		$xlsx->mergeCells('A1:W1');
		$xlsx->mergeCells('A2:W2');
		$xlsx->mergeCells('A3:W3');

		// Merge header tingkat 1
		$xlsx->mergeCells('A4:A5'); // Jenjang Sekolah
		$xlsx->mergeCells('B4:D4'); // Kepsek
		$xlsx->mergeCells('E4:G4'); // Wakasek
		$xlsx->mergeCells('H4:J4'); // Guru
		$xlsx->mergeCells('K4:L4'); // TU
		$xlsx->mergeCells('M4:N4'); // PSB
		$xlsx->mergeCells('O4:O5'); // JML TU & PSB
		$xlsx->mergeCells('P4:Q4'); // Kebersihan
		$xlsx->mergeCells('R4:S4'); // Satpam
		$xlsx->mergeCells('T4:T5'); // JML Kebersihan & Satpam
		$xlsx->mergeCells('U4:W4'); // Total

		// Nama Save
		$timeNow = time();
		$tglNow  = date('d-m-Y');
		$taNama  = $this->config->item('pdn_murid_ta');
		$namaFile = 'Pegawai-Rekap-'.$taNama.'-'.$tglNow.'-'.$timeNow.'.xlsx';

		$xlsx->downloadAs($namaFile);
		exit;
	}
