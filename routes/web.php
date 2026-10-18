<?php
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/DashboardController.php';
require_once __DIR__ . '/../controllers/FacilityController.php';
require_once __DIR__ . '/../controllers/BloodStockController.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/RequestController.php';
require_once __DIR__ . '/../controllers/DistributionController.php';
require_once __DIR__ . '/../controllers/MasterController.php';
require_once __DIR__ . '/../controllers/ReportController.php';
require_once __DIR__ . '/../controllers/PublicController.php';

$router = [
    '/' => ['controller' => 'PublicController', 'method' => 'index'],
    '/login' => ['controller' => 'AuthController', 'method' => 'login'],
    '/logout' => ['controller' => 'AuthController', 'method' => 'logout'],
    '/dashboard' => ['controller' => 'DashboardController', 'method' => 'index'],
    '/users' => ['controller' => 'UserController', 'method' => 'index'],
    '/users/tambah' => ['controller' => 'UserController', 'method' => 'create'],
    '/fasilitas' => ['controller' => 'FacilityController', 'method' => 'index'],
    '/fasilitas/tambah' => ['controller' => 'FacilityController', 'method' => 'create'],
    '/fasilitas/edit/{id}' => ['controller' => 'FacilityController', 'method' => 'edit'],
    '/fasilitas/delete/{id}' => ['controller' => 'FacilityController', 'method' => 'delete'],
    '/stok' => ['controller' => 'BloodStockController', 'method' => 'index'],
    '/stok/tambah' => ['controller' => 'BloodStockController', 'method' => 'create'],
    '/permintaan' => ['controller' => 'RequestController', 'method' => 'index'],
    '/permintaan/tambah' => ['controller' => 'RequestController', 'method' => 'create'],
    '/distribusi' => ['controller' => 'DistributionController', 'method' => 'index'],
    '/master/provinsi' => ['controller' => 'MasterController', 'method' => 'provinces'],
    '/master/kabupaten' => ['controller' => 'MasterController', 'method' => 'districts'],
    '/master/golongan-darah' => ['controller' => 'MasterController', 'method' => 'bloodGroups'],
    '/master/komponen' => ['controller' => 'MasterController', 'method' => 'components'],
    '/laporan' => ['controller' => 'ReportController', 'method' => 'index'],
];

function dispatch(string $path): void
{
    global $router;
    $matchedRoute = null;
    $params = [];

    foreach ($router as $routePath => $routeConfig) {
        $candidatePath = $path === '' ? '/' : $path;
        if ($routePath === $candidatePath) {
            $matchedRoute = $routeConfig;
            break;
        }

        if (str_contains($routePath, '{')) {
            $pattern = preg_quote($routePath, '/');
            $pattern = str_replace('\{id\}', '([^/]+)', $pattern);
            $pattern = '#^' . $pattern . '$#';
            if (preg_match($pattern, $candidatePath, $matches)) {
                $matchedRoute = $routeConfig;
                $params = array_slice($matches, 1);
                break;
            }
        }
    }

    if ($matchedRoute === null) {
        view('404');
        return;
    }

    if ($matchedRoute['controller'] === null) {
        view($matchedRoute['view']);
        return;
    }

    $controllerName = $matchedRoute['controller'];
    $controller = new $controllerName();
    $method = $matchedRoute['method'];

    if ($params !== []) {
        $controller->$method(...$params);
        return;
    }

    $controller->$method();
}
