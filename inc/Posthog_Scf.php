<?php

class Posthog_Scf {
    private static $apiUrl = (!WP_DEBUG) ? 'https://googleadsapi.socialcatfish.com/posthog.php' : 'https://googleadsapi.socialcatfish.com/posthog-dev.php';
    private static $defaultTimeout = 3; // seconds


    /**
     * Get PostHog's distinct ID from cookie
     * 
     * @return string|null PostHog's distinct ID or null if not found
     */
    private static function getPosthogDistinctId() {
        // Check for PostHog's assigned distinct ID

        if (!WP_DEBUG) {
            if (isset($_COOKIE['ph_phc_xU62FgO0ePB2C32HT1vXJqsSRBbFjV5vJf5N2UoJLXd_posthog'])) {
                $posthogData = json_decode(stripslashes($_COOKIE['ph_phc_xU62FgO0ePB2C32HT1vXJqsSRBbFjV5vJf5N2UoJLXd_posthog']), true);
                return $posthogData['distinct_id'] ?? null;
            }
        } else {
            if (isset($_COOKIE['ph_phc_aePSGz9wxBWODb8aBD7JQl1k4uNvY3nsPmanWGSvarB_posthog'])) {
                $posthogData = json_decode(stripslashes($_COOKIE['ph_phc_aePSGz9wxBWODb8aBD7JQl1k4uNvY3nsPmanWGSvarB_posthog']), true);
                return $posthogData['distinct_id'] ?? null;
            }
        }
        
        return null;
    }
    
    /**
     * Get PostHog feature flag value
     * 
     * @param string $flag Name of the feature flag
     * @param string|null $distinctId User's distinct ID (will use cookie if null)
     * @param string|null $defaultValue Value to return if API fails
     * @return mixed Feature flag value or default
     */
    public static function getFeatureFlag($flag, $distinctId = null, $defaultValue = null) {
        if ($distinctId === null) {
            // Use PostHog's distinct ID - don't create our own
            $distinctId = self::getPosthogDistinctId();
            
            // If PostHog hasn't set a distinct ID yet, return default
            // Let PostHog handle ID generation on the frontend
            if ($distinctId === null) {
                return $defaultValue;
            }
        }

        // Set up POST data
        $postData = [
            'flag' => $flag,
            'distinctId' => $distinctId
        ];

        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$defaultTimeout);
        if(WP_DEBUG) curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        
        if ($response && !$err) {
            $data = json_decode($response, true);
            if (isset($data['success']) && $data['success'] && isset($data['value'])) {
                return $data['value'];
            }
        }
        
        // Log error if debugging is enabled
        if (defined('WP_DEBUG') && WP_DEBUG && $err) {
            // error_log("PostHog API Error: " . $err);
        }
        
        return $defaultValue;
    }
    
    /**
     * Track an event in PostHog
     * 
     * @param string $event Event name
     * @param array $properties Event properties
     * @param string|null $distinctId User's distinct ID (will use cookie if null)
     * @return bool Success status
     */
    public static function trackEvent($event, $properties = [], $distinctId = null) {
         if ($distinctId === null) {
            // Use PostHog's distinct ID - don't create our own
            $distinctId = self::getPosthogDistinctId();
            
            // If PostHog hasn't set a distinct ID yet, skip tracking
            // Let PostHog handle this on the frontend
            if ($distinctId === null) {
                return false;
            }
        }
        
        // Set up POST data
        $postData = [
            'event' => $event,
            'properties' => json_encode($properties),
            'distinctId' => $distinctId
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$defaultTimeout);
        if(WP_DEBUG) curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        if ($response) {
            $data = json_decode($response, true);
            return isset($data['success']) && $data['success'];
        }
        
        return false;
    }

    /**
     * Get PostHog's distinct ID (public access)
     * 
     * @return string|null PostHog's distinct ID or null if not found
     */
    public static function getDistinctId() {
        return self::getPosthogDistinctId();
    }
    
}