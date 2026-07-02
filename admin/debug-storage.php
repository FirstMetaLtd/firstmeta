<?php
// Temporary diagnostic endpoint — checks Supabase Storage upload config.
// Not linked from anywhere; delete after diagnosis.
require 'private/autoload.php';

header('Content-Type: text/plain');

$supabaseUrl = getenv('SUPABASE_URL') ?: ($_ENV['SUPABASE_URL'] ?? '');
$serviceKey = getenv('SUPABASE_SERVICE_KEY') ?: ($_ENV['SUPABASE_SERVICE_KEY'] ?? '');

echo "SUPABASE_URL set: " . ($supabaseUrl ? "yes ({$supabaseUrl})" : "NO") . "\n";
echo "SUPABASE_SERVICE_KEY set: " . ($serviceKey ? "yes (length=" . strlen($serviceKey) . ")" : "NO") . "\n";

if ($supabaseUrl && $serviceKey) {
    $tmpFile = tempnam(sys_get_temp_dir(), 'diag');
    file_put_contents($tmpFile, 'diagnostic test upload');
    $result = upload_to_supabase_storage($tmpFile, 'diagnostic/test.txt', 'text/plain');
    echo "Test upload result: " . var_export($result, true) . "\n";
    unlink($tmpFile);
}
?>
