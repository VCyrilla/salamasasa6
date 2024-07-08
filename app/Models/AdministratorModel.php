<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Administrator Model for interacting with the administrator table
*/
class AdministratorModel extends Model
{
    protected $table = 'administrator';
    protected $primaryKey = 'administratorId';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name',
        'emailAddress',
        'imageUrl',
        'phoneNumber',
        'gravatarHash',
        'passwordHash',
        'isApproved',
        'dateCreated',
        'lastUpdated'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'dateCreated';
    protected $updatedField = 'lastUpdated';

    protected $validationRules = [
        'name' => 'required|max_length[255]',
        'emailAddress' => 'required|valid_email|max_length[255]',
        'passwordHash' => 'required|max_length[255]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;

    /*
    * Hash the administrator's password before saving it to the database
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
    * Hash the administrator's password before updating it in the database
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
    * Find an administrator by their email address
    * @param string $email
    * @return array|null
    */
    public function findByEmail($email)
    {
        return $this->where('emailAddress', $email)->first();
    }

    /*
    * Verify the administrator's password
    * @param string $inputPassword
    * @param string $storedHash
    * @return bool
    */
    public function verifyPassword($inputPassword, $storedHash)
    {
        return password_verify($inputPassword, $storedHash);
    }

    /*
    * Approve an administrator
    * @param int $administratorId
    * @return bool
    */
    public function approveAdministrator($administratorId)
    {
        return $this->update($administratorId, ['isApproved' => true]);
    }

    /*
    * Disapprove an administrator
    * @param int $administratorId
    * @return bool
    */
    public function disapproveAdministrator($administratorId)
    {
        return $this->update($administratorId, ['isApproved' => false]);
    }

    /*
    * Update an administrator's email address
    * @param int $administratorId
    * @param string $email
    * @return bool
    */
    public function updateEmail($administratorId, $email)
    {
        return $this->update($administratorId, ['emailAddress' => $email]);
    }

    /*
    * Update an administrator's gravatar hash
    * @param int $administratorId
    * @param string $gravatarHash
    * @return bool
    */
    public function updateGravatar($administratorId, $gravatarHash)
    {
        return $this->update($administratorId, ['gravatarHash' => $gravatarHash]);
    }

    /*
    * Update an administrator's password
    * @param int $administratorId
    * @param string $newPassword
    * @return bool
    */
    public function updatePassword($administratorId, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        return $this->update($administratorId, ['passwordHash' => $hashedPassword]);
    }

    /*
    * Delete an administrator's profile image
    * @param int $administratorId
    * @return bool
    */
    public function deleteProfileImage($administratorId)
    {
        return $this->update($administratorId, ['imageUrl' => null]);
    }

    /*
    * Get all administrators
    * @return array
    */
    public function getAllAdministrators()
    {
        return $this->findAll();
    }
}
