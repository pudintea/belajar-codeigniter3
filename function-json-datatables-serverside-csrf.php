// Untuk mengaktifkan CSRF ada di bagian application/config/config.php == $config['csrf_protection'] = TRUE;


function data_json()
	{
		if($this->input->method(TRUE)=='POST'): // Hanya lewat metode post saja yang di izinkan melihat dan mengambil data
		
			$csrf_name = $this->security->get_csrf_token_name();
			$csrf_hash = $this->security->get_csrf_hash();
				
			$tabel = 'tb_angkatan';
			$column_order = array('', 'angkatan_nama');
			$column_search = array('angkatan_nama');
			$order = array('angkatan_nama' => 'DESC');
			//$where = array('id_angkatan' => 3);
				
				$this->load->model('DatatablesModel' ,'M_najzmi');
				$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
				//$data = $list;
				$data = array();
				$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
				
				foreach ($list as $pDn) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $pDn->angkatan_nama;
					$row[] = '<div class="btn-group">
								  <a href="adm_angkatan/edit/'.$pDn->id_angkatan.'"  class="btn btn-success btn-sm">Edit</a>
								  <a href="adm_angkatan/hapus/'.$pDn->id_angkatan.'" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
								</div>';
					
					$data[] = $row;
				}
				
				
				$output = array(
								"draw" => isset($_POST['draw']) 	? $_POST['draw'] 	: 'null',
								"recordsTotal" => $this->M_najzmi->count_all($tabel,$column_order,$column_search,$order),
								"recordsFiltered" => $this->M_najzmi->count_filtered($tabel,$column_order,$column_search,$order),
								"data" => $data,
						);
				$output[$csrf_name] = $csrf_hash;
				//output to json format
				header('Content-type: application/json');
				echo json_encode($output);
			// End Json
		endif;
	}


// ============= WHERE ======================

	function data_json()
	{
		if($this->input->method(TRUE)=='POST'): // Hanya lewat metode post saja yang di izinkan melihat dan mengambil data
		
			$csrf_name = $this->security->get_csrf_token_name();
			$csrf_hash = $this->security->get_csrf_hash();
				
			$tabel = 'tb_angkatan';
			$column_order = array('', 'angkatan_nama');
			$column_search = array('angkatan_nama');
			$order = array('angkatan_nama' => 'DESC');
			$where = array('id_angkatan' => 3);
				
				$this->load->model('Where_DatatablesModel' ,'M_najzmi');
				$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order,$where);
				//$data = $list;
				$data = array();
				$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
				
				foreach ($list as $pDn) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $pDn->angkatan_nama;
					$row[] = '<div class="btn-group">
								  <a href="adm_angkatan/edit/'.$pDn->id_angkatan.'"  class="btn btn-success btn-sm">Edit</a>
								  <a href="adm_angkatan/hapus/'.$pDn->id_angkatan.'" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
								</div>';
					
					$data[] = $row;
				}
				
				
				$output = array(
								"draw" => isset($_POST['draw']) 	? $_POST['draw'] 	: 'null',
								"recordsTotal" => $this->M_najzmi->count_all($tabel,$column_order,$column_search,$order,$where),
								"recordsFiltered" => $this->M_najzmi->count_filtered($tabel,$column_order,$column_search,$order,$where),
								"data" => $data,
						);
				$output[$csrf_name] = $csrf_hash;
				//output to json format
				header('Content-type: application/json');
				echo json_encode($output);
			// End Json
		endif;
	}


// =========== END WHERE ====================
