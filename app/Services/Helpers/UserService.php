<?php

namespace App\Services\Helpers;

use GuzzleHttp\Client;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use App\Models\SoundUser;

class UserService {

    public const CACHE_KEY = 'soundboard:user_data';

    /**
     * @var array
     */
    private static $result;

    /**
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * UserService constructor.
     */
    public function __construct(
        CacheRepository $cache,
        Client $client
    ) {
        $this->cache = $cache;
        $this->client = $client;

        self::$result = $this->cacheSoundData();
    }

    /**
     * @return array
     */
    public function getSoundData(): array {
        return self::$result;
    }

    /**
     * Keeps the sound cache up-to-date with the latest results from the CDN.
     *
     * @return array
     */
    protected function cacheSoundData()
    {
        return $this->cache->remember(self::CACHE_KEY, CarbonImmutable::now()->addMinutes(config()->get('soundboard.cdn.cache_time', 60)), function () {
            try {
                $response = $this->client->request('GET', config()->get('soundboard.cdn.url', 'https://cdn.devsky.one/soundboard/users'), ['verify' => false]);

                if ($response->getStatusCode() === 200) {
                    $jsonUsers = json_decode($response->getBody(), true);
                    $users = array_map(function ($user) {
                        return $this->cacheUserData($user['id'], $user['count']);
                    }, $jsonUsers);
                    return $users;
                }

            } catch (Exception $exception) {
                return [];
            }
        });
    }

    /**
     * Keeps the user cache up-to-date with the latest results from discord.
     *
     * @return SoundUser
     */
    protected function cacheUserData($userId, $soundCount)
    {
        return $this->cache->remember('soundboard:user_cache:' . $userId, CarbonImmutable::now()->addMinutes(config()->get('soundboard.cdn.cache_time', 60)), function () use($userId, $soundCount) {
            try {
                $response = $this->client->request('GET', 'https://dcl.flawcra.cc/' . $userId, ['verify' => false]);	

                if ($response->getStatusCode() === 200) {
                    $jsonUserData = json_decode($response->getBody(), true);
                    $soundUser = new SoundUser($userId, $soundCount);
                    $soundUser->setAvatar($jsonUserData['user']['avatar']);
                    $soundUser->setName($jsonUserData['user']['username']);

                    try {
                        $response = $this->client->request('GET', config()->get('soundboard.cdn.url', 'https://cdn.devsky.one/soundboard/users') . '/?id=' . $userId, ['verify' => false]);
                        $jsonSounds = json_decode($response->getBody(), true);
                        $soundUser->setSounds($jsonSounds);
                    } catch (Exception $exception) {
                        $soundUser->setSounds([]);
                    }


                    return $soundUser;
                }

            } catch (Exception $exception) {
                return new SoundUser($userId, $soundCount);
            }
        });
    }
}