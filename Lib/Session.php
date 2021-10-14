<?php

final class Session
{
    const ERROR_NAME_KEY = 'errorsName';
    const ERROR_EMAIL_KEY = 'errorsEmail';
    const ERROR_PASSWORD_KEY = 'errorsPassword';
    const ERROR_PASSWORD_CONFIRM_KEY = 'errorsPasswordConfirm';
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
    
    public function getErrorsName(): ?string
    {
        $errors = $this->get(self::ERROR_NAME_KEY);
        return empty($errors) ? null : $errors;
    }

    public function getErrorsEmail(): ?string
    {
        $errors = $this->get(self::ERROR_EMAIL_KEY);
        return empty($errors) ? null : $errors;
    }

    public function getErrorsPassword(): ?string
    {
        $errors = $this->get(self::ERROR_PASSWORD_KEY);
        return empty($errors) ? null : $errors;
    }

    public function getErrorsPasswordConfirm(): ?string
    {
        $errors = $this->get(self::ERROR_PASSWORD_CONFIRM_KEY);
        return empty($errors) ? null : $errors;
    }

    public function destroyErrorsName(): void
    {
        $this->destroy(self::ERROR_NAME_KEY);
    }

    public function destroyErrorsEmail(): void
    {
        $this->destroy(self::ERROR_EMAIL_KEY);
    }

    public function destroyErrorsPassword(): void
    {
        $this->destroy(self::ERROR_PASSWORD_KEY);
    }

    public function destroyErrorsPasswordConfirm(): void
    {
        $this->destroy(self::ERROR_PASSWORD_CONFIRM_KEY);
    }

    public function getErrorsNameWithDestroy(): ?string
    {
        $errors = $this->getErrorsName();
        $this->destroyErrorsName();
        return $errors;
    }

    public function getErrorsEmailWithDestroy(): ?string
    {
        $errors = $this->getErrorsEmail();
        $this->destroyErrorsEmail();
        return $errors;
    }

    public function getErrorsPasswordWithDestroy(): ?string
    {
        $errors = $this->getErrorsPassword();
        $this->destroyErrorsPassword();
        return $errors;
    }

    public function getErrorsPasswordConfirmWithDestroy(): ?string
    {
        $errors = $this->getErrorsPasswordConfirm();
        $this->destroyErrorsPasswordConfirm();
        return $errors;
    }

    public function setAuth(int $id, string $name): void
    {
        
    }
}
