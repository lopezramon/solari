<?php

function objectToArray($object, $campo = null) {
    $array = json_decode(json_encode( $object ));
    if ($campo != null) {
        return array_column((array) $array, $campo);
    }
    else {
        return $array;
    }
}

function delete_col(&$array, $offset) {
    return array_walk($array, function (&$v) use ($offset) {
        array_splice($v, $offset, 1);
    });
}

function tags(){
    return App\Http\Controllers\Admin\TagTranslationController::getTagsValues(\App::getLocale());
}