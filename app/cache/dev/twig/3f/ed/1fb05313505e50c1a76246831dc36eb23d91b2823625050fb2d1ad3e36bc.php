<?php

/* ::layout.html.twig */
class __TwigTemplate_3fed1fb05313505e50c1a76246831dc36eb23d91b2823625050fb2d1ad3e36bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "  </head>

  <body>
    <div class=\"container\">
      <div id=\"header\" class=\"hero-unit\">
        <h1>Le blog de Hanan Laghbouri</h1>
        <p>Ce projet est propulsé par Symfony2.</p>

      </div>

      <div class=\"row\">
        <div id=\"menu\" class=\"span3\">
          <h3>Le blog</h3>
          <ul class=\"nav nav-pills nav-stacked\">
            <li><a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("sdzblog_accueil");
        echo "\">Accueil du blog</a></li>
            <li>";
        // line 29
        echo "\t\t\t\t";
        if ($this->env->getExtension('security')->isGranted("ROLE_AUTEUR")) {
            // line 30
            echo "\t\t\t\t\t<a href=\"";
            echo $this->env->getExtension('routing')->getPath("sdzblog_ajouter");
            echo "\">Ajouter un article</a>
\t\t\t\t";
        }
        // line 32
        echo "\t\t\t</li>
          </ul>
                    
          ";
        // line 35
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("SdzBlogBundle:Blog:menu", array("nombre" => 3)));
        echo "
        </div>
        <div id=\"content\" class=\"span9\">
          ";
        // line 38
        $this->displayBlock('body', $context, $blocks);
        // line 40
        echo "        </div>
      </div>

      <hr>

      <footer>
        <p>Développé par I.A.</p>
      </footer>
    </div>

  ";
        // line 50
        $this->displayBlock('javascripts', $context, $blocks);
        // line 55
        echo "
  </body>
</html>";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Sdz";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "      <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    ";
    }

    // line 38
    public function block_body($context, array $blocks = array())
    {
        // line 39
        echo "          ";
    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
        // line 51
        echo "    ";
        // line 52
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 53,  128 => 52,  126 => 51,  123 => 50,  119 => 39,  116 => 38,  109 => 11,  106 => 10,  100 => 8,  94 => 55,  92 => 50,  80 => 40,  78 => 38,  72 => 35,  67 => 32,  61 => 30,  58 => 29,  54 => 27,  38 => 13,  36 => 10,  31 => 8,  23 => 2,);
    }
}
