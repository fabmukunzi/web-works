<?php

function dateFormatterNth($date) {
    $dateObject = new DateTime($date);
    return $dateObject->format('jS M Y - h:i A');
}

function formatDate($dateToConvert) {
    $date = new DateTime($dateToConvert);
    $now = new DateTime();

    $diff = $now->getTimestamp() - $date->getTimestamp();

    if ($diff < 60) {
        return $diff . 's ago';
    } elseif ($diff < 3600) {
        return floor($diff / 60) . 'm ago';
    } elseif ($diff < 86400) {
        return floor($diff / 3600) . 'h ago';
    } else {
        return dateFormatterNth($dateToConvert);
    }
}


?>
