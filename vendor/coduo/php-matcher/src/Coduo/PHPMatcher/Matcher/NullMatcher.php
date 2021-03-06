<?php

namespace Coduo\PHPMatcher\Matcher;

use Coduo\ToString\String;

class NullMatcher extends Matcher
{
    const MATCH_PATTERN = "/^@null@$/";

    /**
     * {@inheritDoc}
     */
    public function match($value, $pattern)
    {
        if (null !== $value) {
            $this->error = sprintf("%s \"%s\" does not match null.", gettype($value), new String($value));
            return false;
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function canMatch($pattern)
    {
        return is_string($pattern) && 0 !== preg_match(self::MATCH_PATTERN, $pattern);
    }
}
