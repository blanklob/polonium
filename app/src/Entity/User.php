<?php

namespace App\Entity;

class User extends BaseEntity
{
    private int $id;
    private string $userFirstName;
    private string $userLastName;
    private string $userEmail;
    private string $userPassword;
    private int $userRole;

    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    protected function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return string
     */
    public function getUserFirstName(): string
    {
        return $this->userFirstName;
    }

    /**
     * @param string $userFirstName
     * @return User
     */
    protected function setUserFirstName(string $userFirstName): self
    {
        $this->userFirstName = $userFirstName;
        return $this;
    }


        /**
     * @return string
     */
    public function getUserLastName(): string
    {
        return $this->userLastName;
    }

    /**
     * @param string $userLastName
     * @return User
     */
    protected function setUserLastName(string $userLastName): self
    {
        $this->userLastName = $userLastName;
        return $this;
    }
    

        /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     * @return User
     */
    protected function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;
        return $this;
    }
        

        /**
     * @return string
     */
    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    /**
     * @param string $userPassword
     * @return User
     */
    protected function setUserPassword(string $userPassword): self
    {
        $this->userPassword = $userPassword;
        return $this;
    }


        /**
     * @return int
     */
    public function getUserRole(): int
    {
        return $this->userRole;
    }

    /**
     * @param int $userRole
     * @return User
     */
    protected function setUserRole(int $userRole): self
    {
        $this->userRole = $userRole;
        return $this;
    }

}