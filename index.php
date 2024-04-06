<?php
return function ($parameters) {
    $list = $parameters["list"];
    $carry = $parameters["carry"];
    $iteration = $parameters["iteration"];
    $entry = -1;

    $list_addition = function (...$parameters) use ($list, $iteration, &$entry) {
        $carry = $parameters[0];
        $element = $parameters[1];
        $entry = $entry + 1;

        return $iteration([
            "carry" => $carry,
            "element" => $element,
            "entry" => $entry,
            "list" => $list
        ]);
    };
    return array_reduce($list, $list_addition, $carry);
};
