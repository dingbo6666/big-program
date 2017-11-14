<?php
function mysqlInit($host, $username, $password, $dbName)
{
    $con = mysql_connect($host, $username, $password);
    if(!$con)
    {
        return false;
    }

    mysql_select_db($dbName);
    mysql_set_charset('utf8');

    return $con;

}
function createPassword($password)
{
    if(!$password)
    {
        return false;
    }

    return md5(md5($password) . 'IMALL');
}
function msg($type, $msg = null, $url = null)
{
    $toUrl = "Location:msg.php?type={$type}";
    //当msg为空时 url不写入
    $toUrl .= $msg ? "&msg={$msg}" : '';
    //当url为空 toUrl不写入
    $toUrl .= $url ? "&url={$url}" : '';
    header($toUrl);
    exit;
}
