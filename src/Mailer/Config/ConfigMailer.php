<?php

namespace Nurschool\Notifier\Mailer\Config;

use Nurschool\Notifier\Mailer\Domain\Model\Config\ConfigEmail;

abstract class ConfigMailer
{
    /**
     * Sets a mailer configuration value
     * @param string $id
     * @param ConfigEmail $config
     * @return mixed
     */
    abstract public function add(string $id, ConfigEmail $config);

    /**
     * Gets a mailer configuration value by its name
     * @param string $id
     * @return ConfigEmail
     */
    abstract public function get(string $id): ConfigEmail;

    /**
     * Gets all mailer configuration values
     * @return mixed
     */
    abstract public function getAll();
}