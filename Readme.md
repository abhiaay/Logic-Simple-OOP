# PHP Logic Test

# Requirements
    This script made while use PHP 8.1

## `sum_deep` Function
> That receives one array that its structure like a tree and one character. The function/method will return a positive integer of sum of node level which any nodes contain the second parameter. Level of the root node is 1. 

> Assump the parameter never empty (array always at least have one node as root node and the second parameter always one character) and the height of the tree is finite.

#### EXAMPLE Test Case
+ Input: ["AB", ["XY"], ["YP"]], ‘Y’ Output: 4
+ Input: ["", ["", ["XXXXX"]]], ‘X’ Output: 3
+ Input: ["X"], ‘X’ Output: 1
+ Input: [""], ‘X’ Output: 0
+ Input: ["X", ["", ["", ["Y"], ["X"]]], ["X", ["", ["Y"], ["Z"]]]], ‘X’ Output: 7
+ Input: ["X", [""], ["X"], ["X"], ["Y", [""]], ["X"]], ‘X’ Output: 7

#### CHALLANGE
>However, the second parameter may have two characters or more so the function must sum up all sum of node level of every character in it. Another thing is the level number for each of the second parameter will multiply by number position of the character itself.

Example test case:
+ Input: ["ABAH", ["CIRCA"], ["CRUMP", ["IRA"]], ["ALI"]], "ACI" 

> Calculate (for illustration):
= sum_a*position_a + sum_c*position_c + sum_i*position_i = (1+2+3+2)*1 + (2+2)*2 + (2+3+2)*3 Output: 37

## `get_schema` Function
>That receives a string containing simple HTML tags like `<div>`, `<b>` , `<i>` , `<u>` with attributes . Any attribute that contains scheme prefix sc- is tag with scheme. The function/method will return an array that contain of scheme name. Assump the HTML tags are always have correct open and close tag and have no branch.

#### EXAMPLE Test Case
+ Input: `"<i sc-root>Hello</i>"` <br>
Output: ["root"]
+ Input: `"<div><div sc-rootbear title="Oh My">Hello <i sc-org>World</i></div></div>"` <br>
Output: ["rootbear", "org"]

#### CHALLANGE
>In this case the tree structure of the input will have multiple scheme in a tag and may have a value. The function must return a json string that structured like a tree. The first element of the result node contains an array that it is a list of scheme parsed from input parameter. The rest element is branches of node.

Example test case:
+ Input: `"<i sc-root="Hello">World</i>"`<br>
Output: [{"root":"Hello"}]

+ Input (1 line):
`"<div sc-prop sc-alias="" sc-type="Organization"><div sc-name="Alice">Hello <i sc-name="Wonderland">World</i></div></div>"`
<br>
Output (aligned for readable purpose):<br>
```json
[
    {
        "prop":"", 
        "alias":"", 
        "type":"Organization"
    },
    [
        {
            "name":"Alice"
        },
        [
            {
                "name":"Wonderland"
            }
        ] 
    ]
]
```
## `pattern_count` Function
>that receives two strings or two array of characters with length between 0 and 100 characters. First parameter is the text and second parameter is the pattern. This function will return a number how many pattern is inside the text. Assume the input parameters are always not null. Your solution must not use any predefined helper function like substr_countin PHP or regex match length in JavaScript.

#### Example Test Case
+ Input: `"palindrom"`, `"ind"` </br>
Output: 1
+ Input: `"abakadabra"`, `"ab"` </br>
Output: 2
+ Input: `"hello"`, `""` </br>
Output: 0
+ Input: `"ababab"`, `"aba"` </br>
Output: 2
+ Input: `"aaaaaa"`, `"aa"` </br>
Output: 5
+ Input: `"hell"`, `"hello"` </br>
Output: 0

# Simple OOP
> Implementation OOP with abstraction, encapsulation, polymorph etc.

```php
// require autoload
require_once 'autoloader.php';

// import namespace
use Classes\MotorBoat;
use Classes\Yacht;
use Classes\SailBoat;

// Initialize MotorBoat
$motorBoat = new MotorBoat("Motor Boat 1", 10, 20, 30, 500, 500, 1000, 12, 100);
// Start The Engine
$motorBoat->engineOn();
// Accelerate
$motorBoat->acceleration();
try {
    // Sailing
    $motorBoat->sailing(1000);
} catch(\Exception $e) {
    echo $motorBoat->getName() . " " . $e->getMessage() . PHP_EOL;
}

echo $motorBoat->getName() . " Has been sail distance: " . $motorBoat->getDistanceSail() . PHP_EOL;

$sailBoatOne = new SailBoat("Sailboat 1", 10, 20, 30, 500, 500, 1000, 12, 100);
$sailBoatOne->engineOn();
$sailBoatOne->acceleration();
try {
    $sailBoatOne->sailing(1000);
} catch(\Exception $e) {
    echo $motorBoat->getName() . " " . $e->getMessage() . PHP_EOL;
}
echo $motorBoat->getName() . " Has been sail distance: " . $sailBoatOne->getDistanceSail() . PHP_EOL;

$yacthOne = new Yacht("Yacht 1", 10, 20, 30, 500, 500, 1000, 12, 100);
$yacthOne->engineOn();
$yacthOne->acceleration();
try {
    $yacthOne->sailing(1000);
} catch(\Exception $e) {
    echo $yacthOne->getName() . " " . $e->getMessage() . PHP_EOL;
}
echo $yacthOne->getName() . " Has been sail distance: " . $yacthOne->getDistanceSail() . PHP_EOL;

$yacthTwo = new Yacht("Yacht 2", 10, 20, 30, 500, 500, 1000, 12, 20);
$yacthTwo->engineOn();
$yacthTwo->acceleration();
try {
    $yacthTwo->sailing(1000);
} catch(\Exception $e) {
    echo $yacthTwo->getName() . " " . $e->getMessage() . PHP_EOL;
}
echo $yacthTwo->getName() . " Has been sail distance: " . $yacthTwo->getDistanceSail() . PHP_EOL;

```
