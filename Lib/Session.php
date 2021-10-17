<?php

final class Session
{
    const ERROR_NAME_KEY = 'errorsName';
    const ERROR_EMAIL_KEY = 'errorsEmail';
    const ERROR_PASSWORD_KEY = 'errorsPassword';
    const ERROR_PASSWORD_CONFIRM_KEY = 'errorsPasswordConfirm';
    const ERROR_CONTENT_KEY = 'errorContent';
    const ERROR_DEAD_LINE_KEY = 'errorDeadline';
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

    public function getErrorsNameWithDestroy(): ?string
    {
        $errors = $this->getErrorsName();
        $this->destroyErrorsName();
        return $errors;
    }

    public function getErrorsName(): ?string
    {
        $errors = $this->get(self::ERROR_NAME_KEY);
        return empty($errors) ? null : $errors;
    }

    public function destroyErrorsName(): void
    {
        $this->destroy(self::ERROR_NAME_KEY);
    }

    public function getErrorsEmailWithDestroy(): ?string
    {
        $errors = $this->getErrorsEmail();
        $this->destroyErrorsEmail();
        return $errors;
    }

    public function getErrorsEmail(): ?string
    {
        $errors = $this->get(self::ERROR_EMAIL_KEY);
        return empty($errors) ? null : $errors;
    }

    public function destroyErrorsEmail(): void
    {
        $this->destroy(self::ERROR_EMAIL_KEY);
    }
    
    public function getErrorsPasswordWithDestroy(): ?string
    {
        $errors = $this->getErrorsPassword();
        $this->destroyErrorsPassword();
        return $errors;
    }

    public function getErrorsPassword(): ?string
    {
        $errors = $this->get(self::ERROR_PASSWORD_KEY);
        return empty($errors) ? null : $errors;
    }

    public function destroyErrorsPassword(): void
    {
        $this->destroy(self::ERROR_PASSWORD_KEY);
    }

    public function getErrorsPasswordConfirmWithDestroy(): ?string
    {
        $errors = $this->getErrorsPasswordConfirm();
        $this->destroyErrorsPasswordConfirm();
        return $errors;
    }

    public function getErrorsPasswordConfirm(): ?string
    {
        $errors = $this->get(self::ERROR_PASSWORD_CONFIRM_KEY);
        return empty($errors) ? null : $errors;
    }

    public function destroyErrorsPasswordConfirm(): void
    {
        $this->destroy(self::ERROR_PASSWORD_CONFIRM_KEY);
    }

    public function getErrorContentWithDestroy(): ?string
    {
        $errors = $this->getErrorContent();
        $this->destroyErrorContent();
        return $errors;
    }

    public function getErrorContent(): ?string
    {
        $errors = $this->get(self::ERROR_CONTENT_KEY);
        return empty($errors) ? null : $errors;
    }

    public function destroyErrorContent(): void
    {
        $this->destroy(self::ERROR_CONTENT_KEY);
    }

    public function getErrorDeadlineWithDestroy(): ?string
    {
        $errors = $this->getErrorDeadline();
        $this->destroyErrorDeadline();
        return $errors;
    }

    public function getErrorDeadline(): ?string
    {
        $errors = $this->get(self::ERROR_DEAD_LINE_KEY);
        return empty($errors) ? null : $errors;
    }

    public function destroyErrorDeadline(): void
    {
        $this->destroy(self::ERROR_DEAD_LINE_KEY);
    }





    // public function setAuth(int $id, string $name): void
    // {
        
    // }
}
