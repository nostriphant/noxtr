<?php

declare(strict_types=1);

namespace OCA\Noxtr\DeclarativeSettings;

use OCP\Settings\DeclarativeSettingsTypes;
use OCP\Settings\IDeclarativeSettingsForm;
use OCP\IL10N;

class NoxtrAdminSettings implements IDeclarativeSettingsForm {

    public function __construct(
            private IL10N $l,
    ) {

    }

    /**
     * @return string the section ID, e.g. 'sharing'
     */
    public function getSection() {
        return 'noxtr';
    }

    #[\Override]
    public function getSchema(): array {
        return [
            'id' => 'noxtr_system_settings', // unique form id
            'priority' => 10, // declarative section priority (ordering)
            'section_type' => DeclarativeSettingsTypes::SECTION_TYPE_ADMIN,
            'section_id' => 'noxtr_admin', // existing section id or your custom section id
            'storage_type' => DeclarativeSettingsTypes::STORAGE_TYPE_INTERNAL, // external, internal (handled by core to store in appconfig and preferences)
            'title' => $this->l->t('Noxtr'), // NcSettingsSection name
            'description' => $this->l->t('System settings for Nostr'), // NcSettingsSection description
            'fields' => [
                [
                    'id' => 'nostr_advertise_relay',
                    'title' => $this->l->t('Nostr advertise relay'),
                    'description' => $this->l->t('Enter relay address to scan for users\' Relay List Metadata(NIP-65) '),
                    'type' => DeclarativeSettingsTypes::TEXT,
                    'options' => [],
                    'placeholder' => 'wss://...',
                    'default' => '',
                ],
            ]
        ];
    }
}
