# Xbox PHP API SDK

  This is an unofficial SDK for https://xboxapi.com
  
  
# Usage
  
  ```php
  include_once 'vendor/autoload.php';
  
  $xbox = new \Clegginabox\Xbox\ApiClient('your-api-key');
  
  $xuid = $xbox->getXuidByGamertag('clegginabox');
  $userProfile = $xbox->getProfile($xuid);
  $presence = $xbox->getPresence($xuid);
  $gamerCard = $xbox->getGamercard($xuid);
  $activity = $xbox->getActivity($xuid);
  $recentActivity = $xbox->getRecentActivity($xuid);
  $friends = $xbox->getFriends($xuid);
  $gameClips = $xbox->getGameClips($xuid);
  
  ```
  
  Better documentation to follow
