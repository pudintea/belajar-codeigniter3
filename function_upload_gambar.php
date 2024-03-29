<?php

	function update(){

		$angka =  $this->input->post('gaji_poko');
		$gaji = str_replace(".", "", $angka);
		
		$id_user	= $this->input->post('id_user');
		$this->load->model($this->mainModel(),'M_najzmi');
		
		$data['user_nama_user'] 	= $this->input->post('nama_lengkap');
		$data['user_j_kelamin'] 	= $this->input->post('j_kelamin');
		$data['user_username'] 		= $this->input->post('username');
		$data['user_nip_user'] 		= $this->input->post('nip_user');
		$data['user_gaji_poko'] 	= $gaji ;
		
		// jika data kosong
		if ( empty($data['user_nip_user']) || empty($data['user_nama_user']) || empty($data['user_j_kelamin']) || empty($data['user_username']) || empty($id_user) ){
		
			$message = 'Data tidak boleh kosong ..!';
            $this->session->set_flashdata('error', $message);
            redirect(base_url('Profil'), 'refresh');
		}
		
		if  ( ! empty($_FILES['fileupload'] ['name'])){
		// jika file tidak kosong
		// File
        
        $tgl_now  = date('dmYHis');

        $config['remove_space']     = 'TRUE';
        $config['overwrite']        = 'TRUE';
        $config['upload_path']      = './uploads/poto-profil/';
        $config['allowed_types']    = 'jpg|png|jpeg';
        $config['max_size']         = '121096';
        $config['max_width']        = '121052';
        $config['max_height']       = '122048';
        $config['file_name']        = $tgl_now;
        $this->load->library('upload',$config);
            

        if (! $this->upload->do_upload('fileupload'))
        {
            $message = $this->upload->display_errors();
            $this->session->set_flashdata('error', $message);
            redirect(base_url('Profil'), 'refresh');
        }
        
        // $data = array('upload_data' => $this->upload->data());
        $pudin = $this->upload->data();
        $data['user_foto']         = $pudin['file_name'];
        
        // End File
		
		}
		
		if  ( ! empty($_FILES['tanda_tangan'] ['name'])){
			$tgl_now_video  = date('dmYHis');

			$config['remove_space']     = 'TRUE';
			$config['overwrite']        = 'TRUE';
			$config['upload_path']      = './uploads/ttd/';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = '121096';
			$config['max_width']        = '121052';
			$config['max_height']       = '122048';
			$config['file_name']        = $id_user.'_'.$tgl_now_video ;
			$this->load->library('upload',$config);
				

			if (! $this->upload->do_upload('tanda_tangan'))
			{
				$message = $this->upload->display_errors();
				$this->session->set_flashdata('error', $message);
				redirect(base_url('Profil'), 'refresh');
			}
			
			// $data = array('upload_data' => $this->upload->data());
			$pudin_ttd = $this->upload->data();
			$data['user_ttd']         = $pudin_ttd['file_name'];
			
			// End File
		
		}


		$_result = $this->M_najzmi->update($data,$id_user);
					
		if ($_result) {
			$message = 'Data sudah berhasil diubah';
			$this->session->set_flashdata('success', $message);
		} else {
			$message = 'Data tidak berhasil di ubah';
			$this->session->set_flashdata('error', $message);
		}
		redirect(base_url('Profil'), 'refresh');
			
	}
