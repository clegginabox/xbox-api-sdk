<?php
namespace Clegginabox\Xbox;

use GuzzleHttp\Client;

class ApiClient
{
    /*
     * Xbox API Endpoint
     */
    const ENDPOINT = 'https://xboxapi.com/v2/';

    /**
     * Xbox API Key
     */
    const API_KEY = '012555115e7ed85a146c7a693834818ec84c082f';

    /**
     * @type \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Client constructor.
     */
    public function __construct($apiKey)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => self::ENDPOINT,
            'headers'  => [
                'X-Auth' => $apiKey
            ]
        ]);
    }

    /**
     * This is the XUID for a specified Gamertag (Xbox Account User ID)
     *
     * @param $gamertag
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getXuidByGamertag($gamertag)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . '/xuid/' . rawurlencode($gamertag));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the Gamertag for a specified XUID (Xbox Account User ID)
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getGamertagByXuid($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . '/gamertag/' . rawurlencode($xuid));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the Profile for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getProfile($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/profile');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the Gamercard information for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getGamercard($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/gamercard');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the current presence information for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getPresence($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/presence');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the current activity information for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getActivity($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/activity');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the recent activity information for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getRecentActivity($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/activity/recent');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the friends information for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getFriends($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/friends');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the followers information for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getFollowers($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/followers');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }


    /**
     * This is accounts recent players information
     *
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getRecentPlayers()
    {
        try {
            $response = $this->client->get(self::ENDPOINT . '/recent-players');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the game clips for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getGameClips($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/game-clips');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the saved game clips for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getSavedGameClips($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/game-clips/saved');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the saved game clips for a specified XUID, and Game (titleId)
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getGameClipsAndGame($xuid, $titleId)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/game-clips/' . rawurlencode($titleId));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the saved game clips for a specified Game (titleId)
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getGameClipsForGame($titleId)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . '/game-clips/' . rawurlencode($titleId));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the screenshots for a specified XUID
     *
     * @param $xuid
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getScreenshots($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/screenshots');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the saved screenshots for a specified XUID, and Game (titleId)
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getScreenshotsForGame($xuid, $titleId)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/screenshots/' . rawurlencode($titleId));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the saved screenshots for a specified Game (titleId)
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getGameScreenshots($titleId)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . '/screenshots/' . rawurlencode($titleId));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the game stats for a specified XUID, on a specified game. (i.e. Driver Level on Forza etc.)
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getGameStatsForGame($xuid, $titleId)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/game-stats/' . rawurlencode($titleId));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the Xbox 360 Games List for a specified XUID
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function get360Games($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/xbox360games');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This is the Xbox One Games List for a specified XUID
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getOneGames($xuid)
    {
        try {
            $response = $this->client->get(self::ENDPOINT . rawurlencode($xuid) . '/xboxonegames');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This gets the latest Xbox 360 Games from the Xbox LIVE marketplace
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function lastest360Games()
    {
        try {
            $response = $this->client->get(self::ENDPOINT . 'latest-xbox360-games');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This gets the latest Xbox One Games from the Xbox LIVE marketplace
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function lastestOneGames()
    {
        try {
            $response = $this->client->get(self::ENDPOINT . 'latest-xboxone-games');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * This gets the latest Xbox One Apps from the Xbox LIVE marketplace
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function lastestOneApps()
    {
        try {
            $response = $this->client->get(self::ENDPOINT . 'latest-xboxone-apps');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }

    /**
     * These are the free "Games with Gold", and "Deals with Gold" from the Xbox LIVE marketplace
     *
     * @param $xuid
     * @param $titleId
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function xboxOneGoldLounge()
    {
        try {
            $response = $this->client->get(self::ENDPOINT . 'xboxone-gold-lounge');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();
    }
}