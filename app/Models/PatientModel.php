<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Patient Model for interacting with the patient table
*/
class PatientModel extends Model
{
    protected $table = 'patient';
    protected $primaryKey = 'patientId';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'emailAddress',
        'gravatarHash',
        'passwordHash',
        'isConfirmed',
        'dateCreated',
        'lastUpdated'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'dateCreated';
    protected $updatedField = 'lastUpdated';

    protected $validationRules = [
        'emailAddress' => 'required|valid_email|max_length[255]',
        'passwordHash' => 'required|max_length[255]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;

    /*
    * Hash the patient's password before saving it to the database
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
    * Hash the patient's password before updating it in the database
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
    * Find a patient by their email address
    * @param string $email
    * @return array|null
    */
    public function findByEmail($email)
    {
        return $this->where('emailAddress', $email)->first();
    }

    /*
    * Verify the patient's password
    * @param string $inputPassword
    * @param string $storedHash
    * @return bool
    */
    public function verifyPassword($inputPassword, $storedHash)
    {
        return password_verify($inputPassword, $storedHash);
    }

    /*
    * Confirm a patient's email address
    * @param int $patientId
    * @return bool
    */
    public function confirmPatient($patientId)
    {
        return $this->update($patientId, ['isConfirmed' => true]);
    }

    /*
    * Update a patient's email address
    * @param int $patientId
    * @param string $email
    * @return bool
    */
    public function updateEmail($patientId, $email)
    {
        return $this->update($patientId, ['emailAddress' => $email, 'isConfirmed' => false]);
    }

    /*
    * Update a patient's gravatar hash
    * @param int $patientId
    * @param string $gravatarHash
    * @return bool
    */
    public function updateGravatar($patientId, $gravatarHash)
    {
        return $this->update($patientId, ['gravatarHash' => $gravatarHash]);
    }

    /*
    * Update a patient's password
    * @param int $patientId
    * @param string $newPassword
    * @return bool
    */
    public function updatePassword($patientId, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        return $this->update($patientId, ['passwordHash' => $hashedPassword]);
    }

    /*
    * Delete a patient's profile image
    * @param int $patientId
    * @return bool
    */
    public function deleteProfileImage($patientId)
    {
        return $this->update($patientId, ['gravatarHash' => null]);
    }

    /*
    * Get all patients
    * @return array
    */
    public function getAllPatients()
    {
        return $this->findAll();
    }
}
