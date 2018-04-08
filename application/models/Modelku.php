<?php 

trait Modelku {

	public function insert_banyak($data)
	{
		$this->db->insert_batch($this->table, $data);
	}

	public function exists($where)
	{
		return $this->db->from($this->table)->where($where)->count_all_results() > 0;
	}


	public function update_or_create($where, $data)
	{
		if($this->exists($where)){
			$this->db->where($where)->update($this->table, $data);
		}else{
			$this->db->insert($this->table, $where+$data);
		}
	}

}