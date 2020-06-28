<?php



if (!function_exists('roundDown')) {

    function roundDown($number, $precision = 2)
    {
        $fig = (int) str_pad('1', $precision, '0');

        return (floor($number * $fig) / $fig);
    }
}

if (!function_exists('getReviewMean')) {
    function getReviewMean($review)
    {
        $reviewTotal = $review['rate'] + $review['rate1'] + $review['rate2'] + $review['rate3'] + $review['rate4'] + $review['rate5'];
        if ($reviewTotal > 0) {
            $reviewMean = $reviewTotal / 5;
            $revMean = round($reviewMean, 1, PHP_ROUND_HALF_DOWN);
            $revMean = floor($revMean * 2) / 2;
            $revMean = explode(".", (string) $revMean);
            if ($revMean[1] > 0) {
                $empty = 5 - ($revMean[0] + 1);
                $revMean[3] = $empty;
            } else {
                $empty = 5 - $revMean[0];
                $revMean[3] = $empty;
            }
            return $revMean;
        } else {
            return 0;
        }
    }
}

if (!function_exists('getOverallReviewMean')) {
    function getOverallReviewMean($reviewMean)
    {
        if ($reviewMean > 0) {
            $revMean = number_format((float) $reviewMean, 1, '.', '');
            $revMean = explode(".", (string) $revMean);
            if ($revMean[1] > 0) {
                $empty = 5 - ($revMean[0] + 1);
                $revMean[3] = $empty;
            } else {
                $empty = 5 - $revMean[0];
                $revMean[3] = $empty;
            }
            return $revMean;
        } else {
            return 0;
        }
    }
}

if (!function_exists('getLocalizedString')) {
    function getLocalizedString($obj, $key, $stripTags = false)
    {
        if ($stripTags == false) {
            switch (config('app.locale')) {
                case 'en':
                    return $obj->$key;
                    break;
                case 'tr':
                    $key = $key . '_tr';
                    return $obj->$key;
                    break;
                case 'ar':
                    $key = $key . '_ar';
                    return $obj->$key;
                    break;
                case 'ru':
                    $key = $key . '_ru';
                    return $obj->$key;
                    break;
                case 'de':
                    $key = $key . '_de';
                    return $obj->$key;
                    break;
                case 'it':
                    $key = $key . '_it';
                    return $obj->$key;
                    break;
                case 'fr':
                    $key = $key . '_fr';
                    return $obj->$key;
                    break;
                case 'es':
                    $key = $key . '_es';
                    return $obj->$key;
                    break;
                case 'se':
                    $key = $key . '_se';
                    return $obj->$key;
                    break;
                case 'jp':
                    $key = $key . '_jp';
                    return $obj->$key;
                    break;
                case 'fa':
                    $key = $key . '_fa';
                    return $obj->$key;
                    break;
                case 'pr':
                    $key = $key . '_pr';
                    return $obj->$key;
                    break;
                default:
                    return 'lang err';
                    break;
            }
        } else {
            switch (config('app.locale')) {
                case 'en':
                    return strip_tags($obj->$key);
                    break;
                case 'tr':
                    $key = $key . '_tr';
                    return strip_tags($obj->$key);
                    break;
                case 'ar':
                    $key = $key . '_ar';
                    return strip_tags($obj->$key);
                    break;
                case 'ru':
                    $key = $key . '_ru';
                    return strip_tags($obj->$key);
                    break;
                case 'de':
                    $key = $key . '_de';
                    return strip_tags($obj->$key);
                    break;
                case 'it':
                    $key = $key . '_it';
                    return strip_tags($obj->$key);
                    break;
                case 'fr':
                    $key = $key . '_fr';
                    return strip_tags($obj->$key);
                    break;
                case 'es':
                    $key = $key . '_es';
                    return strip_tags($obj->$key);
                    break;
                case 'se':
                    $key = $key . '_se';
                    return strip_tags($obj->$key);
                    break;
                case 'jp':
                    $key = $key . '_jp';
                    return strip_tags($obj->$key);
                    break;
                case 'fa':
                    $key = $key . '_fa';
                    return strip_tags($obj->$key);
                    break;
                case 'pr':
                    $key = $key . '_pr';
                    return strip_tags($obj->$key);
                    break;
                default:
                    return 'lang err';
                    break;
            }
        }
    }
}
