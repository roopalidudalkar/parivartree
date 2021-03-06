<?php

/* WebProfilerBundle:Collector:exception.html.twig */
class __TwigTemplate_adcfaf4fb0c1213f0f86f2efb669884459883910369be188dc26bc9135ed408c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@WebProfiler/Profiler/layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ($this->getAttribute($this->getContext($context, "collector"), "hasexception")) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception_css", array("token" => $this->getContext($context, "token"))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        // line 13
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAeCAQAAADwIURrAAAEQ0lEQVR42sWVf0xbVRTHKSCUUNEsWdhE3BT3QzNMjHEydLz+eONnGS2sbBSkKBA7Nn6DGwb+EByLbMbFKEuUiG1kTrFgwmCODZaZqaGJEQYSMXQJMJFBs/pGlV9tv97bAukrZMD+8Z2k957vOfdzz7s579brwU+jSP2mojnmNgOXxQ4pLqa90SjyetjHEKQ6I7MwWGkyi+qMIWjDQPgUiuNMfBTf4kxlkfDZELJSynIMHmwsVyldNxaCC7soUjV/fcTawxmvjCscS6AUR9cdzsgZu0YVCwyiLV/uhGB9UFFmG4O0OXM7inEQCpTf6ZY7nEjbeCdKkUSs9O73iTYGmW0QrQfprWclBNHSAxWegD+ECEXmp0MU2nQLajxJFCH5VTfdYiBx6Fl4r6POYj0FcCcQAoFrG4T1fkS14VpscyEgwLaRU1Qr1rtqhY9mb7L6stCtuooIyd8JnSUvEkCoepiclg1y+C3HHx3NpoBZFQKWtQAoqaYeRijxfAvSxXYGWbXwX074oIwmFJ5FIMLlVjrvT4K/JlfKSTlNLkTf5VOtKwtCrUJ2VzKdXoaAH9VUk1sRTgiPlzdSr/IrbCbAvMi4SyWpprfoOd4sxyZEsDYarqrHM6wTz1qxu6CNzkq/xtMJY3QmWTDuLbtAZ1I7XkuR6V5pbCAqjNUIJlB1BwOx/T1DDpf678DxI5XDysUP8r4xO3bOOZu7USRbcOLnftCm3HOhrlWwJEoNh6TWmMn6VrLplDE/5/XsHV7aXxchNlorgys1Sz0Zb62YoGP5ZMzskhY9WzlKRy0XN7OkIdfwWeI/DJYs6abXUO3pybyZOnOCPd72xcAlPU4y2JjhMNKgky8ccMicZR360wv78Q4+4Vroidz+HEpkbhjKYmt3FUMG43iVtW5q7EPSLtiO8MES5wtbtKfa8/lLNHZPSIY9nue3Hs+oieHozHoeNTgJiaulfMFmTK9WRdW0+arEwde6rp+dWi035x4UCMNTEC02P14wn3/3PrsisWgUKrXOXVF2QH5sxDPvgOO0xXIOz/OuFzwGCWptHX2/XZtwT5ZbJ15i/Jj6ZaW+UNgRw9rcc7r/6htAG6oRhSCP6w4i7IAYh1HHryGz07AZAmYXk0VsCwSdW5N/52fgfaQSYBgCV70G4UvQiZ6vFjuWXq1JyguBT+GzGeWx455xJCJwjcsa4g23lJiu+/+h0R6I+IeCRiXM87rPzm+0fFssz0+YR9Ta0H3ZZl77W4/yNrk4XjDj7mebsW9taHjDDfdFP/W0DLp9ojOc7vLP7vGmq9izNnQLtB+PLZ6fo3kAxTihM7mO4Ijtj2YooW0edJ20BDoTchC8NtQPe/D2XHtvv+kXfIOjeI74RWgZ7OvtXWhAEoKxE8fwLfH70Uoiu/HIev6khdgOMZJxEBEIgR/8EYpXoYQCL2MTvOFH1EjiJ2M/ifivJPwHIs9MRJmsgVwAAAAASUVORK5CYII=\" alt=\"Exception\"></span>
    <strong>Exception</strong>
    <span class=\"count\">
        ";
        // line 17
        if ($this->getAttribute($this->getContext($context, "collector"), "hasexception")) {
            // line 18
            echo "            <span>1</span>
        ";
        }
        // line 20
        echo "    </span>
</span>
";
    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        // line 25
        echo "    <h2>Exception</h2>

    ";
        // line 27
        if ((!$this->getAttribute($this->getContext($context, "collector"), "hasexception"))) {
            // line 28
            echo "        <p>
            <em>No exception was thrown and uncaught during the request.</em>
        </p>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception", array("token" => $this->getContext($context, "token"))));
            echo "
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  810 => 492,  807 => 491,  796 => 489,  792 => 488,  788 => 486,  775 => 485,  749 => 479,  746 => 478,  727 => 476,  706 => 473,  702 => 472,  698 => 471,  694 => 470,  690 => 469,  686 => 468,  682 => 467,  679 => 466,  677 => 465,  660 => 464,  634 => 456,  625 => 453,  620 => 451,  606 => 449,  601 => 446,  567 => 414,  532 => 410,  527 => 408,  522 => 406,  202 => 94,  403 => 136,  401 => 135,  391 => 133,  382 => 131,  356 => 122,  347 => 119,  234 => 90,  389 => 160,  380 => 158,  363 => 153,  361 => 152,  358 => 151,  345 => 147,  340 => 145,  331 => 140,  326 => 138,  307 => 128,  288 => 118,  281 => 98,  259 => 103,  255 => 101,  253 => 100,  248 => 97,  213 => 78,  197 => 69,  175 => 58,  191 => 67,  185 => 75,  113 => 48,  104 => 31,  367 => 155,  353 => 121,  306 => 286,  232 => 89,  161 => 58,  184 => 63,  170 => 84,  150 => 71,  84 => 40,  65 => 11,  292 => 156,  287 => 153,  265 => 105,  257 => 141,  251 => 138,  233 => 131,  186 => 72,  167 => 71,  153 => 77,  148 => 67,  126 => 83,  195 => 89,  146 => 64,  58 => 25,  757 => 345,  751 => 341,  742 => 339,  738 => 338,  734 => 337,  728 => 334,  724 => 333,  710 => 475,  703 => 321,  696 => 317,  674 => 304,  667 => 300,  659 => 295,  645 => 290,  639 => 287,  635 => 286,  630 => 284,  566 => 222,  559 => 220,  553 => 217,  548 => 215,  543 => 214,  537 => 212,  531 => 210,  529 => 409,  525 => 208,  517 => 404,  512 => 204,  506 => 200,  501 => 198,  496 => 197,  490 => 195,  484 => 193,  482 => 192,  470 => 190,  459 => 183,  443 => 178,  412 => 166,  396 => 161,  390 => 159,  388 => 158,  329 => 139,  324 => 112,  274 => 96,  260 => 142,  256 => 103,  244 => 128,  222 => 83,  216 => 79,  206 => 87,  200 => 117,  127 => 35,  100 => 46,  350 => 120,  342 => 189,  284 => 112,  271 => 136,  267 => 135,  228 => 128,  215 => 104,  211 => 88,  178 => 59,  165 => 83,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 322,  762 => 347,  754 => 316,  745 => 310,  740 => 308,  723 => 293,  717 => 329,  711 => 291,  708 => 290,  695 => 284,  689 => 313,  681 => 308,  673 => 279,  664 => 277,  661 => 276,  658 => 275,  655 => 294,  651 => 272,  649 => 462,  646 => 270,  642 => 268,  640 => 267,  636 => 266,  631 => 265,  629 => 454,  626 => 263,  622 => 452,  619 => 260,  603 => 254,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 240,  549 => 411,  546 => 238,  530 => 232,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 181,  451 => 209,  447 => 207,  441 => 205,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 157,  371 => 127,  335 => 169,  318 => 164,  302 => 125,  293 => 107,  377 => 129,  354 => 192,  338 => 116,  330 => 183,  313 => 110,  308 => 109,  262 => 93,  242 => 116,  237 => 91,  231 => 96,  225 => 115,  223 => 114,  198 => 107,  194 => 68,  192 => 82,  155 => 55,  134 => 39,  129 => 63,  124 => 57,  110 => 22,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 191,  468 => 223,  465 => 187,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 156,  370 => 198,  349 => 144,  344 => 180,  339 => 179,  333 => 115,  327 => 175,  325 => 166,  321 => 135,  317 => 134,  311 => 162,  303 => 165,  296 => 121,  275 => 154,  249 => 92,  212 => 254,  210 => 77,  205 => 138,  23 => 1,  70 => 15,  449 => 180,  431 => 174,  418 => 170,  414 => 142,  394 => 134,  386 => 159,  372 => 115,  364 => 113,  359 => 123,  351 => 109,  346 => 190,  343 => 146,  334 => 141,  328 => 113,  323 => 80,  315 => 111,  304 => 67,  297 => 158,  290 => 119,  286 => 58,  282 => 57,  279 => 110,  276 => 111,  250 => 102,  207 => 76,  190 => 92,  188 => 90,  174 => 74,  152 => 54,  137 => 65,  118 => 49,  114 => 36,  97 => 41,  90 => 42,  81 => 41,  76 => 25,  180 => 70,  172 => 68,  77 => 34,  53 => 15,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 206,  440 => 148,  437 => 176,  435 => 175,  430 => 201,  427 => 200,  423 => 173,  413 => 141,  409 => 132,  407 => 138,  402 => 163,  398 => 129,  393 => 126,  387 => 187,  384 => 157,  381 => 120,  379 => 119,  374 => 128,  368 => 126,  365 => 125,  362 => 124,  360 => 147,  355 => 150,  341 => 117,  337 => 140,  322 => 165,  314 => 99,  312 => 130,  309 => 129,  305 => 108,  298 => 164,  294 => 90,  285 => 100,  283 => 115,  278 => 86,  268 => 107,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 93,  229 => 87,  220 => 70,  214 => 123,  177 => 69,  169 => 75,  140 => 53,  132 => 51,  128 => 42,  107 => 56,  61 => 17,  273 => 96,  269 => 107,  254 => 198,  243 => 88,  240 => 14,  238 => 125,  235 => 89,  230 => 11,  227 => 86,  224 => 127,  221 => 80,  219 => 125,  217 => 75,  208 => 76,  204 => 75,  179 => 69,  159 => 57,  143 => 69,  135 => 46,  119 => 58,  102 => 24,  71 => 23,  67 => 20,  63 => 18,  59 => 16,  93 => 38,  88 => 32,  78 => 19,  94 => 21,  89 => 30,  85 => 23,  75 => 18,  68 => 30,  56 => 11,  27 => 3,  201 => 74,  196 => 92,  183 => 71,  171 => 73,  166 => 54,  163 => 82,  158 => 80,  156 => 71,  151 => 63,  142 => 64,  138 => 47,  136 => 71,  121 => 50,  117 => 37,  105 => 25,  91 => 33,  62 => 27,  49 => 11,  87 => 41,  46 => 10,  44 => 10,  25 => 35,  21 => 2,  31 => 4,  38 => 7,  26 => 3,  28 => 3,  24 => 3,  19 => 1,  79 => 18,  72 => 17,  69 => 26,  47 => 11,  40 => 8,  37 => 7,  22 => 2,  246 => 136,  157 => 56,  145 => 74,  139 => 63,  131 => 61,  123 => 61,  120 => 38,  115 => 58,  111 => 47,  108 => 33,  101 => 30,  98 => 45,  96 => 37,  83 => 33,  74 => 27,  66 => 25,  55 => 13,  52 => 12,  50 => 22,  43 => 12,  41 => 19,  35 => 6,  32 => 6,  29 => 3,  209 => 161,  203 => 73,  199 => 93,  193 => 95,  189 => 66,  187 => 92,  182 => 87,  176 => 86,  173 => 85,  168 => 48,  164 => 70,  162 => 74,  154 => 61,  149 => 68,  147 => 75,  144 => 42,  141 => 73,  133 => 45,  130 => 36,  125 => 41,  122 => 43,  116 => 57,  112 => 58,  109 => 52,  106 => 51,  103 => 50,  99 => 23,  95 => 27,  92 => 43,  86 => 51,  82 => 28,  80 => 27,  73 => 24,  64 => 23,  60 => 12,  57 => 20,  54 => 19,  51 => 13,  48 => 16,  45 => 9,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
