<?php

/* SdzBlogBundle:Blog:liste.html.twig */
class __TwigTemplate_aa3eb4cb0b3fe6410d32f4728b67eedef2bb5ed38e0bd827ef139bba593fe747 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SdzBlogBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sdzblog_body' => array($this, 'block_sdzblog_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SdzBlogBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "    Liste d'articles - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_sdzblog_body($context, array $blocks = array())
    {
        // line 10
        echo "
  <div class=\"well\">
    ";
        // line 12
        if ((twig_length_filter($this->env, (isset($context["listeArticles"]) ? $context["listeArticles"] : $this->getContext($context, "listeArticles"))) > 0)) {
            // line 13
            echo "    <div>
      Titres d'articles avec catégories :
      <ul>
        ";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listeArticles"]) ? $context["listeArticles"] : $this->getContext($context, "listeArticles")));
            foreach ($context['_seq'] as $context["_key"] => $context["art"]) {
                // line 17
                echo "          <li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : $this->getContext($context, "art")), "id"), "html", null, true);
                echo " : ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["art"]) ? $context["art"] : $this->getContext($context, "art")), "categories"), "count"), "html", null, true);
                echo "</li>
\t   ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['art'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "      </ul>
    </div>
  ";
        }
        // line 22
        echo "  </div>


  <p>
    <a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("sdzblog_accueil");
        echo "\" class=\"btn\">
      <i class=\"icon-chevron-left\"></i>
      Retour à la liste
    </a>
  </p>

";
    }

    public function getTemplateName()
    {
        return "SdzBlogBundle:Blog:liste.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 31,  77 => 27,  53 => 16,  126 => 51,  100 => 28,  58 => 29,  23 => 2,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 52,  107 => 33,  61 => 30,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 39,  102 => 32,  71 => 17,  67 => 32,  63 => 20,  59 => 18,  38 => 13,  94 => 55,  89 => 20,  85 => 19,  75 => 17,  68 => 19,  56 => 9,  87 => 25,  21 => 2,  26 => 6,  93 => 28,  88 => 6,  78 => 38,  46 => 12,  27 => 4,  44 => 12,  31 => 9,  28 => 8,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 34,  117 => 44,  105 => 29,  91 => 27,  62 => 23,  49 => 19,  24 => 5,  25 => 5,  19 => 2,  79 => 26,  72 => 35,  69 => 25,  47 => 9,  40 => 9,  37 => 10,  22 => 4,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 53,  123 => 33,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 14,  66 => 15,  55 => 19,  52 => 17,  50 => 10,  43 => 18,  41 => 7,  35 => 5,  32 => 6,  29 => 5,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 38,  112 => 30,  109 => 11,  106 => 10,  103 => 32,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 22,  80 => 40,  73 => 22,  64 => 17,  60 => 17,  57 => 17,  54 => 27,  51 => 14,  48 => 13,  45 => 14,  42 => 10,  39 => 9,  36 => 10,  33 => 6,  30 => 7,);
    }
}
