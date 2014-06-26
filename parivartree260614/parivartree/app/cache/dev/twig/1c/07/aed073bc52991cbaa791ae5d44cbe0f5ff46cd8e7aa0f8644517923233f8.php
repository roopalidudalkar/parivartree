<?php

/* TreeTreeBundle:Event:index.html.twig */
class __TwigTemplate_1c07aed073bc52991cbaa791ae5d44cbe0f5ff46cd8e7aa0f8644517923233f8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base_inner.html.twig");

        $this->blocks = array(
            'mainbody' => array($this, 'block_mainbody'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base_inner.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_mainbody($context, array $blocks = array())
    {
        // line 4
        echo "<script>
jQuery(document).ready(function(){

\t\$.urlParam = function(name){
\t\tvar results = new RegExp('[\\?&amp;]' + name + '=([^&amp;#]*)').exec(window.location.href);
\t\treturn results[1] || 0;
\t}



\t\$('#createevent').click(function(){
\t\t\t\$('#AddEvent').modal();
\t});

\t\$('a[class^=\"eventsLink\"]').click(function(){
\t\t\$('#eventdetails').html('<img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/loading.gif"), "html", null, true);
        echo "\">');
\t\tvar \$eventid = \$(this).attr('id');
\t\t\$.ajax({url:'";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("fetchEvents.php"), "html", null, true);
        echo "', data:{'userid':'";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "get", array(0 => "uid"), "method"), "html", null, true);
        echo "','eventid':\$eventid }, success:function(result) {
\t\t\t
\t\t\t\tsetTimeout(function(){ \$('#eventdetails').html(result); }, 2000);
\t\t\t\t
\t\t\t}
\t\t});
\t});
\t
\t
\tif(\$.urlParam('hash')!=''){
\t\t\$.ajax({url:'";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("fetchEvents.php"), "html", null, true);
        echo "', data:{'userid':'";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "get", array(0 => "uid"), "method"), "html", null, true);
        echo "','eventid':\$.urlParam('hash') }, success:function(result) {
\t\t\t\t
\t\t\t\t\tsetTimeout(function(){ \$('#eventdetails').html(result); }, 1000);
\t\t\t\t\t
\t\t\t\t}
\t\t\t});
\t}
\telse
\t{
\t\t\$.ajax({url:'";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("fetchEvents.php"), "html", null, true);
        echo "', data:{'userid':'";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "get", array(0 => "uid"), "method"), "html", null, true);
        echo "','eventid':\$('a[class=\"eventsLink1\"]').attr('id') }, success:function(result) {
\t\t\t\t
\t\t\t\t\tsetTimeout(function(){ \$('#eventdetails').html(result); }, 1000);
\t\t\t\t\t
\t\t\t\t}
\t\t\t});
\t}
});
</script>
<div class=\"container events-block innerpage\">
\t<div class=\"col-md-3 clear-both\">
\t\t<div class=\"event-left-block\">
\t\t<div class=\"events-header\">My Events</div>
\t\t\t";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "myevents"));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            echo " 
\t\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t\t<h1>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "firstname", array(), "array"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "lastname", array(), "array"), "html", null, true);
            echo "</h1>
\t\t\t\t\t\t\t<p><a href=\"#\" class=\"eventsLink1\" id=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventname", array(), "array"), "html", null, true);
            echo "</a> </p>
\t\t\t\t\t\t\t<b>";
            // line 59
            if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "Y"))) {
                echo " 
\t\t\t\t\t\t\t\t\t";
                // line 60
                if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "d"))) {
                    // line 61
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "h:i a"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 63
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "dS M h:i a"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                }
                // line 65
                echo "\t\t\t\t\t\t\t\t";
            } else {
                echo " 
\t\t\t\t\t\t\t\t\t";
                // line 66
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                echo " 
\t\t\t\t\t\t\t\t";
            }
            // line 68
            echo "\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t \t 
\t\t\t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo " 
\t\t<div class=\"events-header\">Up Coming Events</div>
\t\t \t";
        // line 74
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "events"));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            echo " 
\t\t \t";
            // line 75
            if ((twig_date_format_filter($this->env, "now", "Y-m-d") < twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "Y-m-d"))) {
                echo " 
\t\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t\t<h1>";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "firstname", array(), "array"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "lastname", array(), "array"), "html", null, true);
                echo "</h1>
\t\t\t\t\t\t\t<p><a href=\"#\" class=\"eventsLink\" id=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "id", array(), "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventname", array(), "array"), "html", null, true);
                echo "</a> </p>
\t\t\t\t\t\t\t<b>";
                // line 81
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 82
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "d"))) {
                        // line 83
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 85
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 87
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 88
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t";
                }
                // line 90
                echo "\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t \t";
            }
            // line 94
            echo "\t\t\t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " 
\t\t<div class=\"events-header\">Recent Events</div>
\t\t\t";
        // line 96
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "events"));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            echo " 
\t\t\t\t";
            // line 97
            if ((twig_date_format_filter($this->env, "now", "Y-m-d") > twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "Y-m-d"))) {
                echo " 
\t\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t\t<h1>";
                // line 101
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "firstname", array(), "array"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "lastname", array(), "array"), "html", null, true);
                echo "</h1>
\t\t\t\t\t\t\t<p><a href=\"#\" class=\"eventsLink\" id=\"";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "id", array(), "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventname", array(), "array"), "html", null, true);
                echo "</a> </p>
\t\t\t\t\t\t\t<b>";
                // line 103
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 104
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "d"))) {
                        // line 105
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 107
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 109
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 110
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "event"), "eventdate", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t";
                }
                // line 112
                echo "\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t \t";
            }
            // line 115
            echo " 
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo " 
\t\t</div>
\t</div>
\t

\t<div class=\"col-md-6 event-middle-cont\">
\t\t<div class=\"event-middle-block\">
\t\t
\t\t\t<div class=\"row event-middle-header\">
\t\t\t\t<div class=\"col-md-9\"><h4>Create a Event</h4></div>
\t\t\t\t<div class=\"col-md-3 clear-right\"><a href=\"#\" id=\"createevent\"  class=\"btn btn-primary btn-sm btn-block\">CREATE</a></div>
\t\t\t</div>
\t\t\t<div id=\"eventdetails\"></div>
\t\t</div>
\t</div>
\t<div class=\"col-md-3 clear-both\">
\t\t<div class=\"event-left-block\">
\t\t<div class=\"events-header\">Notification</div>
\t\t";
        // line 134
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "notifs"));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 135
            echo "\t\t\t";
            if (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 1)) {
                // line 136
                echo "\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t<p><a href=\"";
                // line 139
                echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                echo " has invited you for an ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "event", array(), "array"), "html", null, true);
                echo ".</a> </p>
\t\t\t\t\t\t<b>";
                // line 140
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 141
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "d"))) {
                        // line 142
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 144
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 146
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 147
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t";
                }
                // line 149
                echo "\t\t\t\t\t\t</b>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 2)) {
                // line 153
                echo "\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t<p><a href=\"";
                // line 156
                echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                echo " has posted ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "post", array(), "array"), "html", null, true);
                echo " on your wall.</a> </p>
\t\t\t\t\t\t<b>";
                // line 157
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 158
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "d"))) {
                        // line 159
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 161
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 163
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 164
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t";
                }
                // line 166
                echo "\t\t\t\t\t\t</b>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 3)) {
                // line 170
                echo "\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t<p><a href=\"";
                // line 173
                echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                echo " was added to your tree by ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "addedby", array(), "array"), "html", null, true);
                echo "</a> </p>
\t\t\t\t\t\t<b>";
                // line 174
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 175
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "d"))) {
                        // line 176
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 178
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 180
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 181
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t";
                }
                // line 183
                echo "\t\t\t\t\t\t</b>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 4)) {
                // line 187
                echo "\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t<p><a href=\"";
                // line 190
                echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                echo " has invited to join the family as ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "relationname", array(), "array"), "html", null, true);
                echo "</a> </p>
\t\t\t\t\t\t<b>";
                // line 191
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 192
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "d"))) {
                        // line 193
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 195
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 197
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 198
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t";
                }
                // line 200
                echo "\t\t\t\t\t\t</b>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 5)) {
                // line 204
                echo "\t\t\t\t<div class=\"event-user\">
\t\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t\t<p><a href=\"";
                // line 207
                echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                echo " has accepted the Invitation to join the event ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "event", array(), "array"), "html", null, true);
                echo "</a> </p>
\t\t\t\t\t\t<b>";
                // line 208
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 209
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "d"))) {
                        // line 210
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 212
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 214
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 215
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "created", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t";
                }
                // line 217
                echo "\t\t\t\t\t\t</b>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            }
            // line 220
            echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 222
        echo "\t\t\t
\t\t</div>
\t\t<div class=\"event-left-block\">
\t\t<div class=\"events-header\">Acivity Stream</div>
\t\t\t<div class=\"event-user\">
\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t<h1>Rahul Heaven</h1>
\t\t\t\t\t<p>Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"event-user\">
\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t<h1>Rahul Heaven</h1>
\t\t\t\t\t<p>Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"event-user unread\">
\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t<h1>Rahul Heaven</h1>
\t\t\t\t\t<p>Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"event-user\">
\t\t\t\t<div class=\"thumb\"></div>
\t\t\t\t<div class=\"event-user-cont\">
\t\t\t\t\t<h1>Rahul Heaven</h1>
\t\t\t\t\t<p>Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar Foo Bar</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t</div>
\t\t
\t\t
\t\t
\t</div>
\t
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

<!-- Modal -->
<div class=\"modal fade\" id=\"AddEvent\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-addnode\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\" id=\"myModalFormLabel\">Create Event</h4>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t
\t\t\t\t\t\t<div class=\"create-event-cont\">
\t\t\t\t\t\t";
        // line 284
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_start');
        echo "
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
        // line 286
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "event"), 'label');
        echo "
\t\t\t\t\t\t\t\t";
        // line 287
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "event"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
        // line 290
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "eventname"), 'label');
        echo "
\t\t\t\t\t\t\t\t";
        // line 291
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "eventname"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
        // line 294
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "eventdate"), 'label');
        echo "
\t\t\t\t\t\t\t\t";
        // line 295
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "eventdate"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"addressinfo\"><h1>Event Venue:</h1>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 300
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "housenumber"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 304
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "streetnumber"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 308
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "pincode"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 313
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "location"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 317
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "city"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 321
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "state"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 325
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "country"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 329
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "address"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
        // line 333
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "eventdescription"), 'label');
        echo "
\t\t\t\t\t\t\t\t";
        // line 334
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "eventdescription"), 'widget');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
        // line 337
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "reach"), 'widget');
        echo "
\t\t\t\t\t\t\t\t";
        // line 338
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "reach"), 'widget'));
        foreach ($context['_seq'] as $context["_key"] => $context["radio"]) {
            // line 339
            echo "\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "radio"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['radio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 341
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group pull-right\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default\">Cancel</button>
\t\t\t\t\t\t\t";
        // line 345
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "submit"), 'row');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        // line 347
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_end');
        echo "\t
\t\t\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>  



";
    }

    public function getTemplateName()
    {
        return "TreeTreeBundle:Event:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  757 => 345,  751 => 341,  742 => 339,  738 => 338,  734 => 337,  728 => 334,  724 => 333,  710 => 325,  703 => 321,  696 => 317,  674 => 304,  667 => 300,  659 => 295,  645 => 290,  639 => 287,  635 => 286,  630 => 284,  566 => 222,  559 => 220,  553 => 217,  548 => 215,  543 => 214,  537 => 212,  531 => 210,  529 => 209,  525 => 208,  517 => 207,  512 => 204,  506 => 200,  501 => 198,  496 => 197,  490 => 195,  484 => 193,  482 => 192,  470 => 190,  459 => 183,  443 => 178,  412 => 166,  396 => 161,  390 => 159,  388 => 158,  329 => 139,  324 => 136,  274 => 109,  260 => 104,  256 => 103,  244 => 101,  222 => 94,  216 => 90,  206 => 87,  200 => 85,  127 => 61,  100 => 53,  350 => 191,  342 => 189,  284 => 112,  271 => 136,  267 => 135,  228 => 108,  215 => 104,  211 => 88,  178 => 76,  165 => 69,  20 => 1,  809 => 338,  802 => 334,  794 => 331,  786 => 328,  778 => 325,  770 => 322,  762 => 347,  754 => 316,  745 => 310,  740 => 308,  723 => 293,  717 => 329,  711 => 291,  708 => 290,  695 => 284,  689 => 313,  681 => 308,  673 => 279,  664 => 277,  661 => 276,  658 => 275,  655 => 294,  651 => 272,  649 => 291,  646 => 270,  642 => 268,  640 => 267,  636 => 266,  631 => 265,  629 => 264,  626 => 263,  622 => 261,  619 => 260,  603 => 254,  597 => 251,  589 => 250,  581 => 249,  572 => 247,  569 => 246,  564 => 245,  560 => 243,  557 => 242,  554 => 241,  551 => 240,  549 => 239,  546 => 238,  530 => 232,  524 => 229,  516 => 228,  499 => 225,  491 => 223,  488 => 222,  477 => 214,  473 => 213,  463 => 212,  454 => 181,  451 => 209,  447 => 207,  441 => 205,  438 => 204,  434 => 202,  411 => 194,  405 => 191,  397 => 190,  383 => 185,  378 => 184,  371 => 153,  335 => 169,  318 => 164,  302 => 152,  293 => 157,  377 => 4,  354 => 192,  338 => 186,  330 => 183,  313 => 174,  308 => 161,  262 => 105,  242 => 116,  237 => 97,  231 => 96,  225 => 115,  223 => 114,  198 => 107,  194 => 83,  192 => 82,  155 => 69,  134 => 64,  129 => 63,  124 => 46,  110 => 57,  508 => 227,  505 => 250,  493 => 241,  487 => 238,  478 => 191,  468 => 223,  465 => 187,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 156,  370 => 198,  349 => 144,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 166,  321 => 135,  317 => 134,  311 => 162,  303 => 165,  296 => 163,  275 => 154,  249 => 139,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 26,  449 => 180,  431 => 174,  418 => 170,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 190,  343 => 142,  334 => 88,  328 => 82,  323 => 80,  315 => 163,  304 => 67,  297 => 116,  290 => 115,  286 => 58,  282 => 57,  279 => 110,  276 => 137,  250 => 102,  207 => 102,  190 => 92,  188 => 81,  174 => 52,  152 => 43,  137 => 65,  118 => 42,  114 => 31,  97 => 20,  90 => 33,  81 => 50,  76 => 36,  180 => 55,  172 => 101,  77 => 19,  53 => 21,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 206,  440 => 148,  437 => 176,  435 => 175,  430 => 201,  427 => 200,  423 => 173,  413 => 134,  409 => 132,  407 => 164,  402 => 163,  398 => 129,  393 => 126,  387 => 187,  384 => 157,  381 => 120,  379 => 119,  374 => 182,  368 => 180,  365 => 149,  362 => 195,  360 => 147,  355 => 146,  341 => 141,  337 => 140,  322 => 165,  314 => 99,  312 => 98,  309 => 97,  305 => 160,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 107,  264 => 84,  258 => 126,  252 => 140,  247 => 121,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 75,  140 => 53,  132 => 51,  128 => 49,  107 => 56,  61 => 22,  273 => 96,  269 => 151,  254 => 198,  243 => 88,  240 => 14,  238 => 85,  235 => 112,  230 => 11,  227 => 10,  224 => 107,  221 => 8,  219 => 105,  217 => 75,  208 => 111,  204 => 72,  179 => 69,  159 => 72,  143 => 67,  135 => 53,  119 => 42,  102 => 37,  71 => 27,  67 => 26,  63 => 15,  59 => 14,  93 => 53,  88 => 52,  78 => 33,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 31,  56 => 21,  27 => 4,  201 => 92,  196 => 90,  183 => 121,  171 => 61,  166 => 71,  163 => 74,  158 => 67,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 52,  121 => 59,  117 => 44,  105 => 40,  91 => 27,  62 => 13,  49 => 17,  87 => 32,  46 => 7,  44 => 17,  25 => 4,  21 => 2,  31 => 4,  38 => 7,  26 => 1,  28 => 3,  24 => 3,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 14,  40 => 11,  37 => 10,  22 => 1,  246 => 138,  157 => 56,  145 => 46,  139 => 65,  131 => 52,  123 => 47,  120 => 40,  115 => 58,  111 => 37,  108 => 36,  101 => 55,  98 => 31,  96 => 31,  83 => 31,  74 => 18,  66 => 14,  55 => 15,  52 => 20,  50 => 18,  43 => 8,  41 => 11,  35 => 5,  32 => 8,  29 => 5,  209 => 161,  203 => 108,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 80,  176 => 79,  173 => 74,  168 => 48,  164 => 59,  162 => 57,  154 => 61,  149 => 68,  147 => 57,  144 => 66,  141 => 48,  133 => 63,  130 => 36,  125 => 60,  122 => 43,  116 => 41,  112 => 58,  109 => 57,  106 => 38,  103 => 35,  99 => 36,  95 => 54,  92 => 21,  86 => 35,  82 => 40,  80 => 30,  73 => 19,  64 => 25,  60 => 14,  57 => 23,  54 => 19,  51 => 22,  48 => 19,  45 => 17,  42 => 16,  39 => 16,  36 => 7,  33 => 7,  30 => 7,);
    }
}
