<?php namespace Anomaly\Streams\Addon\Extension\UsersModuleDefaultAuthenticator;

use Anomaly\Streams\Addon\Module\Users\Extension\AuthenticatorInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionAddon;

/**
 * Class UsersModuleDefaultAuthenticatorExtension
 *
 * This is the default authenticator for the Users module.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\UsersModuleDefaultAuthenticator
 */
class UsersModuleDefaultAuthenticatorExtension extends ExtensionAddon implements AuthenticatorInterface
{

    /**
     * The user repository interface.
     *
     * @var
     */
    protected $users;

    /**
     * Create a new UsersModuleDefaultAuthenticatorExtension instance.
     *
     * @param UserRepositoryInterface $users
     */
    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Authenticate the credentials.
     *
     * @param array $credentials
     * @return mixed
     */
    public function authenticate(array $credentials)
    {
        return $this->users->findUserByLoginAndPassword($credentials['login'], $credentials['password']);
    }
}
 