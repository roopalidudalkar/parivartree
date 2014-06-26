<?php

/* ::base_inner.html.twig */
class __TwigTemplate_3b0ef27067b9e5450954f3f21199531819181671e12782e0e948e4f9e127d794 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'header' => array($this, 'block_header'),
            'mainbody' => array($this, 'block_mainbody'),
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
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/Node.css"), "html", null, true);
        echo "\"/>
\t\t<link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jquery.jOrgChart.css"), "html", null, true);
        echo "\"/>
\t\t<link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/prettify.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t\t<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/chat.css"), "html", null, true);
        echo "\" />
\t\t<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/screen.css"), "html", null, true);
        echo "\" />
\t\t<!--[if lte IE 7]>
\t\t<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/screen_ie.css"), "html", null, true);
        echo "\" />
\t\t<![endif]-->

\t\t<script src=\"http://code.jquery.com/jquery-1.10.2.min.js\"></script>
\t\t<script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>



\t\t<!-- jQuery includes -->
\t\t<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js\"></script>
\t\t<script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jqueryjOrgChart.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t\t<script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
\t\t<script>
\t\t\t\tjQuery(document).ready(function() {
\t\t\t\t\t\$(\"#org\").jOrgChart({
\t\t\t\t\tchartElement : '#chart',
\t\t\t\t\tdragAndDrop  : false
\t\t\t\t});\t
        
\t\t\t\t\$('#chart').hover(function() {
\t\t\t\t\t\$(this).css('cursor','pointer');
\t\t\t\t\t}, function() {
\t\t\t\t\t\$(this).css('cursor','auto');
\t\t\t\t});
\t
\t\t\t\t\$('div.Node').hover(
\t\t\t\tfunction() { 
\t\t\t\t\tvar \$class = \$(this).attr('class');
\t\t\t\t\t\$(this).parent().find('.Node-bottom').show();
\t\t\t\t
\t\t\t\t},
\t\t\t\tfunction() { 
\t\t\t\t\tvar \$class = \$(this).attr('class');
\t\t\t\t\t\$(this).parent().find(\".Node-bottom\").hide();
\t\t\t\t
\t\t\t\t}
\t
\t\t\t);
\t
\t\t\t\$('.add-relation').click(function(ev) {
\t\t\t\tev.preventDefault(); // preventDefault should suffice, no return false
    
\t\t\tvar \$parentobj = \$(this).parent();
\t\t\tvar \$opt = \$(\$parentobj).find(\".Node-title\").attr('id');
\t\t\tvar \$genderid = \$(\$parentobj).find(\"div[class^='profile-img']\").attr('id');
\t\t\tvar \$host = window.location.host;

\t\t\t\$('#myModal').modal();
\t\t\t
\t\t\t\t\$('div[id^=\"modalpop\"]').click(function(ev) {
\t\t\t\t\tev.preventDefault(); // preventDefault should suffice, no return false
\t\t\t\t\t\$('#myModal').modal('hide');
\t\t\t\t\t
\t\t\t\t\tvar \$relationid = \$(this).attr('id');
\t\t\t\t\tvar \$ids = \$relationid.split('-');
\t\t\t\t\t\$('#form_nodeid').val(\$opt);
\t\t\t\t\tif(\$ids[1]==3 && \$genderid == 2)
\t\t\t\t\t{
\t\t\t\t\t\t\t\$ids[1] = 8;
\t\t\t\t\t}
\t\t\t\t\t\$('#form_relationid').val(\$ids[1]);\t
\t\t\t\t\tvar \$modalLabel = '';
\t\t\t\t\tswitch (\$ids[1]){
\t\t\t\t\t\tcase '1' : \$modalLabel = 'Father';
\t\t\t\t\t\t\t\t  break;
\t\t\t\t\t\tcase '2' : \$modalLabel = 'Mother';
\t\t\t\t\t\t\t\t  break;
\t\t\t\t\t\tcase '3' : \$modalLabel = 'Wife';
\t\t\t\t\t\t\t\t  break;
\t\t\t\t\t\tcase '4' : \$modalLabel = 'Brother';
\t\t\t\t\t\t\t\t  break;
\t\t\t\t\t\tcase '5' : \$modalLabel = 'Sister';
\t\t\t\t\t\t\t\t  break;
\t\t\t\t\t\tcase '6' : \$modalLabel = 'Son';
\t\t\t\t\t\t\t\t  break;
\t\t\t\t\t\tcase '7' : \$modalLabel = 'Daughter';
\t\t\t\t\t\t\t\t  break;
\t\t\t\t\t\tcase '8' : \$modalLabel = 'Husband';
\t\t\t\t\t\t\t\t  break;
\t\t\t\t\t
\t\t\t\t\t}
\t\t\t\t\t\$('#myModalFormLabel').html('Creating '+\$modalLabel);
\t\t\t\t\t\$('#AddNode').modal();
\t\t\t\t});
\t\t\t});
\t\t\t
\t\t\t\$('#notification-dropdown').click(function(){
\t\t\t\t\$.ajax({url:'";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("hide-notification.php"), "html", null, true);
        echo "', data:{'type':'notification','userid': '";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "get", array(0 => "uid"), "method"), "html", null, true);
        echo "' }, success:function(result){
\t\t\t\t\t
\t\t\t\t\t}\t
\t\t\t\t});
\t\t\t\t
\t\t\t});
\t\t\t
\t\t\t\$('#message-dropdown').click(function(){
\t\t\t\t
\t\t\t\t\$.ajax({url:'";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("hide-notification.php"), "html", null, true);
        echo "', data:{'type':'message','userid': '";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "get", array(0 => "uid"), "method"), "html", null, true);
        echo "' }, success:function(result){
\t\t\t\t\t
\t\t\t\t\t}\t
\t\t\t\t});
\t\t\t\t
\t\t\t});
\t\t\t
\t\t\t\$(\"#chart\").draggable();
\t\t});
\t\t</script>
</head>
    
<body>




";
        // line 138
        $this->displayBlock('header', $context, $blocks);
        // line 249
        echo "
";
        // line 250
        $this->displayBlock('mainbody', $context, $blocks);
        // line 254
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/chat.js"), "html", null, true);
        echo "\"></script>
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

    // line 138
    public function block_header($context, array $blocks = array())
    {
        // line 139
        echo "
\t";
        // line 140
        $context["username"] = $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "get", array(0 => "name"), "method");
        echo "\t
<div class=\"header-top-block\">
\t\t<div class=\"container clear-both\">
\t\t\t<div class=\"col-md-2\"><a href=\"#\"><img src=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo1.png"), "html", null, true);
        echo "\" ></a></div>
\t\t\t<div class=\"col-md-4 search-bar clear-both\">
\t\t\t\t<form class=\"navbar-form form-group\" method=\"post\" action=\"search-result.php\">
\t\t\t\t\t<input class=\"form-control\" type=\"text\" value=\"\" placeholder=\"Search People\" required=\"\" name=\"srch\">
\t\t\t\t</form>
\t\t\t</div>
\t\t\t<div class=\"col-md-2 profile-name\">
\t\t\t\t<span></span>
\t\t\t\t<button type=\"button\" class=\"btn btn-link dropdown-toggle profile-username\" data-toggle=\"dropdown\">";
        // line 151
        echo twig_escape_filter($this->env, $this->getContext($context, "username"), "html", null, true);
        echo "<b class=\"caret\"></b></button>
\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t<li><a href=\"#\">Settings</a><li>
\t\t\t\t\t\t<li><a role=\"menuitem\" tabindex=\"-1\" href=\"";
        // line 154
        echo $this->env->getExtension('routing')->getPath("tree_tree_rollback");
        echo "\">Logout</a></li>
\t\t\t\t\t</ul>
\t\t\t</div>
\t        <div class=\"col-md-2 mess-block\">
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"active\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" id=\"message-dropdown\"><img src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/message.png"), "html", null, true);
        echo "\" >";
        if (($this->getContext($context, "mcount") > 0)) {
            echo "<span>";
            echo twig_escape_filter($this->env, $this->getContext($context, "mcount"), "html", null, true);
            echo "</span>";
        }
        echo " </a>
\t\t\t\t\t\t<ul class=\"dropdown-menu message-dropdown\">
\t\t\t\t\t\t\t<div class=\"message-header\">Inbox</div>
\t\t\t\t\t\t\t<div class=\"notifications\">
\t\t\t\t\t\t\t\t";
        // line 163
        if (($this->getContext($context, "mcount") > 0)) {
            // line 164
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "messages"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 165
                echo "\t\t\t\t\t\t\t\t\t\t<li class=\"new-item\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"message-dropdown-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"thumbnail\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"message-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h1>";
                // line 171
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "firstname", array(), "array"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "lastname", array(), "array"), "html", null, true);
                echo "</h1>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p>";
                // line 172
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "message", array(), "array"), "html", null, true);
                echo "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<b>";
                // line 173
                if ((twig_date_format_filter($this->env, "now", "Y") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "sent", array(), "array"), "Y"))) {
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 174
                    if ((twig_date_format_filter($this->env, "now", "d") == twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "sent", array(), "array"), "d"))) {
                        // line 175
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "sent", array(), "array"), "h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 177
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "sent", array(), "array"), "dS M h:i a"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 179
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t   ";
                } else {
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 180
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "sent", array(), "array"), "dS M  Y h:i a"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 182
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</b>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 187
            echo "\t\t\t\t\t\t\t\t";
        } else {
            // line 188
            echo "\t\t\t\t\t\t\t\t\t\t<li class=\"new-item\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"message-dropdown-block\">
\t\t\t\t\t\t\t\t\t\t\t\tNo New Messages
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
        }
        // line 194
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>
\t\t\t\t\t<li><a href=\"#\" class=\"dropdown-toggle\" id=\"notification-dropdown\" data-toggle=\"dropdown\"><img src=\"";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/notification.png"), "html", null, true);
        echo "\" >";
        if (($this->getContext($context, "ncount") > 0)) {
            echo "<span>";
            echo twig_escape_filter($this->env, $this->getContext($context, "ncount"), "html", null, true);
            echo "</span>";
        }
        echo "</a> 
\t\t\t\t\t\t<ul class=\"dropdown-menu message-dropdown notification\">
\t\t\t\t\t\t\t<div class=\"message-header\">Notifications  <b class=\"pull-right\"><a href=\"";
        // line 200
        echo $this->env->getExtension('routing')->getPath("tree_tree_events");
        echo "\">view all</a></b></div>
\t\t\t\t\t\t\t<div class=\"notifications\">
\t\t\t\t\t\t\t\t";
        // line 202
        if (($this->getContext($context, "ncount") > 0)) {
            // line 203
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "notifs"));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 204
                echo "\t\t\t\t\t\t\t\t\t\t<li class=\"new-item\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"message-dropdown-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"message-content-notification\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 207
                if (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 1)) {
                    // line 208
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                    echo " has invited you for an ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "event", array(), "array"), "html", null, true);
                    echo ".</a> </p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 2)) {
                    // line 210
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                    echo " has posted ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "post", array(), "array"), "html", null, true);
                    echo " on your wall.</a> </p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 3)) {
                    // line 212
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                    echo " was added to your tree by ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "addedby", array(), "array"), "html", null, true);
                    echo "</a> </p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 4)) {
                    // line 214
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                    echo " has invited to join the family as ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "relationname", array(), "array"), "html", null, true);
                    echo "</a> </p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($this->getContext($context, "data"), "notificationtype", array(), "array") == 5)) {
                    // line 216
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("tree_tree_event", array("hash" => 123));
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "entityname", array(), "array"), "html", null, true);
                    echo " has accepted the Invitation to join the event ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "event", array(), "array"), "html", null, true);
                    echo "</a> </p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 218
                echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 222
            echo "\t\t\t\t\t\t\t\t";
        } else {
            // line 223
            echo "\t\t\t\t\t\t\t\t\t<li class=\"new-item\">
\t\t\t\t\t\t\t\t\t\t<div class=\"message-dropdown-block\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"message-content\">
\t\t\t\t\t\t\t\t\t\t\t\t<p> You do not have any New notifications </p>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
        }
        // line 231
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"col-md-2 menu\">
\t\t\t\t<ul>
\t\t\t\t\t<li><a href=\"";
        // line 238
        echo $this->env->getExtension('routing')->getPath("tree_tree_mytree");
        echo "\">Tree View</a></li>
\t\t\t\t\t<li><a href=\"#\">Gallery</a></li>
\t\t\t\t\t<li><a href=\"#/\">Timeline</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 241
        echo $this->env->getExtension('routing')->getPath("tree_tree_events");
        echo "\">Events</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</div>
</div>\t

";
    }

    // line 250
    public function block_mainbody($context, array $blocks = array())
    {
        // line 251
        echo "
\t
";
    }

    public function getTemplateName()
    {
        return "::base_inner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  508 => 251,  505 => 250,  493 => 241,  487 => 238,  478 => 231,  468 => 223,  465 => 222,  456 => 218,  446 => 216,  436 => 214,  426 => 212,  416 => 210,  406 => 208,  404 => 207,  399 => 204,  392 => 202,  376 => 198,  370 => 194,  349 => 182,  344 => 180,  339 => 179,  333 => 177,  327 => 175,  325 => 174,  321 => 173,  317 => 172,  311 => 171,  303 => 165,  296 => 163,  275 => 154,  249 => 139,  212 => 254,  210 => 250,  205 => 138,  23 => 1,  70 => 26,  449 => 159,  431 => 146,  418 => 143,  414 => 142,  394 => 203,  386 => 123,  372 => 115,  364 => 113,  359 => 187,  351 => 109,  346 => 108,  343 => 107,  334 => 88,  328 => 82,  323 => 80,  315 => 75,  304 => 67,  297 => 63,  290 => 59,  286 => 58,  282 => 57,  279 => 56,  276 => 55,  250 => 197,  207 => 249,  190 => 92,  188 => 88,  174 => 52,  152 => 43,  137 => 38,  118 => 32,  114 => 31,  97 => 20,  90 => 36,  81 => 38,  76 => 36,  180 => 55,  172 => 101,  77 => 19,  53 => 18,  34 => 6,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 157,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 144,  413 => 134,  409 => 132,  407 => 131,  402 => 133,  398 => 129,  393 => 126,  387 => 200,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 114,  365 => 111,  362 => 188,  360 => 109,  355 => 110,  341 => 105,  337 => 89,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 164,  294 => 90,  285 => 89,  283 => 159,  278 => 86,  268 => 85,  264 => 84,  258 => 143,  252 => 140,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 112,  140 => 39,  132 => 51,  128 => 49,  107 => 36,  61 => 22,  273 => 96,  269 => 151,  254 => 198,  243 => 88,  240 => 14,  238 => 85,  235 => 12,  230 => 11,  227 => 10,  224 => 71,  221 => 8,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 45,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 11,  67 => 26,  63 => 15,  59 => 14,  93 => 19,  88 => 6,  78 => 33,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 26,  56 => 20,  27 => 4,  201 => 92,  196 => 90,  183 => 121,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 44,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 33,  117 => 44,  105 => 40,  91 => 27,  62 => 13,  49 => 17,  87 => 17,  46 => 7,  44 => 17,  25 => 3,  21 => 2,  31 => 4,  38 => 7,  26 => 1,  28 => 3,  24 => 4,  19 => 1,  79 => 18,  72 => 16,  69 => 17,  47 => 10,  40 => 11,  37 => 10,  22 => 1,  246 => 138,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 18,  66 => 14,  55 => 15,  52 => 19,  50 => 11,  43 => 8,  41 => 6,  35 => 5,  32 => 8,  29 => 3,  209 => 161,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 84,  176 => 64,  173 => 65,  168 => 48,  164 => 59,  162 => 57,  154 => 58,  149 => 42,  147 => 58,  144 => 49,  141 => 48,  133 => 37,  130 => 36,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 28,  106 => 27,  103 => 35,  99 => 31,  95 => 28,  92 => 21,  86 => 35,  82 => 34,  80 => 41,  73 => 19,  64 => 17,  60 => 14,  57 => 23,  54 => 10,  51 => 22,  48 => 18,  45 => 17,  42 => 16,  39 => 16,  36 => 5,  33 => 7,  30 => 7,);
    }
}
