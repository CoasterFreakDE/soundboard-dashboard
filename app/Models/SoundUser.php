<?php

namespace App\Models;

class SoundUser {

    public $id;

    public $name;

    public $avatarUrl;

    public $count;

    public $sounds;

    /**
     * SoundUser constructor.
     */
    public function __construct(string $id, int $count) {
        $this->id = $id;
        $this->count = $count;
        $this->sounds = [];
    }

    public function setAvatar(string $avatarUrl) {
        $this->avatarUrl = $avatarUrl;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setSounds(array $sounds) {
        $this->sounds = $sounds;
    }
}