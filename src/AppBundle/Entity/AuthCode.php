<?php

namespace AppBundle\Entity;
use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;

/**
 * AuthCode
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \AppBundle\Entity\Client
     */
    protected $client;

    /**
     * @var \AppBundle\Entity\User
     */
    protected $user;

}
