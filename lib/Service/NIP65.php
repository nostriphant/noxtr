<?php

namespace OCA\Noxtr\Service;

use OCA\Noxtr\AppInfo\Application;
use OCP\IUserManager;
use OCP\IUser;
use OCP\IConfig;
use OCP\IAppConfig;

class NIP65 {

    public function __construct(
            private IConfig $config,
            private IAppConfig $appConfig,
            private IUserManager $userManager
    ) {
        
    }

    public function findRelaysForUsers() {
        $users = [];
        $this->userManager->callForSeenUsers(function (IUser $user) use (&$users): void {
            $users[] = $user->getUID();
        });
        $nostr_pubkeys = $this->config->getUserValueForUsers(Application::APP_ID, 'nostr_pubkey', $users);
        $nostr_advertisement_relay = $this->config->getAppValue(Application::APP_ID, 'nostr_advertise_relay');

        foreach ($nostr_pubkeys as $username => $nostr_pubkey) {
            var_dump($username, $nostr_pubkey, $nostr_advertisement_relay);
        }
    }
}
