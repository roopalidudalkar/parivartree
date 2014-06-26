<?php

/* TreeTreeBundle:User:member_register.html.twig */
class __TwigTemplate_9b4af87f89cbfcbf86bfbf85118becccb9a7b5d0f19f1e87e77250f51bbdfb63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'register' => array($this, 'block_register'),
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

    // line 4
    public function block_register($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"container\">
\t";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 7
            echo "
\t<div class=\"alert alert-danger\">";
            // line 8
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "</div>
\t\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "
\t";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 13
            echo "
\t<div class=\"alert alert-success\">";
            // line 14
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "</div>
\t\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "message"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 18
            echo "
\t<div class=\"alert alert-success\">";
            // line 19
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "</div>
\t\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "\t\t";
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_start');
        echo "
<div class=\"row form-group\">
                                <div class=\"col-md-6\">
                                    <input type=\"text\" class=\"form-control\" placeholder=\"First Name\">
                                   
                                </div>
                                <div class=\"col-md-6\">
                                 <input type=\"text\" class=\"form-control\" placeholder=\"Last Name\">

                                </div>
                                </div>
                                <div class=\"row form-group\">
                                    <div class=\"form-group\">
                                   ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'widget');
        echo "
                                    </div>
                                    <div class=\"form-group\">
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Re-enter Email\">
                                    </div>
                                   <div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" placeholder=\"Password\">
                                   </div>
                                    
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-md-3\">
                                    <select class=\"form-control\">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                    </div>
                                    <div class=\"col-md-3\">
                                      <select class=\"form-control\">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                    </div>
                                    <div class=\"col-md-3\">
                                      <select class=\"form-control\">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                    
                                    </div>
                                    <div class=\"col-md-3\">
                                      Date of Birth
                                    </div>
                                </div>
                                <div class=\"row\">
                                <div class=\"control-group\">
                              <label class=\"control-label\" for=\"radios\"></label>
                              <div class=\"controls\">
                                <label class=\"radio inline\" for=\"radios-0\">
                                  <input name=\"radios\" id=\"radios-0\" value=\"Male\" checked=\"checked\" type=\"radio\">
                                  Male
                                </label>
                                <label class=\"radio inline\" for=\"radios-1\">
                                  <input name=\"radios\" id=\"radios-1\" value=\"Female\" type=\"radio\">
                                  Female
                                </label>
  </div>
</div>
                                
                                
                                </div>
                                <div class=\"row form-group\">
                                <p>By clicking Sign Up, you agree to our Terms and that you have read 
our Data Use Policy, including our Cookie Use.</p>
                                
                                </div>
                                <div class=\"row form-group\">
                                    ";
        // line 101
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "submit"), 'row', array("label" => "Sign Up"));
        echo "
                                
                                </div>


\t\t";
        // line 106
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_end');
        echo "

</div>
";
    }

    public function getTemplateName()
    {
        return "TreeTreeBundle:User:member_register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 106,  172 => 101,  77 => 19,  53 => 12,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 15,  63 => 15,  59 => 14,  93 => 28,  88 => 6,  78 => 21,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 14,  56 => 9,  27 => 4,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  87 => 25,  46 => 7,  44 => 12,  25 => 3,  21 => 2,  31 => 5,  38 => 7,  26 => 6,  28 => 4,  24 => 3,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 9,  40 => 8,  37 => 10,  22 => 1,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 18,  66 => 24,  55 => 15,  52 => 21,  50 => 11,  43 => 8,  41 => 8,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 36,  103 => 35,  99 => 31,  95 => 28,  92 => 21,  86 => 22,  82 => 22,  80 => 41,  73 => 19,  64 => 17,  60 => 14,  57 => 13,  54 => 10,  51 => 14,  48 => 13,  45 => 17,  42 => 7,  39 => 9,  36 => 5,  33 => 4,  30 => 7,);
    }
}
