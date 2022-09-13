<?php


namespace App\Model;


use App\Core\DbModel;

class User extends DbModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $username = '';
    public string $email = '';
    public string $password = '';
    public int $status = self::STATUS_INACTIVE;
    public string $confirmPassword = '';

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE,
                'class' => self::class,
                'attribute' => 'email'
            ]],
            'username' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => '35'], [
                self::RULE_UNIQUE,
                'class' => self::class,
                'attribute' => 'username'
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => '8']],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];

    }

    public function labels(): array
    {
        return [
            'username' => 'Username',
            'email' => 'E-mail address',
            'password' => 'Password',
            'confirmPassword' => 'Confirm password',
            ];
    }

    function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {
        return ['username', 'email', 'password', 'status'];
    }
}