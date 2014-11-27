<?php

namespace WS\Auth;

use Illuminate\Auth\UserProviderInterface,
    Illuminate\Auth\GenericUser,
    WS\Domain\User\Service\WSUserService;

/**
 * recordar composer dump-auto
 */
class WSUserProvider implements UserProviderInterface {

    /**
     * @var UserService
     */
    private $userService;

    public function __construct(WSUserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     *
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByID($identifier) {
        /** @var User $user  */
        $user = $this->userService->findUserByUserIdentifier($identifier);

        if (!$user instanceof \UsuarioWS) {
            return false;
        }

        return new GenericUser(array(
            'id' => $user->getUserIdentifier(),
            'username' => $user->getUserName()
        ));
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     *
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials) {
        /** @var User $user  */
        $user = $this->userService->findUserByUserName($credentials['id']);

        if (!$user instanceof \UsuarioWS) {
            return false;
        }

	return new GenericUser(array(
            'id' => $user->getUserIdentifier(),
            'username' => $user->getUserName()
        ));
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param \Illuminate\Auth\UserInterface $user
     * @param  array  $credentials
     *
     * @return bool
     */
    public function validateCredentials(\Illuminate\Auth\UserInterface $user, array $credentials) {
        $validated = $this->userService->validateUserCredentials(
                $credentials['id'], $credentials['password']
        );

        $validated = $validated && $user->userName = $credentials['id'];

        return (bool) $validated;
    }

    public function retrieveByToken($identifier, $token) {
        
    }

    public function updateRememberToken(\Illuminate\Auth\UserInterface $user, $token) {
        
    }

}
?>

