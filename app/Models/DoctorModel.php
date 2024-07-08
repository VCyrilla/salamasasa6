<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Doctor Model for interacting with the doctor table
*/
class DoctorModel extends Model
{
    protected $table = 'doctor';
    protected $primaryKey = 'doctorId';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name',
        'emailAddress',
        'isApproved',
        'isConfirmed',
        'imageUrl',
        'specializationId',
        'institutionId',
        'licenseNumber',
        'phoneNumber',
        'passwordHash',
        'gravatarHash',
        'dateCreated',
        'lastUpdated'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'dateCreated';
    protected $updatedField = 'lastUpdated';

    protected $validationRules = [
        'name' => 'required|max_length[255]',
        'emailAddress' => 'required|valid_email|max_length[255]',
        'specializationId' => 'required|integer',
        'institutionId' => 'required|integer',
        'licenseNumber' => 'required|max_length[100]',
        'phoneNumber' => 'required|max_length[50]',
        'passwordHash' => 'required|max_length[255]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;

    /*
    * Hash the doctor's password before saving it to the database
    * @param array $data
    * @return array
    */
    protected function beforeInsert(array $data)
    {
        if (isset($data['data']['passwordHash'])) {
            $data['data']['passwordHash'] = password_hash($data['data']['passwordHash'], PASSWORD_BCRYPT);
        }

        return $data;
    }

    /*
    * Hash the doctor's password before updating it in the database
    * @param array $data
    * @return array
    */
    protected function beforeUpdate(array $data)
    {
        if (isset($data['data']['passwordHash'])) {
            $data['data']['passwordHash'] = password_hash($data['data']['passwordHash'], PASSWORD_BCRYPT);
        }

        return $data;
    }

    /*
    * Find a doctor by their email address
    * @param string $email
    * @return array|null
    */
    public function findByEmail($email)
    {
        return $this->where('emailAddress', $email)->first();
    }

    /*
    * Verify the doctor's password
    * @param string $inputPassword
    * @param string $storedHash
    * @return bool
    */
    public function verifyPassword($inputPassword, $storedHash)
    {
        return password_verify($inputPassword, $storedHash);
    }

    /*
    * Get all doctors with their specialization and institution
    * @return array
    */
    public function getAllDoctors()
    {
        $this->select('doctor.*, specialization.title as specializationTitle, institution.name as institutionName');
        $this->join('specialization', 'specialization.specializationId = doctor.specializationId');
        $this->join('institution', 'institution.institutionId = doctor.institutionId');
        return $this->findAll();
    }

    /*
    * Approve a doctor
    * @param int $doctorId
    * @return bool
    */
    public function approveDoctor($doctorId)
    {
        return $this->update($doctorId, ['isApproved' => true]);
    }

    /*
    * Disapprove a doctor
    * @param int $doctorId
    * @return bool
    */
    public function disapproveDoctor($doctorId)
    {
        return $this->update($doctorId, ['isApproved' => false]);
    }
}
