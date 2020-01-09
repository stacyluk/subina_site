<?php

namespace ZxcvbnPhp;
require_once __DIR__.DIRECTORY_SEPARATOR.'Matchers/DateMatch.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Matchers/DigitMatch.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Matchers/L33tMatch.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Matchers/RepeatMatch.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Matchers/SequenceMatch.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Matchers/SpatialMatch.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Matchers/YearMatch.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Matchers/DictionaryMatch.php';



class Matcher
{
    /**
     * Get matches for a password.
     *
     * @param string $password   Password string to match
     * @param array  $userInputs Array of values related to the user (optional)
     * @code array('Alice Smith')
     * @endcode
     *
     * @return array Array of Match objects
     */
    public function getMatches($password, array $userInputs = [])
    {
        $matches = [];
        foreach ($this->getMatchers() as $matcher) {
            $matched = $matcher::match($password, $userInputs);
            if (is_array($matched) && !empty($matched)) {
                $matches = array_merge($matches, $matched);
            }
        }

        return $matches;
    }

    /**
     * Load available Match objects to match against a password.
     *
     * @return array Array of classes implementing MatchInterface
     */
    protected function getMatchers()
    {
        // @todo change to dynamic
        return [
            Matchers\DateMatch::class,
            Matchers\DigitMatch::class,
            Matchers\L33tMatch::class,
            Matchers\RepeatMatch::class,
            Matchers\SequenceMatch::class,
            Matchers\SpatialMatch::class,
            Matchers\YearMatch::class,
            Matchers\DictionaryMatch::class,
        ];
    }
}
