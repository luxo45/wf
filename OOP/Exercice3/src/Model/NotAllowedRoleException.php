<?php
spl_autoload_register(function ($namespace) {
    $filename = $namespace . '.php';
    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $filename);
    $filename = __DIR__ . DIRECTORY_SEPARATOR . $fileName;
    if (is_file($filename)) {
        require_once $filename;
    }
});

class NotAllowedRoleException extends RuntimeException
{

    private $AllowRoleLabel = [];

    private $label;

    public function __construct(array $AllowRoleLabel, string $label, $message = NULL, $code = NULL, $previous = NULL)
    
    {
        $this->allowedRoleLabel = $allowedRoleLabel;
        $this->label = $label;
        $allowedMessage = 'only' . implode(',', $allowedRoleLabel) . ' are allowed.';
        $message = $this->getNewMessage() . $message;
        parent::__construct($message, $code, $previous);
    }

    private function getNewMessage()
    {}
}
new NotAllowedRoleException([
    'Role_USER',
    'ROLE_ADMIN'
], '');