<?php

/* TreeTreeBundle:Home:index.html.twig */
class __TwigTemplate_b6d1f81712049752efd7bcc314d88316f125c6ec5ac29f174ff101e6e2905dc7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE HTML>
<head>
       
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">  
\t\t
\t\t
\t\t<!--[if lt IE 9]>
\t\t\t<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/html5shiv.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/respond.min.js"), "html", null, true);
        echo "\"></script>
\t\t<![endif]-->
\t\t
\t\t<link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t\t<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />

\t\t\t
    </head>
<body>
       
\t\t  <div class=\"top-header\">
\t\t  <div class=\"error-block\">
\t\t  \t
\t\t\t";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 26
            echo "
\t\t\t\t\t<div class=\"alert alert-danger\"> <div class=\"container\">";
            // line 27
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "</div></div>
\t\t\t\t\t\t
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "
\t\t\t\t\t";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 32
            echo "
\t\t\t\t\t<div class=\"alert alert-success\"> <div class=\"container\">";
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
        echo "\t\t\t\t\t
\t\t\t\t\t";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "message"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 38
            echo "
\t\t\t\t\t<div class=\"alert alert-success\"> <div class=\"container\">";
            // line 39
            echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
            echo "</div></div>
\t\t\t\t\t\t
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "\t
\t\t  </div>
           <div class=\"container\">
            <div class=\"col-md-6 clear-left\">
                <a class=\"navbar-brand\" href=\"#\"><img alt=\"\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo.jpg"), "html", null, true);
        echo "\"></a>
            </div>
             <div class=\"col-md-6 login-block\">
\t\t\t
\t\t\t\t   
\t\t\t\t\t";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "loginform"), 'errors');
        echo "
\t\t\t\t\t";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "email"), 'errors');
        echo "
              ";
        // line 53
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "loginform"), 'form_start');
        echo "
            \t<div class=\"col-md-5\">
                    <div class=\"form-group\">
                        <label for=\"exampleInputEmail1\">User Name or Email </label>
                       ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "email"), 'widget');
        echo "
                    </div>
                    <div class=\"checkbox\">
                        <label>
                      ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "rememerme"), 'widget');
        echo "
                      
                        </label>
                    </div>
                </div>
                <div class=\"col-md-5\">
                  <div class=\"form-group\">
                        <label for=\"exampleInputEmail1\">Password</label>
                       ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "password"), 'widget');
        echo "
                    </div>
                    <a href=\"#\">Forgot Password?</a>
                </div>
                <div class=\"col-md-2\">
                \t  ";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "loginform"), "submit"), 'row');
        echo "
                </div>
            ";
        // line 76
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "loginform"), 'form_end');
        echo "
             
            </div>
        </div>
   </div>
   
   

\t\t\t\t\t
\t
 <div class=\"jumbotron\">
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
                   
\t\t\t\t\t\t\t";
        // line 102
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
\t\t\t\t\t\t\t";
        // line 103
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "firstname"), 'errors');
        echo "
\t\t\t\t\t\t\t";
        // line 104
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "lastname"), 'errors');
        echo "
\t\t\t\t\t\t\t";
        // line 105
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'errors');
        echo "

\t\t\t\t\t\t\t";
        // line 107
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "gender"), 'errors');
        echo "
\t\t\t\t";
        // line 108
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_start');
        echo "
               
                            <div class=\"row form-group\">
                                <div class=\"col-md-6\">
                                   ";
        // line 112
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "firstname"), 'widget');
        echo "
                                   
                                </div>
                                <div class=\"col-md-6\">
                                \t";
        // line 116
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "lastname"), 'widget');
        echo "
                                </div>
                                </div>
                                <div class=\"row form-group\">
                                    <div class=\"form-group\">
                                    ";
        // line 121
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'widget');
        echo "
                                    </div>
                                   
                       
                                    <div class=\"\">
                                   
                                    </div>
                                    
                                </div>
                                <div class=\"row\"></div>
                                <div class=\"row\">
                                <div class=\"control-group\">
\t\t\t\t\t\t\t\t\t<div class=\"controls gender\">
                               
                                   ";
        // line 135
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form"), "gender"));
        foreach ($context['_seq'] as $context["_key"] => $context["gender"]) {
            // line 136
            echo "\t\t\t\t\t\t\t\t\t\t\t";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "gender"), 'widget');
            echo "
\t\t\t\t\t\t\t\t\t\t\t<span>";
            // line 137
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "gender"), 'label');
            echo "</span>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gender'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 139
        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
                                
                                
\t\t\t\t\t\t\t\t</div>
      
                                <div class=\"row form-group\">
                                <p>By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</p>
                                
                                </div>
                                <div class=\"row form-group\">
                                    ";
        // line 150
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "submit"), 'row');
        echo "
                                </div>
                                ";
        // line 152
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_end');
        echo "
                  
\t\t\t\t</div>
              
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
        // line 189
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/apple.png"), "html", null, true);
        echo "\"></a></div>
\t\t\t\t\t\t\t<div class=\"col-md-4\"><a href=\"#\"><img src=\"";
        // line 190
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/googleplay.png"), "html", null, true);
        echo "\"></a></div>
\t\t\t\t\t\t\t<div class=\"col-md-4\"><a href=\"#\"><img src=\"";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/windows.png"), "html", null, true);
        echo "\"></a></div>
\t\t\t\t\t\t</div>
                    </div>\t
                
                </div>
            </div>
</div>
<div class=\"footer\">
\t<div class=\"container\">
    \t<div class=\"col-md-8\"><p>Â© 2014 Parivartree | About | Privacy Policy | Terms & Conditions | FAQs | Campaigns</p></div>
        <div class=\"col-md-4 follow\">Follow us</div>
    \t
    \t
    </div>
\t
</div>

        
        

    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome! to ParivarTree ";
    }

    public function getTemplateName()
    {
        return "TreeTreeBundle:Home:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  350 => 191,  342 => 189,  284 => 139,  271 => 136,  267 => 135,  228 => 108,  215 => 104,  211 => 103,  178 => 76,  165 => 69,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 322,  762 => 319,  754 => 316,  745 => 310,  740 => 308,  723 => 293,  717 => 292,  711 => 291,  708 => 290,  695 => 284,  689 => 281,  681 => 280,  673 => 279,  664 => 277,  661 => 276,  658 => 275,  655 => 274,  651 => 272,  649 => 271,  646 => 270,  642 => 268,  640 => 267,  636 => 266,  631 => 265,  629 => 264,  626 => 263,  622 => 261,  619 => 260,  603 => 254,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 240,  549 => 239,  546 => 238,  530 => 232,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 210,  451 => 209,  447 => 207,  441 => 205,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 184,  371 => 181,  335 => 169,  318 => 164,  302 => 152,  293 => 157,  377 => 4,  354 => 192,  338 => 186,  330 => 183,  313 => 174,  308 => 161,  262 => 128,  242 => 116,  237 => 119,  231 => 117,  225 => 115,  223 => 114,  198 => 107,  194 => 105,  192 => 104,  155 => 69,  134 => 64,  129 => 63,  124 => 46,  110 => 57,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 231,  468 => 223,  465 => 222,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 198,  370 => 198,  349 => 173,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 166,  321 => 173,  317 => 172,  311 => 162,  303 => 165,  296 => 163,  275 => 154,  249 => 139,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 26,  449 => 159,  431 => 146,  418 => 143,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 190,  343 => 170,  334 => 88,  328 => 82,  323 => 80,  315 => 163,  304 => 67,  297 => 150,  290 => 59,  286 => 58,  282 => 57,  279 => 56,  276 => 137,  250 => 121,  207 => 102,  190 => 92,  188 => 88,  174 => 52,  152 => 43,  137 => 65,  118 => 42,  114 => 31,  97 => 20,  90 => 33,  81 => 50,  76 => 36,  180 => 55,  172 => 101,  77 => 19,  53 => 18,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 206,  440 => 148,  437 => 147,  435 => 146,  430 => 201,  427 => 200,  423 => 144,  413 => 134,  409 => 132,  407 => 131,  402 => 133,  398 => 129,  393 => 126,  387 => 187,  384 => 121,  381 => 120,  379 => 119,  374 => 182,  368 => 180,  365 => 179,  362 => 195,  360 => 109,  355 => 110,  341 => 105,  337 => 89,  322 => 165,  314 => 99,  312 => 98,  309 => 97,  305 => 160,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 85,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 112,  140 => 53,  132 => 51,  128 => 49,  107 => 56,  61 => 22,  273 => 96,  269 => 151,  254 => 198,  243 => 88,  240 => 14,  238 => 85,  235 => 112,  230 => 11,  227 => 10,  224 => 107,  221 => 8,  219 => 105,  217 => 75,  208 => 111,  204 => 72,  179 => 69,  159 => 45,  143 => 67,  135 => 53,  119 => 42,  102 => 37,  71 => 27,  67 => 26,  63 => 15,  59 => 14,  93 => 53,  88 => 52,  78 => 33,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 26,  56 => 27,  27 => 4,  201 => 92,  196 => 90,  183 => 121,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 52,  121 => 61,  117 => 44,  105 => 40,  91 => 27,  62 => 13,  49 => 17,  87 => 32,  46 => 7,  44 => 17,  25 => 4,  21 => 2,  31 => 4,  38 => 7,  26 => 1,  28 => 3,  24 => 3,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 14,  40 => 11,  37 => 10,  22 => 1,  246 => 138,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 59,  111 => 37,  108 => 36,  101 => 55,  98 => 31,  96 => 31,  83 => 31,  74 => 18,  66 => 14,  55 => 15,  52 => 16,  50 => 18,  43 => 8,  41 => 11,  35 => 5,  32 => 8,  29 => 5,  209 => 161,  203 => 108,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 84,  176 => 64,  173 => 74,  168 => 48,  164 => 59,  162 => 57,  154 => 61,  149 => 68,  147 => 57,  144 => 49,  141 => 48,  133 => 37,  130 => 36,  125 => 44,  122 => 43,  116 => 41,  112 => 58,  109 => 39,  106 => 38,  103 => 35,  99 => 36,  95 => 54,  92 => 21,  86 => 35,  82 => 34,  80 => 30,  73 => 19,  64 => 25,  60 => 14,  57 => 23,  54 => 19,  51 => 22,  48 => 18,  45 => 17,  42 => 16,  39 => 16,  36 => 7,  33 => 7,  30 => 7,);
    }
}
