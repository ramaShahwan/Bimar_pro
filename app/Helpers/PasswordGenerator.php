<?php
namespace App\Helpers;

class PasswordGenerator
{
    public static function generate($length = 12)
    {
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';

        $allChars = $lowercase . $uppercase . $numbers . $specialChars;

        // تأكد من تضمين كل نوع من المحارف
        $password = '';
        $password .= $lowercase[random_int(0, strlen($lowercase) - 1)];
        $password .= $uppercase[random_int(0, strlen($uppercase) - 1)];
        $password .= $numbers[random_int(0, strlen($numbers) - 1)];
        $password .= $specialChars[random_int(0, strlen($specialChars) - 1)];

        // أضف محارف عشوائية حتى الوصول إلى الطول المطلوب
        for ($i = 4; $i < $length; $i++) {
            $password .= $allChars[random_int(0, strlen($allChars) - 1)];
        }

        // خلط المحارف
        $password = str_shuffle($password);

        return $password;
    }
}