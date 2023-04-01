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
> Use question number 1. However, the second parameter may have two characters or more so the function must sum up all sum of node level of every character in it. Another thing is the level number for each of the second parameter will multiply by number position of the character itself.

Example test case:
+ Input: ["ABAH", ["CIRCA"], ["CRUMP", ["IRA"]], ["ALI"]], "ACI" 

> Calculate (for illustration):
= sum_a*position_a + sum_c*position_c + sum_i*position_i = (1+2+3+2)*1 + (2+2)*2 + (2+3+2)*3 Output: 37
