<?php


namespace App\Model;


use App\Core\Model;

class RegisterModel extends Model
{

    public string $nickname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function register()
    {
        echo "Creating new user";
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'nickname' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => '35']],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => '8']],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];

    }
}