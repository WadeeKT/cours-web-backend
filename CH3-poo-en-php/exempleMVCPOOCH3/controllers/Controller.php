<?php

require_once("views/View.php");

abstract class Controller {
    
    // Méthode pour afficher une vue avec des variables associées
    protected function render(string $view_name, array $variables = [], int $status = 200): void {
        // Définition du code de statut HTTP de la réponse
        http_response_code($status);
        
        // Création d'une nouvelle instance de la vue avec le nom de la vue spécifié
        $view = new View($view_name);
        
        // Génération du contenu HTML de la vue en utilisant les variables spécifiées
        $html = $view->generate($variables);
        
        // Envoi du contenu HTML généré au navigateur
        echo $html;
    }

    // Méthode pour afficher une erreur avec un code d'erreur et un message associé
    protected function error(int $code, string $msg): void {
        // Affichage de la vue d'erreur avec le code d'erreur et le message associé
        $this->render((string) $code, ['msg' => $msg]);
        
        // Arrêt de l'exécution du script
        die();
    }
}
?>
