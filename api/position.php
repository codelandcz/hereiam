<?php
require_once __DIR__ . '/../src/config.php';

if (!$_POST) {
    return;
}

$request     = (object)$_POST;
$status      = false;
$saved       = false;
$nameMissing = false;
$positions   = [];

if ($request->action == 'PUT') {
    if (strlen($request->name) > 0) {
        $status = $saved = savePosition((double)$request->lat, (double)$request->lng, $request->name);
    }
    else {
        $nameMissing = true;
    }
}
else if ($request->action == 'LIST') {
    $positions = getPositions();
    if ($positions > 0) {
        $status = true;
    }
}

$response = [
    'status'      => $status ? POSITION_STATUS_SUCCESS : POSITION_STATUS_ERROR,
    'message'     => $saved ? POSITION_SAVED : ($nameMissing ? POSITION_MISSINGNAME : POSITION_REJECTED),
    'data'        => $positions,
    'showMessage' => $nameMissing ? true : false,
];

echo json_encode($response);