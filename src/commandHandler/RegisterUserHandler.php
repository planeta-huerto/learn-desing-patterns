<?php

namespace Patterns\commandHandler;


class RegisterUserHandler
{
    const MINIMUM_LENGHT = 12;

    public function __construct(){}

    /**
     * @param RegisterUserCommand $registerUserCommand
     * @return bool
     * @throws \Exception
     */
    public function __invoke(RegisterUserCommand $registerUserCommand)
    {
        $email = $registerUserCommand->email();
        $password = $registerUserCommand->password();

        $this->checkEmail($email);
        $this->checkPassword($password);

        return true;
    }

    /**
     * @param string $email
     * @throws \Exception
     */
    private function checkEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \LogicException('Invalid email');
        }
    }

    /**
     * @param string $password
     * @throws \Exception
     */
    private function checkPassword(string $password)
    {
        if (self::MINIMUM_LENGHT > strlen($password)) {
            throw new \Exception('Password too short');
        }
    }
}