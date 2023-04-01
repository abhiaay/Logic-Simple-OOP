<?php

/**
 * Calculate sum of structure nodes that contain a given character
 */
function sum_deep(array $structures, string $chars, $charPosition = 1, $nodeLevel = 1)
{
    // Initialize the sum of nodes
    $sum = 0;

    foreach(str_split($chars) as $charPos => $char) { 
        // Check if the given characters is not single character
        if(strlen($chars) > 1) {
            // Increase character position by 1
            $charPosition = $charPos + 1;
        }

        foreach($structures as $structure) {
            if(is_array($structure)) { 
                // If the structure is an array, recursively call the function with the node level increase by 1
                $sum += sum_deep($structure, $char, $charPosition, $nodeLevel + 1);

            } else if(str_contains($structure, $char)) { 
                // Check if sturcture is plain text and has keyword char
                $sum += ($nodeLevel * $charPosition);
            }
        }
    }


    return $sum;

}

?>