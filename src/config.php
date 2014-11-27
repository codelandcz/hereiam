<?php

const POSITION_SAVED          = "Position saved.";
const POSITION_REJECTED       = "Position rejected.";
const POSITION_MISSINGNAME    = "Invalid name. Provide one.";
const POSITION_STATUS_SUCCESS = "Success";
const POSITION_STATUS_ERROR   = "Error";

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/model/Position.php';

$parser        = new Symfony\Component\Yaml\Parser();
$configuration = (object)$parser->parse(file_get_contents('../src/config.yml'));

require_once __DIR__ . '/../src/db.php';
