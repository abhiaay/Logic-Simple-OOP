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

/**
 * Get schema tag from given html tag string
 */
function get_schema($htmlTags) 
{
    // Initialize variables
    $tag = "sc-";
    $tags = [];

    /**
     * @var array array of tag end identifier
     */
    $endOfTags = [">", "\"", " "];

    // While get first position of tag from htmlTags is exists
    while(($tagFirstPosition = strpos($htmlTags, $tag)) !== false) {

        // First position of tag increase by length of tag finder
        $tagFirstPosition += strlen($tag);
        // Get substring from html tag start from the first tag position
        $subStringTag = substr($htmlTags, $tagFirstPosition);

        // Get position of end of tag
        $tagLength = null;
        foreach($endOfTags as $endOfTag) {
            $tempLength = strpos($subStringTag, $endOfTag);
            if(! $tagLength || ($tempLength && $tempLength < $tagLength)) {
                $tagLength = $tempLength;
            }
        }

        // get tagged string
        $tagged = substr($htmlTags, $tagFirstPosition, $tagLength);

        // check if tagged has (=) string
        if(str_contains($tagged, '=')) {
            // Get first position (") in subStringTag to find tag value and increase by 1 because the tag has (=)
            $firstPositionOfValue = strpos($subStringTag, "\"") + 1;
            // Get the end of position (") for subStringTag to find tag value
            $endPositionOfValue = strpos(substr($subStringTag, $firstPositionOfValue), "\"");

            // prepare the variable tagged to contains array
            $tagged = [
                substr($tagged, 0, -1) => substr($subStringTag, $firstPositionOfValue, $endPositionOfValue)
            ];
        }

        // remove previous string before before tagged include the tagged it self
        $htmlTags = substr($htmlTags, $tagFirstPosition + $tagLength);

        // check if it still in current dom depth html tag
        $tags[] = $tagged;
    }
    return json_encode($tags, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
}
?>