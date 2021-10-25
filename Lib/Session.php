<?php

final class Session
{
    const ERROR_KEY = 'errors';

    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        self::start();

        if (isset(self::$instance)) {
            return self::$instance;
        }

        self::$instance = new self();
        return self::$instance;
    }

    private static function start(): void
    {
        $_SESSION = null;
        if (is_null($_SESSION)) {
            session_start();
        }
    }

    public function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function destroy(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function getErrorsWithDestroy(): array
    {
        $errors = $this->getErrors();
        $this->destroyErrors();
        return $errors;
    }

    public function getErrors(): array
    {
        $errors = $this->get(self::ERROR_KEY);
        return empty($errors) ? [] : $errors;
    }

    public function destroyErrors(): void
    {
        $this->destroy(self::ERROR_KEY);
    }

    public function setErrors(array $errors): void
    {
        $_SESSION[self::ERROR_KEY] = $errors;
    }

    public function setAuth(int $id, string $name): void
    {
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
    }


}
