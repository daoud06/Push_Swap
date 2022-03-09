<?php
//
function print_tab(&$tab) {
    foreach($tab as $value) {
        echo $value."";
    }
    echo "\n";
}
//

//
function status (&$list_a, &$list_b){
    echo" Liste A : \n";
    print_tab($list_a);
}
//
function init (&$list_a, &$list_b, $argv) {
    $list_a =[];
    $list_b =[];
    $list_a = $argv;
    array_shift($list_a); 
}
function swap(&$list, $string, &$result) {
    $tmp = $list[0];
    $list[0] = $list[1];
    $list[1] = $tmp;
    $result .=$string;
}
function swap_both(&$list_a, &$list_b, &$string)
{
    swap($list_a, "");
    swap($list_b, "");
    echo $string;
}
function push(&$list_origin, &$list_dest, $string, &$result) 
{
    $tmp = array_shift($list_origin);
    array_unshift($list_dest, $tmp);
    $result .=$string;

}

function rotate(&$list_a, $string) {
    $tmp = array_shift($list_a);
    array_push($list_a, $tmp);
    echo $string;
}
function is_resolved(&$list_a, &$list_b){
    if (count($list_b) != 0)
    return (false);
     $i = 0;
    while ($i < count($list_a) - 1)
    {
        if ($list_a[$i] > $list_a[$i + 1])
        return (false);
        $i++;
    }
    return true;
}
//copier inverse list push

function algo(&$list_a, &$list_b, &$result) {
   while(is_resolved($list_a,$list_b) != true){
        while(count($list_a) > 1 ){
            if($list_a[0] >= $list_a[1])
                swap($list_a,'sa ',$result);
            push($list_a,$list_b, 'pb ',$result);
        }
        push($list_a,$list_b, 'pb ',$result);

        while(count($list_b) > 1 ){
            if($list_b[0] <= $list_b[1])
                swap($list_b,'sb ', $result);
            push($list_b,$list_a, 'pa ',$result);
        }
        push($list_b,$list_a, 'pa ',$result);
    }
}


$list_a;
$list_b;
$result="";
init($list_a, $list_b, $argv);
algo($list_a, $list_b, $result);
$result = substr($result, 0, -1);
$result .= "\n"; 
echo $result;