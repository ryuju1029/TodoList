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
        if (isset(self::$instance)) {
            return self::$instance;
        }

        self::$instance = new self();
        return self::$instance;
    }

    public function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function destroy(string $key): void
    {
        unset($_SESSION[$key]);
    }
    
    public function getErrors(): array
    {
        // $_SESSION['errors']を取得する処理
        $errors = $this->get(self::ERROR_KEY);
        return empty($errors) ? [] : $errors;
    }

    public function destroyErrors(): void
    {
        $this->destroy(self::ERROR_KEY);
    }

    public function getErrorsWithDestroy(): array
    {
        // $errors = $_SESSION['errors'];
        $errors = $this->getErrors();

        // unset($_SESSION['errors']);
        $this->destroyErrors();

        return $errors;
    }

    public function setAuth(int $id, string $name): void
    {
        
    }
}
