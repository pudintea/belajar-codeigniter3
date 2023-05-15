<?php
public function index()
	{
		$this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim');
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim');
		$this->form_validation->set_rules('acara', 'Acara', 'required|trim');
		//LOAD MODEL
		$this->load->model($this->MainModel(), 'M_najzmi');
		$this->data['dtruangan'] = $this->M_najzmi->getRuangan();
		$this->data['dtunit'] = $this->M_najzmi->getUnit();
		if($this->form_validation->run() == FALSE){
			$this->data['nama_peminjam'] = [
				'name' 			=> 'nama_peminjam',
				'id' 			=> 'nama_peminjam',
				'type' 			=> 'text',
				'class' 		=> 'form-control',
				'placeholder' 	=> 'Nama Peminjam',
				'required' 		=> 'required',
				'value' 		=> $this->form_validation->set_value('nama_peminjam'),
			];
			$this->data['tanggal'] = [
				'name' 			=> 'tanggal',
				'id' 			=> 'tanggal',
				'type' 			=> 'date',
				'class' 		=> 'form-control',
				'placeholder' 	=> 'Tanggal Peminjaman',
				'required' 		=> 'required',
				'value' 		=> $this->form_validation->set_value('tanggal'),
			];
			$this->data['jam_mulai'] = [
				'name' 			=> 'jam_mulai',
				'id' 			=> 'jam_mulai',
				'type' 			=> 'time',
				'class' 		=> 'form-control',
				'placeholder' 	=> 'Jam Mulai',
				'required' 		=> 'required',
				'value' 		=> $this->form_validation->set_value('jam_mulai'),
			];
			$this->data['jam_selesai'] = [
				'name' 			=> 'jam_selesai',
				'id' 			=> 'jam_selesai',
				'type' 			=> 'time',
				'class' 		=> 'form-control',
				'placeholder' 	=> 'Jam Selesai',
				'required' 		=> 'required',
				'value' 		=> $this->form_validation->set_value('jam_selesai'),
			];
			
			$this->data[$this->ClassNama()] = 'active';
			$this->template->load('template/admin','add',$this->data);
		}else{
			$register_data['oruangan_peminjam'] 		= htmlspecialchars($this->input->post('nama_peminjam', true));
			$register_data['oruangan_unit'] 			= htmlspecialchars($this->input->post('unit', true));
			$register_data['oruangan_idruangan'] 		= htmlspecialchars($this->input->post('ruangan', true));
			$register_data['oruangan_tanggal'] 			= htmlspecialchars($this->input->post('tanggal', true));
			$register_data['oruangan_jammulai'] 		= htmlspecialchars($this->input->post('jam_mulai', true));
			$register_data['oruangan_jamselesai'] 		= htmlspecialchars($this->input->post('jam_selesai', true));
			$register_data['oruangan_acara'] 			= htmlspecialchars($this->input->post('acara', true));
			$register_data['oruangan_tgl_input'] 		= date('Y-m-d H:i:s');
			
			$dateTahun  		= substr( $register_data['oruangan_tanggal'], 0, 4 );
			$dateBulan  		= substr( $register_data['oruangan_tanggal'], 5, 2 );
			$dateHari  			= substr( $register_data['oruangan_tanggal'], 8, 2 );

			$dateJamMulai 		= substr( $register_data['oruangan_jammulai'], 0, 2 );
			$dateMenitMulai 	= substr( $register_data['oruangan_jammulai'], 3, 2 );
			$dateJamSelesai 	= substr( $register_data['oruangan_jamselesai'], 0, 2 );
			$dateMenitSelesai 	= substr( $register_data['oruangan_jamselesai'], 3, 2 );
			$dateDetik  		= '00';
			
			$register_data['oruangan_start'] = mktime( $dateJamMulai, $dateMenitMulai, $dateDetik, $dateBulan, $dateHari, $dateTahun );
			$register_data['oruangan_end']   = mktime( $dateJamSelesai, $dateMenitSelesai, $dateDetik, $dateBulan, $dateHari, $dateTahun );
			
			// Gunakan untuk memeriksa, diantara dua jam tersebut apakah sudah ada yang menggunakan
			$date_start = mktime( $dateJamMulai-1, $dateMenitMulai, $dateDetik, $dateBulan, $dateHari, $dateTahun );
			$date_end   = mktime( $dateJamSelesai+1, $dateMenitSelesai, $dateDetik, $dateBulan, $dateHari, $dateTahun );
			
			$check = $this->M_najzmi->cekPeminjam($register_data['oruangan_idruangan'], $date_start, $date_end);
			
			if ($check) {
				$message = "MAAF Sudah Digunakan";
				$this->session->set_flashdata('error', $message);
				redirect(base_url($this->ClassNama()), 'refresh');
			}
		
			$input = $this->M_najzmi->save($register_data);
		
			if ($input){
				$message = $this->title()." berhasil dibuat!";
				$this->session->set_flashdata('success', $message);
				redirect(base_url($this->ClassNama()), 'refresh');
			}else{
				$message = "MAAF, ".$this->title()." tidak bisa dibuat";
				$this->session->set_flashdata('error', $message);
				redirect(base_url($this->ClassNama()), 'refresh');
			}
			
		}
	}
