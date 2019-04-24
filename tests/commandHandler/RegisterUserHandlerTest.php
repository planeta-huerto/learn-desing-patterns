<?php
namespace Tests\commandHandler;

use Patterns\commandHandler\RegisterUserCommand;
use Patterns\commandHandler\RegisterUserHandler;
use PHPUnit\Framework\TestCase;

class RegisterUserHandlerTest extends TestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function given_dto_in_command_when_method_invoke_is_call_return_true()
    {
        $command = new RegisterUserCommand('ejemplo@planetahuerto.es','12345678912345');
        $handle = new RegisterUserHandler();
        $result = $handle($command);

        $this->assertSame($result,true);
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function given_dto_in_command_when_method_invoke_is_call_that_return_exception_in_password()
    {
        $command = new RegisterUserCommand('ejemplo@planetahuerto.es','123456');
        $handle = new RegisterUserHandler();
        $handle($command);
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function given_dto_in_command_when_method_invoke_is_call_that_return_exception_in_email()
    {
        $command = new RegisterUserCommand('ejemplo@','12345678912345');
        $handle = new RegisterUserHandler();
        $handle($command);
    }
}