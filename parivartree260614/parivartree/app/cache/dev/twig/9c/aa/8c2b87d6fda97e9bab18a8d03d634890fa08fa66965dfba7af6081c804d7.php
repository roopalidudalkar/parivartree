<?php

/* ::base.html.twig */
class __TwigTemplate_9caa8c2b87d6fda97e9bab18a8d03d634890fa08fa66965dfba7af6081c804d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
            'login' => array($this, 'block_login'),
            'flash' => array($this, 'block_flash'),
            'register' => array($this, 'block_register'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=ISO-8859-1\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
            
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 16
        echo "
        ";
        // line 17
        $this->displayBlock('js', $context, $blocks);
        // line 25
        echo "    </head>
<body>
        ";
        // line 27
        $this->displayBlock('body', $context, $blocks);
        // line 216
        echo "        
        

    </body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome! to ParivarTree ";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "\t\t<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t\t<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t\t<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        ";
    }

    // line 17
    public function block_js($context, array $blocks = array())
    {
        // line 18
        echo "\t\t<script src=\"http://code.jquery.com/jquery-1.10.2.min.js\"></script>
\t\t<script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t\t<!-- jQuery includes -->
\t\t<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js\"></script>
        ";
    }

    // line 27
    public function block_body($context, array $blocks = array())
    {
        // line 28
        echo "\t\t  <div class=\"top-header\">
\t\t  <div class=\"error-block\">
\t\t  \t
\t\t\t";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 32
            echo "
\t\t\t\t\t<div class=\"alert alert-danger\"> <div class=\"container\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "</div></div>
\t\t\t\t\t\t
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
\t\t\t\t\t";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 38
            echo "
\t\t\t\t\t<div class=\"alert alert-success\"> <div class=\"container\">";
            // line 39
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "</div></div>
\t\t\t\t\t\t
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "\t\t\t\t\t
\t\t\t\t\t";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "message"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 44
            echo "
\t\t\t\t\t<div class=\"alert alert-success\"> <div class=\"container\">";
            // line 45
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "</div></div>
\t\t\t\t\t\t
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "\t
\t\t  </div>
           <div class=\"container\">
            <div class=\"col-md-6 clear-left\">
                <a class=\"navbar-brand\" href=\"#\"><img alt=\"\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo.jpg"), "html", null, true);
        echo "\"></a>
            </div>
             <div class=\"col-md-6 login-block\">
\t\t\t";
        // line 55
        $this->displayBlock('login', $context, $blocks);
        // line 84
        echo "            </div>
        </div>
   </div>
   
   ";
        // line 88
        $this->displayBlock('flash', $context, $blocks);
        // line 92
        echo " <div class=\"jumbotron\">
         <div class=\"container\">
                <div class=\"col-md-5 signup-left-block\">
                        <h1>Sign Up</h1>
                        <h2>Its free and always will be</h2>
                            <div class=\"row form-group signup-block-btn\">
\t\t\t\t\t\t\t\t <div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t 
                                    <button class=\"btn btn-primary  btn-block\" type=\"button\">Sign up with Facebook</button>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
                                    <button class=\"btn btn-danger  btn-block\" type=\"button\">Sign up with Google+</button>
                                </div>
                            </div>
                            <div class=\"or\"><span>OR</span></div>
                   \t";
        // line 107
        $this->displayBlock('register', $context, $blocks);
        // line 161
        echo "\t\t\t\t</div>
              
             <div class=\"col-md-7\">
                \t<div class=\"banner-right\">
                    \t<h1>Family  like branches on a tree, We all grow in different directions yet our roots remain as one</h1>
\t\t\t\t\t\t<div class=\"banner-block\">
                        \t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t<div class=\"box\">
                            \t\t<span class=\"bk1\"></span>
\t\t\t\t\t\t\t\t</div>
                            \t<p>Join</p>
                            </div>
                            <div class=\"col-md-3\">
                            \t<div class=\"box\">
                            \t\t<span class=\"bk2\"></span>
\t\t\t\t\t\t\t\t</div>
                            \t<p>Invite</p>
                            </div>
                            <div class=\"col-md-3\">
                            \t<div class=\"box\">
                            \t\t<span class=\"bk3\"></span>
\t\t\t\t\t\t\t\t</div>
                            \t<p>Share</p>
                            </div>
                            <div class=\"col-md-3\">
                            \t<div class=\"box\">
                            \t\t<span class=\"bk4\"></span>
\t\t\t\t\t\t\t\t</div>
                            \t<p>Smile</p>
                            </div>
                        
                        </div>
\t\t\t\t\t\t<div class=\"need-help\">Need help? Talk to one of our family history consultants: 1-800-958-9095 24-HOURS </div>
                    \t<div class=\"available-block\">
\t\t\t\t\t\t\t<h3>Also Available on </h3>
\t\t\t\t\t\t\t<div class=\"col-md-4\"><a href=\"#\"><img src=\"";
        // line 196
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/apple.png"), "html", null, true);
        echo "\"></a></div>
\t\t\t\t\t\t\t<div class=\"col-md-4\"><a href=\"#\"><img src=\"";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/googleplay.png"), "html", null, true);
        echo "\"></a></div>
\t\t\t\t\t\t\t<div class=\"col-md-4\"><a href=\"#\"><img src=\"";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/windows.png"), "html", null, true);
        echo "\"></a></div>
\t\t\t\t\t\t</div>
                    </div>\t
                
                </div>
            </div>
</div>
<div class=\"footer\">
\t<div class=\"container\">
    \t<div class=\"col-md-8\"><p>© 2014 Parivartree | About | Privacy Policy | Terms & Conditions | FAQs | Campaigns</p></div>
        <div class=\"col-md-4 follow\">Follow us</div>
    \t
    \t
    </div>
\t
</div>
\t\t\t
        ";
    }

    // line 55
    public function block_login($context, array $blocks = array())
    {
        // line 56
        echo "\t\t\t\t   
\t\t\t\t\t";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "loginform"), 'errors');
        echo "
\t\t\t\t\t";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "email"), 'errors');
        echo "
              ";
        // line 59
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "loginform"), 'form_start');
        echo "
            \t<div class=\"col-md-5\">
                    <div class=\"form-group\">
                        <label for=\"exampleInputEmail1\">User Name or Email </label>
                       ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "email"), 'widget');
        echo "
                    </div>
                    <div class=\"checkbox\">
                        <label>
                      ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "rememerme"), 'widget');
        echo "
                      
                        </label>
                    </div>
                </div>
                <div class=\"col-md-5\">
                  <div class=\"form-group\">
                        <label for=\"exampleInputEmail1\">Password</label>
                       ";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "password"), 'widget');
        echo "
                    </div>
                    <a href=\"#\">Forgot Password?</a>
                </div>
                <div class=\"col-md-2\">
                \t  ";
        // line 80
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "submit"), 'row');
        echo "
                </div>
            ";
        // line 82
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "loginform"), 'form_end');
        echo "
             ";
    }

    // line 88
    public function block_flash($context, array $blocks = array())
    {
        // line 89
        echo "
\t\t\t\t\t
\t";
    }

    // line 107
    public function block_register($context, array $blocks = array())
    {
        // line 108
        echo "\t\t\t\t\t\t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
\t\t\t\t\t\t\t";
        // line 109
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "firstname"), 'errors');
        echo "
\t\t\t\t\t\t\t";
        // line 110
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "lastname"), 'errors');
        echo "
\t\t\t\t\t\t\t";
        // line 111
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'errors');
        echo "

\t\t\t\t\t\t\t";
        // line 113
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "gender"), 'errors');
        echo "
\t\t\t\t\t\t\t";
        // line 114
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "mobile"), 'errors');
        echo "
                          ";
        // line 115
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_start');
        echo "
               
                            <div class=\"row form-group\">
                                <div class=\"col-md-6\">
                                   ";
        // line 119
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "firstname"), 'widget');
        echo "
                                   
                                </div>
                                <div class=\"col-md-6\">
                                ";
        // line 123
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "lastname"), 'widget');
        echo "
                                </div>
                                </div>
                                <div class=\"row form-group\">
                                    <div class=\"form-group\">
                                    ";
        // line 128
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'widget');
        echo "
                                    </div>
                                   
                       
                                    <div class=\"\">
                                   ";
        // line 133
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "mobile"), 'widget');
        echo "
                                    </div>
                                    
                                </div>
                                <div class=\"row\"></div>
                                <div class=\"row\">
                                <div class=\"control-group\">
\t\t\t\t\t\t\t\t\t<div class=\"controls gender\">
                               
                                   ";
        // line 142
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form"), "gender"));
        foreach ($context['_seq'] as $context["_key"] => $context["gender"]) {
            // line 143
            echo "\t\t\t\t\t\t\t\t\t\t\t";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "gender"), 'widget');
            echo "
\t\t\t\t\t\t\t\t\t\t\t<span>";
            // line 144
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "gender"), 'label');
            echo "</span>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gender'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 146
        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
                                
                                
\t\t\t\t\t\t\t\t</div>
      
                                <div class=\"row form-group\">
                                <p>By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</p>
                                
                                </div>
                                <div class=\"row form-group\">
                                    ";
        // line 157
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "submit"), 'row');
        echo "
                                </div>
                                ";
        // line 159
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_end');
        echo "
                    ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  449 => 159,  431 => 146,  418 => 143,  414 => 142,  394 => 128,  386 => 123,  372 => 115,  364 => 113,  359 => 111,  351 => 109,  346 => 108,  343 => 107,  334 => 88,  328 => 82,  323 => 80,  315 => 75,  304 => 67,  297 => 63,  290 => 59,  286 => 58,  282 => 57,  279 => 56,  276 => 55,  250 => 197,  207 => 107,  190 => 92,  188 => 88,  174 => 52,  152 => 43,  137 => 38,  118 => 32,  114 => 31,  97 => 20,  90 => 18,  81 => 14,  76 => 12,  180 => 55,  172 => 101,  77 => 19,  53 => 216,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 157,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 144,  413 => 134,  409 => 132,  407 => 131,  402 => 133,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 114,  365 => 111,  362 => 110,  360 => 109,  355 => 110,  341 => 105,  337 => 89,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 39,  132 => 51,  128 => 49,  107 => 36,  61 => 13,  273 => 96,  269 => 94,  254 => 198,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 45,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 11,  67 => 15,  63 => 15,  59 => 14,  93 => 19,  88 => 6,  78 => 21,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 10,  56 => 9,  27 => 4,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 33,  117 => 44,  105 => 40,  91 => 27,  62 => 8,  49 => 19,  87 => 17,  46 => 7,  44 => 12,  25 => 3,  21 => 2,  31 => 5,  38 => 7,  26 => 1,  28 => 4,  24 => 3,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 25,  40 => 10,  37 => 10,  22 => 1,  246 => 196,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 18,  66 => 24,  55 => 15,  52 => 21,  50 => 11,  43 => 8,  41 => 8,  35 => 8,  32 => 4,  29 => 3,  209 => 161,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 84,  176 => 64,  173 => 65,  168 => 48,  164 => 59,  162 => 57,  154 => 58,  149 => 42,  147 => 58,  144 => 49,  141 => 48,  133 => 37,  130 => 36,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 28,  106 => 27,  103 => 35,  99 => 31,  95 => 28,  92 => 21,  86 => 22,  82 => 22,  80 => 41,  73 => 19,  64 => 17,  60 => 14,  57 => 13,  54 => 10,  51 => 27,  48 => 13,  45 => 17,  42 => 16,  39 => 9,  36 => 5,  33 => 4,  30 => 7,);
    }
}
