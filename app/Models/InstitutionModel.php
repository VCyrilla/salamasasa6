<?php

namespace App\Models;

use CodeIgniter\Model;

/*
 * Institution Model for interacting with the institution table
 */
class InstitutionModel extends Model
{
	protected $table = 'institution';
	protected $primaryKey = 'institutionId';
	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
		'name',
		'location',
		'description',
		'longitude',
		'latitude',
		'regionId',
		'domain',
		'imageUrl'
	];

	protected $useTimestamps = false;
	protected $createdField = 'dateCreated';
	protected $updatedField = 'lastUpdated';

	protected $validationRules = [
		'name' => 'required|max_length[255]',
		'description' => 'max_length[255]',
		'location' => 'max_length[255]',
		'longitude' => 'max_length[50]',
		'latitude' => 'max_length[50]',
		'regionId' => 'integer'
	];

	protected $validationMessages = [];
	protected $skipValidation = false;

	/*
	 * Find an institution by its ID
	 * @param int $institutionId
	 * @return array|null
	 */
	public function findInstitution($institutionId)
	{
		return $this->find($institutionId);
	}

	/*
	 * Find an institution by its name
	 * @param string $name
	 * @return array|null
	 */
	public function findByName($name)
	{
		return $this->where('name', $name)->first();
	}

	/*
	 * Create a new institution
	 * @param array $data
	 * @return int|string
	 */
	public function createInstitution($data)
	{
		return $this->insert($data);
	}

	/*
	 * Update an institution
	 * @param int $institutionId
	 * @param array $data
	 * @return bool
	 */
	public function updateInstitution($institutionId, $data)
	{
		return $this->update($institutionId, $data);
	}

	/*
	 * Delete an institution
	 * @param int $institutionId
	 * @return bool
	 */
	public function deleteInstitution($institutionId)
	{
		return $this->delete($institutionId);
	}

	/*
	 * Get all institutions
	 * @return array
	 */
	public function getAllInstitutions()
	{
		// Perform a join with the region table to fetch region name
		$query = $this->db->table($this->table)
					->select('institution.*, region.name as region_name')
					->join('region', 'institution.regionId = region.regionId', 'left')
					->get();

		return $query->getResultArray();
	}

	/**
     * Check if the institution has associated doctors.
     *
     * @param int $institutionId
     * @return bool
     */
    public function hasDoctors($institutionId)
    {
        $doctorCount = $this->db->table('doctor')
                        ->where('institutionId', $institutionId)
                        ->countAllResults();

        return $doctorCount > 0;
    }
}
