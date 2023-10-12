<?php namespace App\Models;

use CodeIgniter\Model;

class ClaimModel extends Model
{
    protected $table = 'claims';
    protected $allowedFields = ['user_id', 'comments', 'status', 'issue_status', 'claim_status', 'damage_cause', 'part_no', 'shipment_date', 'loaded_by', 'layers_lost', 'diameter', 'length', 'width', 'basis_weight', 'csf', 'notes', 'file_path'];

    //get claims with user details
    public function getClaims()
    {
        $builder = $this->db->table('claims');
        $builder->select('claims.*, CONCAT(users.first_name, " ", users.last_name) AS created_by');
        $builder->join('users', 'users.id = claims.user_id');
        $builder->orderBy('claims.id', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    //get claim by id
    public function getClaim($id)
    {
        $builder = $this->db->table('claims');
        $builder->select('claims.*, CONCAT(users.first_name, " ", users.last_name) AS created_by');
        $builder->join('users', 'users.id = claims.user_id');
        $builder->where('claims.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}
