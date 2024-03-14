<?php
require_once("controllers/Controller.php");

class Router extends Controller {
    // Attributs privés pour stocker l'action par défaut et les routes
    private string $default_action;
    private array $routes;

    // Constructeur pour initialiser l'action par défaut et les routes
    public function __construct(string $default_action, array $routes) {
        $this->routes = $routes;
        $this->default_action = $default_action;
    }

    // Méthode pour router la requête entrante
    public function routeRequest(): void {
        try {
            // Récupération de l'action à partir de la superglobale $_GET
            if (!key_exists("action", $_GET)) {
                $action = $this->default_action;
            } else {
                $action = $_GET['action'];
            }
            // Vérification si l'action existe dans les routes définies
            if (key_exists($action, $this->routes)) {
                // Appel de la fonction associée à l'action
                call_user_func($this->routes[$action]);
            } else {
                // Redirection vers une erreur 404 si l'action n'est pas trouvée
                $this->error(404, "/index.php?action=" . $action);
            }
        } catch (Exception $e) {
            // Redirection vers une erreur 500 en cas d'exception
            $this->error(500, $e->getMessage());
        }
    }
}

?>
