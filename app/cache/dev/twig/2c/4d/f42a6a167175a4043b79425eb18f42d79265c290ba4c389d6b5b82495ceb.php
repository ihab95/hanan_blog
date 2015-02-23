<?php

/* SdzBlogBundle:Blog:formulaire.html.twig */
class __TwigTemplate_2c4df42a6a167175a4043b79425eb18f42d79265c290ba4c389d6b5b82495ceb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 4
        echo "<div class=\"well\">
  <form method=\"post\" ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">

    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "

    <input type=\"submit\" class=\"btn btn-primary\" />
  </form>
</div>

";
        // line 15
        echo "<script src=\"http://code.jquery.com/jquery-1.8.2.min.js\"></script>

";
        // line 18
        echo "<script type=\"text/javascript\">
\$(document).ready(function() {
  // On récupère la balise <div> en question qui contient l'attribut \" data-prototype \" qui nous intéresse.
  var \$container = \$('div#sdz_blog_bundle_articletype_categories');

  // On ajoute un lien pour ajouter une nouvelle catégorie
  var \$lienAjout = \$('<a href=\"#\" id=\"ajout_categorie\" class=\"btn\">Ajouter une catégorie</a>');
  \$container.append(\$lienAjout);

  // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
  \$lienAjout.click(function(e) {
    ajouterCategorie(\$container);
    e.preventDefault(); // évite qu'un # apparaisse dans l'URL
    return false;
  });

  // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
  var index = \$container.find(':input').length;

  // On ajoute un premier champ directement s'il n'en existe pas déjà un (cas d'un nouvel article par exemple).
  if (index == 0) {
    ajouterCategorie(\$container);
  } else {
    // Pour chaque catégorie déjà existante, on ajoute un lien de suppression
    \$container.children('div').each(function() {
      ajouterLienSuppression(\$(this));
    });
  }

  // La fonction qui ajoute un formulaire Categorie
  function ajouterCategorie(\$container) {
    // Dans le contenu de l'attribut \" data-prototype \", on remplace :
    // - le texte \"__name__label__\" qu'il contient par le label du champ
    // - le texte \"__name__\" qu'il contient par le numéro du champ
    var \$prototype = \$(\$container.attr('data-prototype').replace(/__name__label__/g, 'Catégorie n°' + (index+1))
                                                        .replace(/__name__/g, index));

    // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
    ajouterLienSuppression(\$prototype);

    // On ajoute le prototype modifié à la fin de la balise <div>
    \$container.append(\$prototype);

    // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
    index++;
  }

  // La fonction qui ajoute un lien de suppression d'une catégorie
  function ajouterLienSuppression(\$prototype) {
    // Création du lien
    \$lienSuppression = \$('<a href=\"#\" class=\"btn btn-danger\">Supprimer</a>');

    // Ajout du lien
    \$prototype.append(\$lienSuppression);

    // Ajout du listener sur le clic du lien
    \$lienSuppression.click(function(e) {
      \$prototype.remove();
      e.preventDefault(); // évite qu'un # apparaisse dans l'URL
      return false;
    });
  }
});
</script>";
    }

    public function getTemplateName()
    {
        return "SdzBlogBundle:Blog:formulaire.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 18,  39 => 15,  30 => 7,  25 => 5,  22 => 4,  19 => 2,);
    }
}
