<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Region Model for interacting with the region table
*/
class RegionModel extends Model
{
    protected $table = 'region';
    protected $primaryKey = 'regionId';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name',
        'description',
        'dateCreated',
        'lastUpdated'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'dateCreated';
    protected $updatedField = 'lastUpdated';

    protected $validationRules = [
        'name' => 'required|max_length[255]',
        'description' => 'max_length[1000]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;

    /*
    * Find a region by its ID
    * @param int $regionId
    * @return array|null
    */
    public function findRegion($regionId)
    {
        return $this->find($regionId);
    }

    /*
    * Find a region by its name
    * @param string $name
    * @return array|null
    */
    public function findByName($name)
    {
        return $this->where('name', $name)->first();
    }

    /*
    * Create a new region
    * @param array $data
    * @return int|string
    */
    public function createRegion($data)
    {
        return $this->insert($data);
    }

    /*
    * Update a region
    * @param int $regionId
    * @param array $data
    * @return bool
    */
    public function updateRegion($regionId, $data)
    {
        return $this->update($regionId, $data);
    }

    /*
    * Delete a region
    * @param int $regionId
    * @return bool
    */
    public function deleteRegion($regionId)
    {
        return $this->delete($regionId);
    }

    /*
    * Get all regions
    * @return array
    */
    public function getAllRegions()
    {
        return $this->findAll();
    }
}
