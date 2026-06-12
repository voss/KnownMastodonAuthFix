<?php

    /**
     * Plugin administration
     */

    namespace IdnoPlugins\Mastodon\Pages {

        /**
         * Default class to serve the homepage
         */
        class Deauth extends \Idno\Common\Page
        {

            function getContent()
            {
                $this->gatekeeper(); // Logged-in users only
                if ($mastodon = \Idno\Core\Idno::site()->plugins()->get('Mastodon')) {
                    if ($user = \Idno\Core\Idno::site()->session()->currentUser()) {
                        if ($remove = $this->getInput('remove')) {
                            \Idno\Core\Idno::site()->logging()->log("Mastodon: DEBUG account to delete: " . $remove . " /DEBUG");
                            if (is_array($user->mastodon)) {
                                $mastodon = $user->mastodon;
                                if (array_key_exists($remove, $mastodon)) {
                                    unset($mastodon[$remove]);
                                } else {
                                    // Check for old format
                                    if (isset($mastodon['username']) && isset($mastodon['server'])) {
                                        $handle = $mastodon['username'] . '@' . $mastodon['server'];
                                        if ($handle == $remove) {
                                            $mastodon = array();
                                        }
                                    }
                                }
                                $user->mastodon = $mastodon;
                            } else {
                                $user->mastodon = false;
                            }
                        } else {
                            $user->mastodon = false;
                        }
                        $user->save();
                        \Idno\Core\Idno::site()->session()->refreshSessionUser($user);
                        if (!empty($user->link_callback)) {
                            error_log($user->link_callback);
                            $this->forward($user->link_callback); exit;
                        }
                    }
                }
                $this->forward($_SERVER['HTTP_REFERER']);
            }

            function postContent() {
                $this->getContent();
            }

        }

    }
