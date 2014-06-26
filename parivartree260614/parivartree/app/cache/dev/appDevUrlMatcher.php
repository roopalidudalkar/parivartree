<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // admin_admin_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_homepage')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\DefaultController::indexAction',));
        }

        // tree_tree_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'tree_tree_homepage');
            }

            return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\HomeController::indexAction',  '_route' => 'tree_tree_homepage',);
        }

        if (0 === strpos($pathinfo, '/m')) {
            // tree_tree_mytree
            if (0 === strpos($pathinfo, '/mytree') && preg_match('#^/mytree(?:/(?P<nodeid>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_mytree')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::mytreeAction',  'nodeid' => 0,));
            }

            // tree_tree_member_register
            if ($pathinfo === '/member/register') {
                return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::registerAction',  '_route' => 'tree_tree_member_register',);
            }

        }

        if (0 === strpos($pathinfo, '/sms')) {
            // tree_tree_sms_verify
            if (0 === strpos($pathinfo, '/smsverify') && preg_match('#^/smsverify/(?P<mobilecode>[^/]++)/(?P<userhash>[^/]++)(?:/(?P<attempt>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_sms_verify')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::smsverifyAction',  'attempt' => 1,));
            }

            // tree_tree_sms_resend
            if (0 === strpos($pathinfo, '/sms/resend') && preg_match('#^/sms/resend/(?P<userhash>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_sms_resend')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::smsresendAction',));
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            // tree_tree_login
            if ($pathinfo === '/login') {
                return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::loginAction',  '_route' => 'tree_tree_login',);
            }

            // tree_tree_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::logoutAction',  '_route' => 'tree_tree_logout',);
            }

        }

        // admin_admin_login
        if ($pathinfo === '/directorship') {
            return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::loginAction',  '_route' => 'admin_admin_login',);
        }

        // tree_tree_addnode
        if (0 === strpos($pathinfo, '/node/add') && preg_match('#^/node/add/(?P<nodeid>[^/]++)/(?P<relationid>[^/]++)(?:/(?P<relnodeid>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_addnode')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\TreeController::addnodeAction',  'relnodeid' => 0,));
        }

        if (0 === strpos($pathinfo, '/directorship')) {
            // admin_admin_dashboard
            if ($pathinfo === '/directorship/dashboard') {
                return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::dashboardAction',  '_route' => 'admin_admin_dashboard',);
            }

            // admin_admin_userdetails
            if (0 === strpos($pathinfo, '/directorship/userdetails') && preg_match('#^/directorship/userdetails(?:/(?P<offset>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_userdetails')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::userdetailsAction',  'offset' => 1,));
            }

        }

        if (0 === strpos($pathinfo, '/member')) {
            // tree_tree_member_activate_email
            if (0 === strpos($pathinfo, '/member/emailactivation') && preg_match('#^/member/emailactivation/(?P<userid>[^/]++)/(?P<userhash>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_member_activate_email')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::emailactivationAction',));
            }

            // tree_tree_member_change_password
            if (0 === strpos($pathinfo, '/member/chnagepassword') && preg_match('#^/member/chnagepassword/(?P<sessionhash>[^/]++)(?:/(?P<attempt>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_member_change_password')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::changepasswordAction',  'attempt' => 0,));
            }

        }

        if (0 === strpos($pathinfo, '/directorship')) {
            // admin_admin_userprofile
            if (0 === strpos($pathinfo, '/directorship/userprofile') && preg_match('#^/directorship/userprofile/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_userprofile')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::userprofileAction',));
            }

            // admin_admin_deleteuser
            if (0 === strpos($pathinfo, '/directorship/deleteuser') && preg_match('#^/directorship/deleteuser/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_deleteuser')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::deleteuserAction',));
            }

            // admin_admin_updateuser
            if (0 === strpos($pathinfo, '/directorship/updateuser') && preg_match('#^/directorship/updateuser/(?P<email>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_updateuser')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::updateuserAction',));
            }

        }

        // tree_tree_test_node
        if ($pathinfo === '/test/node1') {
            return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\TestController::node1Action',  '_route' => 'tree_tree_test_node',);
        }

        if (0 === strpos($pathinfo, '/directorship/u')) {
            // admin_admin_users
            if (0 === strpos($pathinfo, '/directorship/userprofile') && preg_match('#^/directorship/userprofile/(?P<offset>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_users')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::usersAction',));
            }

            // admin_admin_update_user_data
            if (rtrim($pathinfo, '/') === '/directorship/updateuserdata') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_admin_update_user_data');
                }

                return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::updateuserdataAction',  '_route' => 'admin_admin_update_user_data',);
            }

        }

        if (0 === strpos($pathinfo, '/member')) {
            // tree_tree_updateprofile
            if (rtrim($pathinfo, '/') === '/member/updateprofile') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'tree_tree_updateprofile');
                }

                return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::updateprofileAction',  '_route' => 'tree_tree_updateprofile',);
            }

            // tree_tree_member_block_from_chat
            if (0 === strpos($pathinfo, '/member/blockfromchat') && preg_match('#^/member/blockfromchat/(?P<userid>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_member_block_from_chat')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::blockfromchatAction',));
            }

        }

        if (0 === strpos($pathinfo, '/directorship')) {
            // admin_admin_religion
            if (0 === strpos($pathinfo, '/directorship/religion') && preg_match('#^/directorship/religion(?:/(?P<offset>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_religion')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::religionAction',  'offset' => 1,));
            }

            if (0 === strpos($pathinfo, '/directorship/add')) {
                // admin_admin_addcommunity
                if (0 === strpos($pathinfo, '/directorship/addcommunity') && preg_match('#^/directorship/addcommunity/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_addcommunity')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::addcommunityAction',));
                }

                // admin_admin_addreligion
                if (rtrim($pathinfo, '/') === '/directorship/addreligion') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_admin_addreligion');
                    }

                    return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::addreligionAction',  '_route' => 'admin_admin_addreligion',);
                }

            }

            // admin_admin_deletereligion
            if (0 === strpos($pathinfo, '/directorship/deletereligion') && preg_match('#^/directorship/deletereligion/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_deletereligion')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::deletereligionAction',));
            }

            // admin_admin_editreligion
            if (0 === strpos($pathinfo, '/directorship/editreligion') && preg_match('#^/directorship/editreligion/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_editreligion')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::editreligionAction',));
            }

            // admin_admin_community
            if (0 === strpos($pathinfo, '/directorship/community') && preg_match('#^/directorship/community(?:/(?P<offset>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_community')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::communityAction',  'offset' => 1,));
            }

        }

        // tree_tree_blocklist
        if (rtrim($pathinfo, '/') === '/blocklist') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'tree_tree_blocklist');
            }

            return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::blocklistAction',  '_route' => 'tree_tree_blocklist',);
        }

        if (0 === strpos($pathinfo, '/directorship')) {
            // admin_admin_communityadd
            if (rtrim($pathinfo, '/') === '/directorship/communityadd') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_admin_communityadd');
                }

                return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::communityAddAction',  '_route' => 'admin_admin_communityadd',);
            }

            // admin_admin_deletecommunity
            if (0 === strpos($pathinfo, '/directorship/deletecommunity') && preg_match('#^/directorship/deletecommunity/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_deletecommunity')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::deletecommunityAction',));
            }

            // admin_admin_editcommunity
            if (0 === strpos($pathinfo, '/directorship/editcommunity') && preg_match('#^/directorship/editcommunity/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_editcommunity')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::editcommunityAction',));
            }

            // admin_admin_addgothra
            if (0 === strpos($pathinfo, '/directorship/addgothra') && preg_match('#^/directorship/addgothra/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_addgothra')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::addgothraAction',));
            }

            // admin_admin_gothra
            if (0 === strpos($pathinfo, '/directorship/gothra') && preg_match('#^/directorship/gothra(?:/(?P<offset>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_gothra')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::gothraAction',  'offset' => 1,));
            }

            // admin_admin_deletegothra
            if (0 === strpos($pathinfo, '/directorship/deletegothra') && preg_match('#^/directorship/deletegothra/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_deletegothra')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::deletegothraAction',));
            }

            // admin_admin_editgothra
            if (0 === strpos($pathinfo, '/directorship/editgothra') && preg_match('#^/directorship/editgothra/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_editgothra')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::editgothraAction',));
            }

            // admin_admin_gothraadd
            if (rtrim($pathinfo, '/') === '/directorship/gothraadd') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_admin_gothraadd');
                }

                return array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::gothraaddAction',  '_route' => 'admin_admin_gothraadd',);
            }

        }

        // tree_tree_rollback
        if ($pathinfo === '/rollback') {
            return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::rollbackAction',  '_route' => 'tree_tree_rollback',);
        }

        if (0 === strpos($pathinfo, '/directorship')) {
            // admin_admin_viewcommunity
            if (0 === strpos($pathinfo, '/directorship/viewcommunity') && preg_match('#^/directorship/viewcommunity/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_viewcommunity')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::viewcommunityAction',));
            }

            // admin_admin_inactiveusers
            if (0 === strpos($pathinfo, '/directorship/inactiveusers') && preg_match('#^/directorship/inactiveusers(?:/(?P<offset>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_inactiveusers')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::inactiveusersAction',  'offset' => 1,));
            }

            // admin_admin_lastaccessed
            if (0 === strpos($pathinfo, '/directorship/lastaccessed') && preg_match('#^/directorship/lastaccessed/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_lastaccessed')), array (  '_controller' => 'Admin\\AdminBundle\\Controller\\AdminController::lastaccessedAction',));
            }

        }

        if (0 === strpos($pathinfo, '/event')) {
            // tree_tree_events
            if ($pathinfo === '/events') {
                return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\EventController::indexAction',  '_route' => 'tree_tree_events',);
            }

            // tree_tree_event
            if (preg_match('#^/event/(?P<hash>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_event')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\EventController::loadEventAction',));
            }

        }

        // tree_tree_event_add
        if ($pathinfo === '/add/event') {
            return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\EventController::addeventAction',  '_route' => 'tree_tree_event_add',);
        }

        // tree_tree_messages
        if ($pathinfo === '/messages') {
            return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\MessageController::indexAction',  '_route' => 'tree_tree_messages',);
        }

        // tree_tree_event_join
        if (0 === strpos($pathinfo, '/join/event') && preg_match('#^/join/event/(?P<id>[^/]++)/(?P<author>[^/]++)/(?P<event>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_event_join')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\EventController::joineventAction',));
        }

        // tree_tree_event_maybe
        if (0 === strpos($pathinfo, '/maybe/event') && preg_match('#^/maybe/event/(?P<id>[^/]++)/(?P<author>[^/]++)/(?P<event>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_event_maybe')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\EventController::maybeeventAction',));
        }

        // tree_tree_event_decline
        if (0 === strpos($pathinfo, '/decline/event') && preg_match('#^/decline/event/(?P<id>[^/]++)/(?P<author>[^/]++)/(?P<event>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_event_decline')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\EventController::declineeventAction',));
        }

        // tree_tree_wall
        if (rtrim($pathinfo, '/') === '/wall') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'tree_tree_wall');
            }

            return array (  '_controller' => 'Tree\\TreeBundle\\Controller\\WallController::indexAction',  '_route' => 'tree_tree_wall',);
        }

        // admin_admin_viewtree
        if (0 === strpos($pathinfo, '/directorship/viewtree') && preg_match('#^/directorship/viewtree(?:/(?P<nodeid>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_admin_viewtree')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\UserController::mytreeAction',  'nodeid' => 0,));
        }

        // tree_tree_mytree1
        if (0 === strpos($pathinfo, '/mytree1') && preg_match('#^/mytree1(?:/(?P<nodeid>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'tree_tree_mytree1')), array (  '_controller' => 'Tree\\TreeBundle\\Controller\\TestController::mytreeAction',  'nodeid' => 0,));
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
