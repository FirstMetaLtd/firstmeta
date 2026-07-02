<?php
// Local dev router for `php -S localhost:PORT router.php`.
// Mirrors the clean-URL rewrites in .htaccess (Apache) / vercel.json (Vercel),
// which the PHP built-in server doesn't read on its own.

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Block sensitive files/dirs from direct access, matching .htaccess
if (preg_match('/\.(env|log|sql|md|gitignore|lock|sh)$/i', $uri) || preg_match('#^/(private|admin/private)(/|$)#', $uri)) {
    http_response_code(404);
    exit('Not found');
}

// Serve existing static files as-is (css/js/images/etc.)
$path = __DIR__ . $uri;
if ($uri !== '/' && is_file($path)) {
    return false;
}

$routes = [
    '#^/home/?$#i'                    => 'index.php',
    '#^/login/?$#i'                   => 'login.php',
    '#^/register/([^/]+)/?$#i'        => 'ref-register.php?userid=$1',
    '#^/register/?$#i'                => 'register.php',
    '#^/verify-email/?$#i'            => 'verify-email.php',
    '#^/team/?$#i'                    => 'team.php',
    '#^/logout/?$#i'                  => 'logout.php',
    '#^/products/?$#i'                => 'products.php',
    '#^/career/?$#i'                  => 'career.php',
    '#^/privacy-policy/?$#i'          => 'privacy-policy.php',
    '#^/product/([^/]+)/?$#i'         => 'product.php?slug=$1',
    '#^/about/?$#i'                   => 'about.php',
    '#^/contact/?$#i'                 => 'contact.php',
    '#^/services/?$#i'                => 'services.php',
    '#^/blogs/?$#i'                   => 'blogs.php',
    '#^/blog/([^/]+)/?$#i'            => 'blog.php?slug=$1',
    '#^/service/([^/]+)/?$#i'         => 'service.php?slug=$1',
    '#^/apply/([^/]+)/?$#i'           => 'apply.php?job=$1',
    '#^/forget-password/?$#i'         => 'forget-password.php',
    '#^/change-password/?$#i'         => 'change-password.php',
];

// Mirrors admin/.htaccess — clean routes scoped under /admin/
$adminRoutes = [
    '#^/home/?$#i'          => 'index.php',
    '#^/delete/?$#i'        => 'delete.php',
    '#^/status/?$#i'        => 'status.php',
    '#^/add-post/?$#i'      => 'add-post.php',
    '#^/edit-post/?$#i'     => 'edit-post.php',
    '#^/edit-admin/?$#i'    => 'edit-admin.php',
    '#^/edit-team/?$#i'     => 'edit-team.php',
    '#^/edit-service/?$#i'  => 'edit-service.php',
    '#^/edit-product/?$#i'  => 'edit-product.php',
    '#^/add-job/?$#i'       => 'add-job.php',
    '#^/edit-job/?$#i'      => 'edit-job.php',
    '#^/posts/?$#i'         => 'posts.php',
    '#^/post/?$#i'          => 'post.php',
    '#^/logos/?$#i'         => 'logos.php',
    '#^/applications/?$#i'  => 'applications.php',
    '#^/products/?$#i'      => 'products.php',
    '#^/services/?$#i'      => 'services.php',
    '#^/category-posts/?$#i'=> 'category-posts.php',
    '#^/edit-category/?$#i' => 'edit-category.php',
    '#^/settings/?$#i'      => 'settings.php',
    '#^/team/?$#i'          => 'team.php',
    '#^/add-admin/?$#i'     => 'add-admin.php',
    '#^/enquiries/?$#i'     => 'enquiries.php',
    '#^/login/?$#i'         => 'login.php',
    '#^/logout/?$#i'        => 'logout.php',
];

function dispatch(string $baseDir, string $file, string $query, array $m): bool {
    if ($query && isset($m[1])) {
        $query = str_replace('$1', $m[1], $query);
        parse_str($query, $qs);
        $_GET = array_merge($_GET, $qs);
    }
    $target_path = $baseDir . '/' . $file;
    if (is_file($target_path)) {
        chdir($baseDir);
        require $target_path;
        return true;
    }
    return false;
}

if (preg_match('#^/admin(/.*)?$#i', $uri, $adminMatch)) {
    $subUri = $adminMatch[1] ?? '/';
    if ($subUri === '' || $subUri === '/') {
        require __DIR__ . '/admin/login.php';
        exit;
    }
    foreach ($adminRoutes as $pattern => $target) {
        if (preg_match($pattern, $subUri, $m)) {
            [$file, $query] = array_pad(explode('?', $target, 2), 2, '');
            if (dispatch(__DIR__ . '/admin', $file, $query, $m)) exit;
        }
    }
    http_response_code(404);
    exit('404 Not Found');
}

foreach ($routes as $pattern => $target) {
    if (preg_match($pattern, $uri, $m)) {
        [$file, $query] = array_pad(explode('?', $target, 2), 2, '');
        if (dispatch(__DIR__, $file, $query, $m)) return true;
    }
}

if ($uri === '/') {
    require __DIR__ . '/index.php';
    return true;
}

http_response_code(404);
echo "404 Not Found";
