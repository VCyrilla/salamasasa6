<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Appointment Model for interacting with the appointment table
*/
class AppointmentModel extends Model
{
    protected $table = 'appointment';
    protected $primaryKey = 'appointmentId';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'patientId',
        'doctorId',
        'startTime',
        'endTime',
        'status',
        'ratings',
        'review',
        'doctorComments',
        'summary'
    ];

    protected $useTimestamps = false; // Assuming timestamps are managed externally
    protected $createdField = 'dateCreated';
    protected $updatedField = 'lastUpdated';

    protected $validationRules = [
        'patientId' => 'required|integer',
        'doctorId' => 'required|integer',
        'startTime' => 'required',
        'endTime' => 'required',
        'status' => 'max_length[50]',
        'ratings' => 'integer',
        'review' => 'max_length[255]',
        'doctorComments' => 'max_length[255]',
        'summary' => 'max_length[255]'
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;

    /*
    * Find an appointment by its ID
    * @param int $appointmentId
    * @return array|null
    */
    public function findAppointment($appointmentId)
    {
        return $this->find($appointmentId);
    }

    /*
    * Create a new appointment
    * @param array $data
    * @return int|string
    */
    public function createAppointment($data)
    {
        return $this->insert($data);
    }

    /*
    * Update an appointment
    * @param int $appointmentId
    * @param array $data
    * @return bool
    */
    public function updateAppointment($appointmentId, $data)
    {
        return $this->update($appointmentId, $data);
    }

    /*
    * Delete an appointment
    * @param int $appointmentId
    * @return bool
    */
    public function deleteAppointment($appointmentId)
    {
        return $this->delete($appointmentId);
    }

    /*
    * Get all appointments
    * @return array
    */
    public function getAllAppointments()
    {
        return $this->findAll();
	}
	
	/*
    * Get all patient appointments
    * @param int $patientId
    * @return array
    */
	public function getPatientAppointments($patientId)
    {
        return $this->where('patientId', $patientId)->findAll();
	}

	/*
    * Get all doctor appointments
    * @param int $doctorId
    * @return array
    */
	public function getDoctorAppointments($doctorId)
    {
        return $this->where('doctorId', $doctorId)->findAll();
    }
}
