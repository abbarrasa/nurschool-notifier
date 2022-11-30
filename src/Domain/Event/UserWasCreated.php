<?php

declare(strict_types=1);

namespace Nurschool\Notifier\Domain\Event;

final class UserWasCreated
{
    private string $email;
    private string $firstname;
    private string $lastname;
    private bool $enabled;
    
    public function __construct(
        string $id,
        string $email,
        string $firstname,
        string $lastname,
        bool $enabled
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->enabled = $enabled;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Get the value of enabled
     */ 
    public function getEnabled(): bool
    {
        return $this->enabled;
    }        
}