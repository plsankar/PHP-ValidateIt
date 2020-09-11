<?php

namespace plsankar\ValidateIt;

class ValidateIt
{
    public static function isValid($inputArray, $rulesArray)
    {
        $valid = true;
        foreach ($rulesArray as $rule) {
            $rule_exp = explode(':', $rule);
            if (!self::hasObj($inputArray, $rule_exp[0])) {
                $valid = false;
            } else {
                if (sizeof($rule_exp) > 1) {
                    $func = "__VIt_" . $rule_exp[1];
                    if (method_exists(__CLASS__, $func)) {
                        if (!self::{$func}($inputArray[$rule_exp[0]])) {
                            $valid = false;
                        }
                    }
                }
            }
        }
        return $valid;
    }

    public static function hasObj($input, $v)
    {
        return isset($input[$v]) && !empty($input[$v]);
    }

    public static function __VIt_EMAIL($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    public static function __VIt_PHONE($phone)
    {
        if (!filter_var($phone, FILTER_VALIDATE_INT) || strlen($phone) != 10) {
            return false;
        } else {
            return true;
        }
    }

    public static function __VIt_INT($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_INT)) {
            return false;
        } else {
            return true;
        }
    }
}
