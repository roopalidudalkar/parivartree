<?php

/* TreeTreeBundle:User:addconnection.html.twig */
class __TwigTemplate_2ffa75f83221110ba12293bd1d275be7578938fd25ab6cebda82725159014559 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
<div class=\"container\">


<div class=\"col-md-5\">
\t";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_start');
        echo "
\t\t<div class=\"form-group\">";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'label');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'widget');
        echo "</div>
\t\t<div class=\"form-group\">";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "firstname"), 'label');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "firstname"), 'widget');
        echo "</div>
\t\t<div class=\"form-group\">";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "lastname"), 'label');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "lastname"), 'widget');
        echo "</div>
\t\t<div class=\"form-group pull-right\">";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "submit"), 'widget');
        echo "</div>
\t";
        // line 14
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_end');
        echo "
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "TreeTreeBundle:User:addconnection.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 26,  449 => 159,  431 => 146,  418 => 143,  414 => 142,  394 => 128,  386 => 123,  372 => 115,  364 => 113,  359 => 111,  351 => 109,  346 => 108,  343 => 107,  334 => 88,  328 => 82,  323 => 80,  315 => 75,  304 => 67,  297 => 63,  290 => 59,  286 => 58,  282 => 57,  279 => 56,  276 => 55,  250 => 197,  207 => 107,  190 => 92,  188 => 88,  174 => 52,  152 => 43,  137 => 38,  118 => 32,  114 => 31,  97 => 20,  90 => 18,  81 => 14,  76 => 12,  180 => 55,  172 => 101,  77 => 19,  53 => 216,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 157,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 144,  413 => 134,  409 => 132,  407 => 131,  402 => 133,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 114,  365 => 111,  362 => 110,  360 => 109,  355 => 110,  341 => 105,  337 => 89,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 39,  132 => 51,  128 => 49,  107 => 36,  61 => 24,  273 => 96,  269 => 94,  254 => 198,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 45,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 11,  67 => 15,  63 => 15,  59 => 14,  93 => 19,  88 => 6,  78 => 21,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 10,  56 => 12,  27 => 4,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 33,  117 => 44,  105 => 40,  91 => 27,  62 => 13,  49 => 19,  87 => 17,  46 => 7,  44 => 10,  25 => 3,  21 => 2,  31 => 4,  38 => 7,  26 => 1,  28 => 3,  24 => 3,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 25,  40 => 9,  37 => 10,  22 => 1,  246 => 196,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 18,  66 => 14,  55 => 15,  52 => 21,  50 => 11,  43 => 8,  41 => 8,  35 => 8,  32 => 4,  29 => 3,  209 => 161,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 84,  176 => 64,  173 => 65,  168 => 48,  164 => 59,  162 => 57,  154 => 58,  149 => 42,  147 => 58,  144 => 49,  141 => 48,  133 => 37,  130 => 36,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 28,  106 => 27,  103 => 35,  99 => 31,  95 => 28,  92 => 21,  86 => 22,  82 => 22,  80 => 41,  73 => 19,  64 => 17,  60 => 14,  57 => 23,  54 => 10,  51 => 22,  48 => 13,  45 => 17,  42 => 16,  39 => 9,  36 => 5,  33 => 4,  30 => 7,);
    }
}
