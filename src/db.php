<?php

function savePosition($lat, $lng, $name)
{
    $saved = false;
    $link  = open_database_connection();
    $name  = mysql_real_escape_string($name, $link);
    if (!$name || !$lat || !$lng) {
        return false;
    }
    $query = "INSERT INTO `position` (lat, lng, name) VALUES ('$lat','$lng','$name') ON DUPLICATE KEY UPDATE lat=VALUES(lat), lng=VALUES(lng), time=NULL";

    $result = mysql_query($query, $link);
    if ($result) {
        $saved = true;
    }
    close_database_connection($link);

    return $saved;
}

function getPositions()
{
    $positions = array();
    $link      = open_database_connection();
    $query     = "SELECT lat,lng,name FROM `position` WHERE time > ((NOW() - INTERVAL 1 MONTH) - INTERVAL 1 DAY)";
    $result    = mysql_query($query, $link);
    while ($row = mysql_fetch_assoc($result)) {
        $position       = new Position();
        $position->lat  = $row['lat'];
        $position->lng  = $row['lng'];
        $position->name = $row['name'];
        $positions[]    = $position;
    }
    close_database_connection($link);

    return $positions;
}

function open_database_connection()
{
    global $configuration;

    $link = mysql_connect($configuration->server, $configuration->user, $configuration->password);
    mysql_select_db($configuration->database, $link);

    return $link;
}

function close_database_connection($link)
{
    mysql_close($link);
}