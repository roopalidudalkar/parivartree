<?php

/* TwigBundle:Exception:error.rdf.twig */
class __TwigTemplate_a4f049c1d4b40213208ab5c183487eaf4ce9376ba481a231746c0d06f4a8d29c extends Twig_Template
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
        // line 1
        $this->env->loadTemplate("TwigBundle:Exception:error.xml.twig")->display(array_merge($context, array("exception" => $this->getContext($context, "exception"))));
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.rdf.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 20,  46 => 7,  44 => 7,  25 => 3,  21 => 2,  31 => 4,  38 => 13,  26 => 3,  28 => 3,  24 => 4,  19 => 1,  79 => 21,  72 => 16,  69 => 12,  47 => 18,  40 => 11,  37 => 10,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 45,  131 => 42,  123 => 41,  120 => 40,  115 => 39,  111 => 38,  108 => 37,  101 => 33,  98 => 32,  96 => 31,  83 => 25,  74 => 14,  66 => 15,  55 => 13,  52 => 21,  50 => 14,  43 => 6,  41 => 9,  35 => 5,  32 => 4,  29 => 4,  209 => 82,  203 => 78,  199 => 76,  193 => 73,  189 => 71,  187 => 70,  182 => 68,  176 => 64,  173 => 63,  168 => 62,  164 => 58,  162 => 57,  154 => 54,  149 => 51,  147 => 50,  144 => 49,  141 => 48,  133 => 42,  130 => 41,  125 => 38,  122 => 37,  116 => 36,  112 => 35,  109 => 34,  106 => 36,  103 => 32,  99 => 30,  95 => 28,  92 => 29,  86 => 24,  82 => 22,  80 => 19,  73 => 19,  64 => 19,  60 => 6,  57 => 14,  54 => 22,  51 => 9,  48 => 9,  45 => 17,  42 => 6,  39 => 8,  36 => 7,  33 => 6,  30 => 3,);
    }
}