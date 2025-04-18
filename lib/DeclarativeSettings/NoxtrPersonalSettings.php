<?php

declare(strict_types=1);

namespace OCA\Noxtr\DeclarativeSettings;

use OCP\Settings\DeclarativeSettingsTypes;
use OCP\Settings\IDeclarativeSettingsForm;
use OCP\IL10N;

class NoxtrPersonalSettings implements IDeclarativeSettingsForm {

    public function __construct(
            private IL10N $l,
    ) {

    }

    #[\Override]
    public function getSchema(): array {
        return [
            'id' => 'noxtr_settings', // unique form id
            'priority' => 10, // declarative section priority (ordering)
            'section_type' => DeclarativeSettingsTypes::SECTION_TYPE_PERSONAL, // admin, personal
            'section_id' => 'personal-info', // existing section id or your custom section id
            'storage_type' => DeclarativeSettingsTypes::STORAGE_TYPE_INTERNAL, // external, internal (handled by core to store in appconfig and preferences)
            'title' => $this->l->t('Noxtr'), // NcSettingsSection name
            'description' => $this->l->t('Personal settings for Nostr'), // NcSettingsSection description
            'fields' => [
                [
                    'id' => 'nostr_pubkey', // configkey
                    'title' => $this->l->t('Nostr pubkey'), // name or label
                    'description' => $this->l->t('Enter your Nostr public key (starting with npub)'), // hint
                    'type' => DeclarativeSettingsTypes::TEXT,
                    'placeholder' => 'npub...'
                ],
            ]
        ];
    }
}
