<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{

	protected $table	= '';
	protected $perPage	= 8;

	public function __construct()
	{
		parent::__construct();

		if (!$this->table) {
			$this->table = strtolower(
				str_replace('_model', '', get_class($this))
			);
		}
	}

	public function validate()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters(
			'<small class="form-text text-danger">', '</small>'
		);
		$validationRules = $this->getValidationRules();

		$this->form_validation->set_rules($validationRules);

		return $this->form_validation->run();
	}

	public function select($columns)
	{
		$this->db->select($columns);
		return $this;
	}

	public function where($column, $condition)
	{
		$this->db->where($column, $condition);
		return $this;
	}

	public function like($column, $condition)
	{
		$this->db->like($column, $condition);
		return $this;
	}

	public function orLike($column, $condition)
	{
		$this->db->or_like($column, $condition);
		return $this;
	}

	public function join($table, $type = 'left')
	{
		$this->db->join($table, "$this->table.id_$table = $table.id", $type);
		return $this;
	}

	public function orderBy($column, $order = 'asc')
	{
		$this->db->order_by($column, $order);
		return $this;
	}

	public function first()
	{
		return $this->db->get($this->table)->row();
	}

	public function get()
	{
		return $this->db->get($this->table)->result();
	}

	public function count()
	{
		return $this->db->count_all_results($this->table);
	}

	public function create($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($data)
	{
		return $this->db->update($this->table, $data);
	}

	public function delete()
	{
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}

	public function paginate($page)
	{
		$this->db->limit(
			$this->perPage,
			$this->calculateRealOffset($page)
		);

		return $this;
	}

	public function calculateRealOffset($page)
	{
		if (is_null($page) || empty($page)) {
			$offset = 0;
		} else {
			$offset = ($page * $this->perPage) - $this->perPage;
		}

		return $offset;
	}
	
	public function makePagination($baseUrl, $uriSegment, $totalRows = null)
	{
		$this->load->library('pagination');

		$config = [
			'base_url'			=> $baseUrl,
			'uri_segment'		=> $uriSegment,
			'per_page'			=> $this->perPage,
			'total_rows'		=> $totalRows,
			'use_page_numbers'	=> true,

			'full_tag_open'		=> '<ul class="pagination">',
			'full_tag_close'	=> '</ul>',
			'attributes'		=> ['class' => 'pagination__link'],
			'first_link'		=> false,
			'last_link'			=> false,
			'first_tag_open'	=> '<li>',
			'first_tag_close'	=> '</li>',
			'prev_link'			=> '&laquo',
			'prev_tag_open'		=> '<li>',
			'prev_tag_close'	=> '</li>',
			'next_link'			=> '&raquo',
			'next_tag_open'		=> '<li>',
			'next_tag_close'	=> '</li>',
			'last_tag_open'		=> '<li>',
			'last_tag_close'	=> '</li>',
			'cur_tag_open'		=> '<li><a href="#" class="pagination__link pagination__link--active">',
			'cur_tag_close'		=> '<span class="sr-only"> (current)</span></a></li>',
			'num_tag_open'		=> '<li>',
			'num_tag_close'		=> '</li>',
		];

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
}

/* End of file MY_Model.php */
