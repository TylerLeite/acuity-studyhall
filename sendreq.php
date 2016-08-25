

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
a b c d e
f   g   h
i j k l m
  n   o

*/

function exec_curl($curl, $id, $func, $arg) {
    $server = "http://fwf01-pc:8080/api.ashx?";
    curl_setopt($curl, CURLOPT_URL, $server . $id . "/" . $func . "/" . $arg);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, array());
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $out = curl_exec($curl);
    return $out;
}

function exec_all($curl, $ids, $func, $arg='') {
    $out = '';
    foreach ($ids as $label => $id) {
        $out .= exec_curl($curl, $id, $func, $arg);
    }

    return $out;
}

function set_on($curl, $id) {
    exec_curl($curl, $id, 'on');
}

function set_all_on($curl, $ids) {
    exec_all($curl, $ids, 'on');
}

function set_off($curl, $id) {
    exec_curl($curl, $id, 'off');
}

function set_all_off($curl, $ids) {
    exec_all($curl, $ids, 'off');
}

function set_to($curl, $id, $amt) {
    set_on($curl, $id);
    exec_curl($curl, $id, 'dim', $amt);
}

function set_all_to($curl, $ids, $amt) {
    set_all_on($curl, $ids);
    exec_all($curl, $ids, 'dim', $amt);
}

function do_req() {
    
    $_ids = array(
        'a' => '007F4E47',
        'b' => '00297594',
        'c' => '007F4E52',
        'd' => '00356415',
        'e' => '007F4D60',
        'f' => '007F4E3E',
        'g' => '007F4320',
        'h' => '007F4E44',
        'i' => '0085D4D4',
        'j' => '002384DF',
        'k' => '008984BC',
        'l' => '001545A7',
        'm' => '007F4D5B',
        'n' => '00005752',
        'o' => '00005754',
    );

    $id = 'a';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $func = $_GET['func'];

    $arg = '';
    if (isset($_GET['arg'])) {
        $arg = $_GET['arg'];
    }

    $all = '';
    if (isset($_GET['all'])) {
        $all = $_GET['all'];
    }

    
    $ch = curl_init();
    if ($all === 'yes'){
        if ($func === 'off') {
            set_all_off($ch, $_ids);
        } else if ($func === 'on') {
            set_all_on($ch, $_ids);
        } else if ($func === 'dim') {
            set_all_to($ch, $_ids, $arg);
        }

    } else {
        exec_curl($ch, $_ids[$id], $func, $arg);
    }


    curl_close ($ch);
}

do_req();
header("Location:controller.php");

?>

