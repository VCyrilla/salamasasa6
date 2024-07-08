<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Specialization Model for interacting with the specialization table
*/
class SpecializationModel extends Model
{
    protected $table = 'specialization';
    protected $primaryKey = 'specializationId';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'title',
        'description'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'dateCreated';
    protected $updatedField = 'lastUpdated';

    protected $validationRules = [
        'title' => 'required|max_length[255]',
        'description' => 'max_length[1000]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;

    /*
    * Find a specialization by its ID
    * @param int $specializationId
    * @return array|null
    */
    public function findSpecialization($specializationId)
    {
        return $this->find($specializationId);
    }

    /*
    * Create a new specialization
    * @param array $data
    * @return int|string
    */
    public function createSpecialization($data)
    {
        return $this->insert($data);
    }

    /*
    * Update a specialization
    * @param int $specializationId
    * @param array $data
    * @return bool
    */
    public function updateSpecialization($specializationId, $data)
    {
        return $this->update($specializationId, $data);
    }

    /*
    * Delete a specialization
    * @param int $specializationId
    * @return bool
    */
    public function deleteSpecialization($specializationId)
    {
        return $this->delete($specializationId);
    }

    /*
    * Get all specializations
    * @return array
    */
    public function getAllSpecializations()
    {
        return $this->findAll();
    }
}

