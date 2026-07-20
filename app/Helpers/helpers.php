<?php

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Cache;

if (!function_exists('t')) {
    /**
     * Auto translate text based on current session locale
     * using stichoza/google-translate-php package
     *
     * @param string $text
     * @return string
     */
    function t($text)
    {
        if (empty($text) || !is_string($text)) {
            return $text;
        }

        // Current selected language (dropdown se set hoy che)
        $locale = session('site_locale', 'en');

        // Default English hoy to translate ni jarur nathi
        if ($locale === 'en') {
            return $text;
        }

        // Same text vaari vaari translate na thay etle cache karo
        $cacheKey = 'trans_' . $locale . '_' . md5($text);

        return Cache::rememberForever($cacheKey, function () use ($text, $locale) {
            try {
                $translator = new GoogleTranslate();
                $translator->setSource('en');
                $translator->setTarget($locale);

                return $translator->translate($text);
            } catch (\Exception $e) {
                // Kai error aave (API down, no internet) to original text batavo
                return $text;
            }
        });
    }
}