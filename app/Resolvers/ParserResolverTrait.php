<?php

namespace App\Resolvers;

trait ParserResolverTrait
{
    /**
     * Resolver to convert any type of format to array
     *
     * @param mixed $data
     * @return array
     */
    public function toArray($data)
    {
        if (is_object($data)) {
            return json_decode(json_encode($data), true);
        }

        if ($this->isValidJson($data)) {
            return json_decode($data, true);
        }

        return $data;
    }

    /**
     * Validates if string is a valid json.
     *
     * @param string $data
     * @return bool
     */
    private function isValidJson($data)
    {
        json_decode($data);

        return (json_last_error() === JSON_ERROR_NONE);
    }
}
