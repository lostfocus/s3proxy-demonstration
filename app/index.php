<?php
require_once 'vendor/autoload.php';
echo "Test<br>\n";

$s3Client = new \Aws\S3\S3Client([
    'endpoint' => 'http://s3',
    'use_path_style_endpoint' => true,
    'version' => 'latest',
    'region' => 'local',
    'credentials' => [
        'key' => '',
        'secret' => '',
    ],
]);

echo "Load file from S3 into the PHP script and var_dump the content:<br>\n";

$objectUrl = $s3Client->getObjectUrl('test', 'test.txt');
$fileContent = file_get_contents($objectUrl);

var_dump($fileContent);
echo "<br>\n";
echo "Get presigned S3 URL<br>\n";

$cmd = $s3Client->getCommand('GetObject', [
    'Bucket' => 'test',
    'Key' => 'test.txt'
]);

$request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

$uri = (string)$request->getUri()."<br>\n";

printf("<a href='%s'>%s</a>", $uri, $uri);