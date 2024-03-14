<?php
class View {
    // Chemin vers les vues
    const VIEW_PATH = "views/";
    // Vue du layout par défaut
    const LAYOUT_VIEW = "views/layout.php";
    // Titre par défaut
    const DEFAULT_TITLE = "Mon site";

    // Chemin de la vue à rendre
    private string $file_to_render;
    // Titre de la vue
    private string $title;

    // Constructeur prenant en paramètre le nom de la vue
    public function __construct(string $view) {
        $this->file_to_render = self::VIEW_PATH . $view . ".php";
        $this->title = self::DEFAULT_TITLE;
    }

    // Méthode privée pour générer la vue à partir du fichier et des variables données
    private function generateView(string $view, array $variables=[]): string {
        if (file_exists($view)) {
            // Permet de rendre les valeurs du dictionnaire $variables accessibles
            // dans la vue en tant que variables locales.
            if ($variables!=[]){
                extract($variables);
            }
            // Début de la mise en mémoire tampon de la sortie
            ob_start();
            // Génération de la vue
            require $view;
            // Arrêt de la mise en tampon et renvoi du tampon de sortie
            return ob_get_clean();
        } else { // La vue n'existe pas.
            // Lever une exception qui sera capturée par le routeur, qui renverra alors
            // une erreur HTTP 500 au navigateur
            throw new Exception("La vue '$view' n'existe pas");
        }
    }

    // Méthode publique pour générer la vue complète avec le layout
    public function generate(array $variables = []): string {
        // Génération de la vue
        $content = $this->generateView($this->file_to_render, $variables);
        // Génération du layout (vue partagée)
        $html = $this->generateView(self::LAYOUT_VIEW, [
            'title' => $this->title,
            'content' => $content
        ]);

        return $html;
    }
}

?>
