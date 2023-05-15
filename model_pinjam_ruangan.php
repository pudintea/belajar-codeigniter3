<?php
/**
     * SAVE
     **/
	
function save($save_data)
    {
        if (empty ($save_data['oruangan_idruangan'])) {
            return false;
        }

        $this->_result = $this->db->insert($this->_dtable, $save_data);

        if ($this->_result) {
            return $this->_result;
        }
    }
public function cekPeminjam($room, $date_start, $date_end)
		{
			//$this->db->where('approved', 1);
			$this->db->where('oruangan_idruangan', $room);
			$this->db->where('oruangan_end >', $date_start);
			$this->db->where('oruangan_start <', $date_end);
			$query = $this->db->get($this->_dtable);

			if ($query->num_rows() > 0) {
				return true;
			}

			return false;
		}
