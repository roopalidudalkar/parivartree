<?php

/* AcmeDemoBundle:Secured:login.html.twig */
class __TwigTemplate_e4c40e86446fc0fcab4e7ac12e0cdbf201ab78b29f4ae627c74b6ce206c62938 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 35
        $context["code"] = $this->env->getExtension('demo')->getCode($this);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1 class=\"title\">Login</h1>

    <p>
        Choose between two default users: <em>user/userpass</em> <small>(ROLE_USER)</small> or <em>admin/adminpass</em> <small>(ROLE_ADMIN)</small>
    </p>

    ";
        // line 10
        if ($this->getContext($context, "error")) {
            // line 11
            echo "        <div class=\"error\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "error"), "message"), "html", null, true);
            echo "</div>
    ";
        }
        // line 13
        echo "
    <form action=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("_demo_security_check");
        echo "\" method=\"post\" id=\"login\">
        <div>
            <label for=\"username\">Username</label>
            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" />
        </div>

        <div>
            <label for=\"password\">Password</label>
            <input type=\"password\" id=\"password\" name=\"_password\" />
        </div>

        <button type=\"submit\" class=\"sf-button\">
            <span class=\"border-l\">
                <span class=\"border-r\">
                    <span class=\"btn-bg\">Login</span>
                </span>
            </span>
        </button>
    </form>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Secured:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  232 => 122,  161 => 74,  184 => 80,  170 => 76,  150 => 71,  84 => 29,  65 => 21,  292 => 156,  287 => 153,  265 => 144,  257 => 141,  251 => 138,  233 => 131,  186 => 105,  167 => 97,  153 => 93,  148 => 67,  126 => 83,  195 => 89,  146 => 64,  58 => 17,  757 => 345,  751 => 341,  742 => 339,  738 => 338,  734 => 337,  728 => 334,  724 => 333,  710 => 325,  703 => 321,  696 => 317,  674 => 304,  667 => 300,  659 => 295,  645 => 290,  639 => 287,  635 => 286,  630 => 284,  566 => 222,  559 => 220,  553 => 217,  548 => 215,  543 => 214,  537 => 212,  531 => 210,  529 => 209,  525 => 208,  517 => 207,  512 => 204,  506 => 200,  501 => 198,  496 => 197,  490 => 195,  484 => 193,  482 => 192,  470 => 190,  459 => 183,  443 => 178,  412 => 166,  396 => 161,  390 => 159,  388 => 158,  329 => 139,  324 => 136,  274 => 148,  260 => 142,  256 => 103,  244 => 128,  222 => 94,  216 => 124,  206 => 87,  200 => 117,  127 => 28,  100 => 46,  350 => 191,  342 => 189,  284 => 112,  271 => 136,  267 => 135,  228 => 128,  215 => 104,  211 => 88,  178 => 76,  165 => 69,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 322,  762 => 347,  754 => 316,  745 => 310,  740 => 308,  723 => 293,  717 => 329,  711 => 291,  708 => 290,  695 => 284,  689 => 313,  681 => 308,  673 => 279,  664 => 277,  661 => 276,  658 => 275,  655 => 294,  651 => 272,  649 => 291,  646 => 270,  642 => 268,  640 => 267,  636 => 266,  631 => 265,  629 => 264,  626 => 263,  622 => 261,  619 => 260,  603 => 254,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 240,  549 => 239,  546 => 238,  530 => 232,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 181,  451 => 209,  447 => 207,  441 => 205,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 184,  371 => 153,  335 => 169,  318 => 164,  302 => 152,  293 => 157,  377 => 4,  354 => 192,  338 => 186,  330 => 183,  313 => 174,  308 => 161,  262 => 105,  242 => 116,  237 => 97,  231 => 96,  225 => 115,  223 => 114,  198 => 107,  194 => 83,  192 => 82,  155 => 69,  134 => 63,  129 => 63,  124 => 57,  110 => 22,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 191,  468 => 223,  465 => 187,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 156,  370 => 198,  349 => 144,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 166,  321 => 135,  317 => 134,  311 => 162,  303 => 165,  296 => 163,  275 => 154,  249 => 130,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 23,  449 => 180,  431 => 174,  418 => 170,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 190,  343 => 142,  334 => 88,  328 => 82,  323 => 80,  315 => 163,  304 => 67,  297 => 158,  290 => 115,  286 => 58,  282 => 57,  279 => 110,  276 => 137,  250 => 102,  207 => 119,  190 => 92,  188 => 81,  174 => 52,  152 => 67,  137 => 65,  118 => 57,  114 => 53,  97 => 53,  90 => 32,  81 => 41,  76 => 17,  180 => 55,  172 => 101,  77 => 34,  53 => 11,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 206,  440 => 148,  437 => 176,  435 => 175,  430 => 201,  427 => 200,  423 => 173,  413 => 134,  409 => 132,  407 => 164,  402 => 163,  398 => 129,  393 => 126,  387 => 187,  384 => 157,  381 => 120,  379 => 119,  374 => 182,  368 => 180,  365 => 149,  362 => 195,  360 => 147,  355 => 146,  341 => 141,  337 => 140,  322 => 165,  314 => 99,  312 => 98,  309 => 97,  305 => 160,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 107,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 77,  229 => 73,  220 => 70,  214 => 123,  177 => 80,  169 => 75,  140 => 53,  132 => 51,  128 => 58,  107 => 56,  61 => 12,  273 => 96,  269 => 145,  254 => 198,  243 => 88,  240 => 14,  238 => 125,  235 => 112,  230 => 11,  227 => 120,  224 => 127,  221 => 8,  219 => 125,  217 => 75,  208 => 92,  204 => 100,  179 => 69,  159 => 72,  143 => 69,  135 => 66,  119 => 58,  102 => 17,  71 => 27,  67 => 24,  63 => 15,  59 => 13,  93 => 53,  88 => 31,  78 => 26,  94 => 34,  89 => 52,  85 => 50,  75 => 37,  68 => 14,  56 => 11,  27 => 4,  201 => 92,  196 => 90,  183 => 83,  171 => 77,  166 => 75,  163 => 74,  158 => 95,  156 => 71,  151 => 63,  142 => 64,  138 => 87,  136 => 52,  121 => 51,  117 => 19,  105 => 18,  91 => 36,  62 => 30,  49 => 13,  87 => 32,  46 => 11,  44 => 8,  25 => 35,  21 => 1,  31 => 3,  38 => 6,  26 => 9,  28 => 3,  24 => 3,  19 => 1,  79 => 38,  72 => 15,  69 => 17,  47 => 8,  40 => 6,  37 => 5,  22 => 1,  246 => 135,  157 => 56,  145 => 66,  139 => 68,  131 => 62,  123 => 60,  120 => 20,  115 => 58,  111 => 56,  108 => 19,  101 => 55,  98 => 31,  96 => 21,  83 => 31,  74 => 39,  66 => 26,  55 => 21,  52 => 14,  50 => 18,  43 => 11,  41 => 10,  35 => 5,  32 => 5,  29 => 3,  209 => 161,  203 => 108,  199 => 98,  193 => 95,  189 => 86,  187 => 92,  182 => 90,  176 => 79,  173 => 77,  168 => 48,  164 => 75,  162 => 74,  154 => 61,  149 => 68,  147 => 70,  144 => 66,  141 => 48,  133 => 65,  130 => 36,  125 => 60,  122 => 43,  116 => 54,  112 => 58,  109 => 45,  106 => 38,  103 => 50,  99 => 36,  95 => 54,  92 => 20,  86 => 51,  82 => 28,  80 => 17,  73 => 16,  64 => 13,  60 => 12,  57 => 12,  54 => 19,  51 => 19,  48 => 9,  45 => 8,  42 => 7,  39 => 10,  36 => 5,  33 => 4,  30 => 3,);
    }
}
