<?php

/* WebProfilerBundle:Collector:events.html.twig */
class __TwigTemplate_3f952db3490ac21fc78d1980d178a7d3d187195c6bec21b975e12cf6a9168237 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@WebProfiler/Profiler/layout.html.twig");

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
            'panelContent' => array($this, 'block_panelContent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["__internal_d20b8fd60f519386060a3b30990b65d412b7fe5dbb1f62bc863d627f71a2289a"] = $this;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAiCAQAAADragGFAAAD60lEQVR42o2UfUxbVRjGb7fy4ah2QwdECSgjEpcYUP8hmtiWljbt+Gih62zGVqBjXkqgVcYQKzNLJF1HBxt0S9YMgqHVLt1oZRqidcpcgQ1dMpkxgyVK2NSYyWTAJoPB4/1g0iLQnZub+348v3vOPe95L/FogFO+pbBMbtPmgEsEDXC1OXJbYVn5FnBoPwg4wVfVCc7J3WRToxoxIbmYRjXZJHcLzqnqTvAZkEUsSfI2iddxCHtR8LkIvBCIR0UKsNdxSOKVt1mSwGGQ87GKNk3ncO1ARdFxkU/qxMYQaKPUKfIVHR+oGK7VdCrazsdSGKJKqsW+oRqnMcu7s91Td02FuBAo7prKU7ezPcvrNA7ViH0l1Ygi/Kmiz+y2H3Tirvqj0PvLqk09ieAsfW1PYrXJXwZ9/VFx11Vda2OW159KmEvFvkkdadvunN19oEbYrXSczMD6/6D1JzOUDmH3gZrZ3dudpG1SJ/aZSwnSuqsDebIz9oZBtbC7/SDykATu0oZTXl77QWH3oNreIDuD3F0dpJXoU3sMU9nG5ku6lop8N9RIAw9ccqvGoDGQWymIR0XUqk+PVF0qNjZPZXsMfWoCKUijrky8Qt0KyuIiWtMqnBdAAOG8phXRVORFKvM6rWC0KQQiqfAG8PEUnkY8ZUVW7hdg6arcTyk2UJlnKAWfsqIRSSwfSFDeDIaUN5FAhBtIlz4IhqQPkB4eytROBEPaCWQ+xkyu3mDI1fs4Mz33dUsw9KUdieGhzVXf0GIF8hmoPIC4sNBEmuweLbbca56kn9kzI+ngrIkgosHMLqu/90c/a31oQVSYxemu0ELNDCph0E0z+3cd8WshnMAb4jlaqP/rjuwPWelt2hYtfCHFutWhJ95vXTw8v6l/yh3dNyphPJMLMatDz6rHaJHhnwsXJQ+33R/z1d6l/dxxJK+GrHMVsvOUTOdNX+ztvKycaLnORo6Vg7sy9GRVFyspnhp2wIDKs+6cGTay5wI2rQj9nbpt8dTtuzVM4gW89JVlB7V/a1QLEUeMrEBDNaDkfvHht07TrVi/eObrrStUC7H6AJ0smH848MnPWUzn5swM9qNHzyxRO4KE/1XoRoZklk5aRy/bdX8KIJ8XLwhQ+ut3H526ylbLk7OsWogy29hlkL+LKPEHd25f+WXIdJf+T7xzQ8RkjG7wljW5duRRM+yYDvThMIpQjGP+79mtWKzW8yEV8snp9wsgWzh1a64De/Ay+NiEV0HOdXw8plhgsaaKoGohxuSigxKM9cOMN7GZTSIC8ZT33vi3BczG6AOIXYKS85mj+e443kYKokO/FsnQWUeZl84OvUZX618UFpIDvqMM6gAAAABJRU5ErkJggg==\" alt=\"Events\"></span>
    <strong>Events</strong>
</span>
";
    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        if (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "calledlisteners"))) {
            // line 14
            echo "        ";
            $this->displayBlock("panelContent", $context, $blocks);
            echo "
    ";
        } else {
            // line 16
            echo "        <h2>Events</h2>
        <p>
            <em>No events have been recorded. Are you sure that debugging is enabled in the kernel?</em>
        </p>
    ";
        }
    }

    // line 23
    public function block_panelContent($context, array $blocks = array())
    {
        // line 24
        echo "    <h2>Called Listeners</h2>

    <table>
        <tr>
            <th>Event name</th>
            <th>Listener</th>
        </tr>
        ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "calledlisteners"));
        foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
            // line 32
            echo "            <tr>
                <td><code>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "event"), "html", null, true);
            echo "</code></td>
                <td><code>";
            // line 34
            echo $context["__internal_d20b8fd60f519386060a3b30990b65d412b7fe5dbb1f62bc863d627f71a2289a"]->getdisplay_listener($this->getContext($context, "listener"));
            echo "</code></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "    </table>

    <h2>Not Called Listeners</h2>

    ";
        // line 41
        if ($this->getAttribute($this->getContext($context, "collector"), "notcalledlisteners")) {
            // line 42
            echo "        <table>
            <tr>
                <th>Event name</th>
                <th>Listener</th>
            </tr>
            ";
            // line 47
            $context["listeners"] = $this->getAttribute($this->getContext($context, "collector"), "notcalledlisteners");
            // line 48
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter(twig_get_array_keys_filter($this->getContext($context, "listeners"))));
            foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
                // line 49
                echo "                <tr>
                    <td><code>";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"), "event"), "html", null, true);
                echo "</code></td>
                    <td><code>";
                // line 51
                echo $context["__internal_d20b8fd60f519386060a3b30990b65d412b7fe5dbb1f62bc863d627f71a2289a"]->getdisplay_listener($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"));
                echo "</code></td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "        </table>
    ";
        } else {
            // line 56
            echo "        <p>
            <strong>No uncalled listeners</strong>.
        </p>
        <p>

            All listeners were called for this request or an error occurred
            when trying to collect uncalled listeners (in which case check the
            logs to get more information).

        </p>
    ";
        }
    }

    // line 69
    public function getdisplay_listener($_listener = null)
    {
        $context = $this->env->mergeGlobals(array(
            "listener" => $_listener,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 70
            echo "    ";
            if (($this->getAttribute($this->getContext($context, "listener"), "type") == "Closure")) {
                // line 71
                echo "        Closure
    ";
            } elseif (($this->getAttribute($this->getContext($context, "listener"), "type") == "Function")) {
                // line 73
                echo "        ";
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($this->getContext($context, "listener"), "file"), $this->getAttribute($this->getContext($context, "listener"), "line"));
                // line 74
                echo "        ";
                if ($this->getContext($context, "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "function"), "html", null, true);
                    echo "</a>";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "function"), "html", null, true);
                }
                // line 75
                echo "    ";
            } elseif (($this->getAttribute($this->getContext($context, "listener"), "type") == "Method")) {
                // line 76
                echo "        ";
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($this->getContext($context, "listener"), "file"), $this->getAttribute($this->getContext($context, "listener"), "line"));
                // line 77
                echo "        ";
                echo $this->env->getExtension('code')->abbrClass($this->getAttribute($this->getContext($context, "listener"), "class"));
                echo "::";
                if ($this->getContext($context, "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "method"), "html", null, true);
                    echo "</a>";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "method"), "html", null, true);
                }
                // line 78
                echo "    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:events.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 77,  185 => 75,  113 => 48,  104 => 42,  367 => 339,  353 => 328,  306 => 286,  232 => 122,  161 => 74,  184 => 80,  170 => 76,  150 => 71,  84 => 27,  65 => 11,  292 => 156,  287 => 153,  265 => 144,  257 => 141,  251 => 138,  233 => 131,  186 => 105,  167 => 71,  153 => 69,  148 => 67,  126 => 83,  195 => 89,  146 => 64,  58 => 18,  757 => 345,  751 => 341,  742 => 339,  738 => 338,  734 => 337,  728 => 334,  724 => 333,  710 => 325,  703 => 321,  696 => 317,  674 => 304,  667 => 300,  659 => 295,  645 => 290,  639 => 287,  635 => 286,  630 => 284,  566 => 222,  559 => 220,  553 => 217,  548 => 215,  543 => 214,  537 => 212,  531 => 210,  529 => 209,  525 => 208,  517 => 207,  512 => 204,  506 => 200,  501 => 198,  496 => 197,  490 => 195,  484 => 193,  482 => 192,  470 => 190,  459 => 183,  443 => 178,  412 => 166,  396 => 161,  390 => 159,  388 => 158,  329 => 139,  324 => 136,  274 => 148,  260 => 142,  256 => 103,  244 => 128,  222 => 94,  216 => 124,  206 => 87,  200 => 117,  127 => 60,  100 => 46,  350 => 327,  342 => 189,  284 => 112,  271 => 136,  267 => 135,  228 => 128,  215 => 104,  211 => 88,  178 => 76,  165 => 69,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 322,  762 => 347,  754 => 316,  745 => 310,  740 => 308,  723 => 293,  717 => 329,  711 => 291,  708 => 290,  695 => 284,  689 => 313,  681 => 308,  673 => 279,  664 => 277,  661 => 276,  658 => 275,  655 => 294,  651 => 272,  649 => 291,  646 => 270,  642 => 268,  640 => 267,  636 => 266,  631 => 265,  629 => 264,  626 => 263,  622 => 261,  619 => 260,  603 => 254,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 240,  549 => 239,  546 => 238,  530 => 232,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 181,  451 => 209,  447 => 207,  441 => 205,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 184,  371 => 153,  335 => 169,  318 => 164,  302 => 152,  293 => 157,  377 => 4,  354 => 192,  338 => 186,  330 => 183,  313 => 174,  308 => 287,  262 => 105,  242 => 116,  237 => 97,  231 => 96,  225 => 115,  223 => 114,  198 => 107,  194 => 83,  192 => 82,  155 => 69,  134 => 54,  129 => 63,  124 => 57,  110 => 22,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 191,  468 => 223,  465 => 187,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 156,  370 => 198,  349 => 144,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 166,  321 => 135,  317 => 134,  311 => 162,  303 => 165,  296 => 163,  275 => 154,  249 => 130,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 26,  449 => 180,  431 => 174,  418 => 170,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 190,  343 => 142,  334 => 88,  328 => 82,  323 => 80,  315 => 163,  304 => 67,  297 => 158,  290 => 115,  286 => 58,  282 => 57,  279 => 110,  276 => 137,  250 => 102,  207 => 119,  190 => 92,  188 => 76,  174 => 74,  152 => 67,  137 => 65,  118 => 49,  114 => 53,  97 => 41,  90 => 37,  81 => 41,  76 => 31,  180 => 55,  172 => 101,  77 => 34,  53 => 15,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 206,  440 => 148,  437 => 176,  435 => 175,  430 => 201,  427 => 200,  423 => 173,  413 => 134,  409 => 132,  407 => 164,  402 => 163,  398 => 129,  393 => 126,  387 => 187,  384 => 157,  381 => 120,  379 => 119,  374 => 182,  368 => 180,  365 => 149,  362 => 195,  360 => 147,  355 => 329,  341 => 141,  337 => 140,  322 => 165,  314 => 99,  312 => 98,  309 => 97,  305 => 160,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 107,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 77,  229 => 73,  220 => 70,  214 => 123,  177 => 80,  169 => 75,  140 => 53,  132 => 51,  128 => 58,  107 => 56,  61 => 23,  273 => 96,  269 => 145,  254 => 198,  243 => 88,  240 => 14,  238 => 125,  235 => 112,  230 => 11,  227 => 120,  224 => 127,  221 => 8,  219 => 125,  217 => 75,  208 => 92,  204 => 78,  179 => 69,  159 => 72,  143 => 69,  135 => 62,  119 => 58,  102 => 41,  71 => 23,  67 => 24,  63 => 21,  59 => 22,  93 => 38,  88 => 31,  78 => 18,  94 => 34,  89 => 30,  85 => 23,  75 => 24,  68 => 12,  56 => 11,  27 => 3,  201 => 92,  196 => 90,  183 => 83,  171 => 73,  166 => 75,  163 => 74,  158 => 79,  156 => 71,  151 => 63,  142 => 64,  138 => 56,  136 => 52,  121 => 50,  117 => 19,  105 => 18,  91 => 35,  62 => 24,  49 => 14,  87 => 34,  46 => 13,  44 => 11,  25 => 35,  21 => 2,  31 => 4,  38 => 12,  26 => 3,  28 => 3,  24 => 3,  19 => 1,  79 => 29,  72 => 27,  69 => 26,  47 => 8,  40 => 8,  37 => 7,  22 => 2,  246 => 135,  157 => 56,  145 => 66,  139 => 63,  131 => 61,  123 => 59,  120 => 20,  115 => 58,  111 => 47,  108 => 47,  101 => 43,  98 => 34,  96 => 37,  83 => 33,  74 => 27,  66 => 25,  55 => 16,  52 => 14,  50 => 18,  43 => 12,  41 => 10,  35 => 6,  32 => 5,  29 => 3,  209 => 161,  203 => 108,  199 => 98,  193 => 95,  189 => 86,  187 => 92,  182 => 90,  176 => 79,  173 => 77,  168 => 48,  164 => 70,  162 => 74,  154 => 61,  149 => 68,  147 => 70,  144 => 66,  141 => 48,  133 => 65,  130 => 36,  125 => 51,  122 => 43,  116 => 54,  112 => 58,  109 => 45,  106 => 45,  103 => 50,  99 => 36,  95 => 34,  92 => 28,  86 => 51,  82 => 28,  80 => 32,  73 => 16,  64 => 23,  60 => 12,  57 => 20,  54 => 19,  51 => 37,  48 => 16,  45 => 8,  42 => 11,  39 => 10,  36 => 8,  33 => 9,  30 => 5,);
    }
}
