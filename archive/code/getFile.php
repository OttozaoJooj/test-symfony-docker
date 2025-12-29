<?php

header('Content-type: image/png');
header('Content-Disposition: attachment; filename="data.png"');
header('Pragma: no-cache'); // Optional: Helps with caching issues
header('Expires: 0');

$output = fopen('php://output', 'w');

$file = fopen('../data/vehicles/1212/thedn.png', 'rb');

$content = fread($file, filesize('../data/vehicles/1212/thedn.png'));




fwrite($output, $content);
