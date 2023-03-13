<?php

class BirthdayWishes_User
{
    /**
     * Store the user metadata.
     */
    public $user;

    /**
     * Store today date time object.
     */
    public $todayDate;

    /**
     * Store user date of birth date time object.
     */
    public $dateOfBirth;

    /**
     * Constructor.
     * 
     * Setup user metadata, today date time, and date of birth date time object.
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->todayDate = new DateTime();

        // Validate the date format.
        $this->dateOfBirth = (DateTime::createFromFormat('Y-m-d', $user['date_of_birth'][0])) ? : null;
    }

    /**
     * This method is used to get the user full name if exists.
     * 
     * If the full name is not set, it will return the user nickname.
     * 
     * @return  string
     */
    public function getFullName()
    {
        if ($this->user['first_name'][0] != '' && $this->user['last_name'][0] != '') {
            return $this->user['first_name'][0] .' '. $this->user['last_name'][0];
        }

        return $this->user['nickname'][0];
    }

    /**
     * This method is used to compute the user age.
     * 
     * @return  string
     */
    public function getAge()
    {
        if ($this->dateOfBirth) {
            return $this->todayDate
                ->diff($this->dateOfBirth)
                ->format('%y');
        }

        return null;
    }

    /**
     * This method is used to detect if today is current user birthday.
     * 
     * @return bool
     */
    public function IsBirthday()
    {
        if ($this->dateOfBirth) {
            return
                ($this->todayDate->format('m-d') == $this->dateOfBirth->format('m-d'));
        }

        return false;
    }
}