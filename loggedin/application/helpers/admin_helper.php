<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



if (!function_exists('get_file_extension')) {

    function get_file_extension($file_name) {
        return substr(strrchr($file_name, '.'), 1);
    }

}

if (!function_exists('is_base64')) {

    function is_base64($str) {
        if (base64_encode(base64_decode($str, true)) === $str) {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('contact_no_validate')) {

    function contact_no_validate($contact) {

        $removeZero = $contact;
        $removeZero = str_replace('+', '', $removeZero);
        $removeZero = str_replace('?', '', $removeZero);
        $removeZero = str_replace(' ', '', $removeZero);
        $removeZero = str_replace('-', '', $removeZero);
        $removeZero = str_replace('(', '', $removeZero);
        $removeZero = str_replace(')', '', $removeZero);

        return $removeZero;
    }

}

if (!function_exists('checkRemoteFile')) {

    function checkRemoteFile($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if (curl_exec($ch) !== FALSE) {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('TimeZones')) {

    function TimeZones() {
        $zone = array('Africa/Abidjan' => 'GMT +00:00 - Africa/Abidjan', 'Africa/Accra' => 'GMT +00:00 - Africa/Accra', 'Africa/Addis_Ababa' => 'GMT +03:00 - Africa/Addis_Ababa', 'Africa/Algiers' => 'GMT +01:00 - Africa/Algiers', 'Africa/Asmara' => 'GMT +03:00 - Africa/Asmara', 'Africa/Bamako' => 'GMT +00:00 - Africa/Bamako', 'Africa/Bangui' => 'GMT +01:00 - Africa/Bangui', 'Africa/Banjul' => 'GMT +00:00 - Africa/Banjul', 'Africa/Bissau' => 'GMT +00:00 - Africa/Bissau', 'Africa/Blantyre' => 'GMT +02:00 - Africa/Blantyre', 'Africa/Brazzaville' => 'GMT +01:00 - Africa/Brazzaville', 'Africa/Bujumbura' => 'GMT +02:00 - Africa/Bujumbura', 'Africa/Cairo' => 'GMT +02:00 - Africa/Cairo', 'Africa/Casablanca' => 'GMT +01:00 - Africa/Casablanca', 'Africa/Ceuta' => 'GMT +02:00 - Africa/Ceuta', 'Africa/Conakry' => 'GMT +00:00 - Africa/Conakry', 'Africa/Dakar' => 'GMT +00:00 - Africa/Dakar', 'Africa/Dar_es_Salaam' => 'GMT +03:00 - Africa/Dar_es_Salaam', 'Africa/Djibouti' => 'GMT +03:00 - Africa/Djibouti', 'Africa/Douala' => 'GMT +01:00 - Africa/Douala', 'Africa/El_Aaiun' => 'GMT +01:00 - Africa/El_Aaiun', 'Africa/Freetown' => 'GMT +00:00 - Africa/Freetown', 'Africa/Gaborone' => 'GMT +02:00 - Africa/Gaborone', 'Africa/Harare' => 'GMT +02:00 - Africa/Harare', 'Africa/Johannesburg' => 'GMT +02:00 - Africa/Johannesburg', 'Africa/Juba' => 'GMT +03:00 - Africa/Juba', 'Africa/Kampala' => 'GMT +03:00 - Africa/Kampala', 'Africa/Khartoum' => 'GMT +02:00 - Africa/Khartoum', 'Africa/Kigali' => 'GMT +02:00 - Africa/Kigali', 'Africa/Kinshasa' => 'GMT +01:00 - Africa/Kinshasa', 'Africa/Lagos' => 'GMT +01:00 - Africa/Lagos', 'Africa/Libreville' => 'GMT +01:00 - Africa/Libreville', 'Africa/Lome' => 'GMT +00:00 - Africa/Lome', 'Africa/Luanda' => 'GMT +01:00 - Africa/Luanda', 'Africa/Lubumbashi' => 'GMT +02:00 - Africa/Lubumbashi', 'Africa/Lusaka' => 'GMT +02:00 - Africa/Lusaka', 'Africa/Malabo' => 'GMT +01:00 - Africa/Malabo', 'Africa/Maputo' => 'GMT +02:00 - Africa/Maputo', 'Africa/Maseru' => 'GMT +02:00 - Africa/Maseru', 'Africa/Mbabane' => 'GMT +02:00 - Africa/Mbabane', 'Africa/Mogadishu' => 'GMT +03:00 - Africa/Mogadishu', 'Africa/Monrovia' => 'GMT +00:00 - Africa/Monrovia', 'Africa/Nairobi' => 'GMT +03:00 - Africa/Nairobi', 'Africa/Ndjamena' => 'GMT +01:00 - Africa/Ndjamena', 'Africa/Niamey' => 'GMT +01:00 - Africa/Niamey', 'Africa/Nouakchott' => 'GMT +00:00 - Africa/Nouakchott', 'Africa/Ouagadougou' => 'GMT +00:00 - Africa/Ouagadougou', 'Africa/Porto-Novo' => 'GMT +01:00 - Africa/Porto-Novo', 'Africa/Sao_Tome' => 'GMT +01:00 - Africa/Sao_Tome', 'Africa/Tripoli' => 'GMT +02:00 - Africa/Tripoli', 'Africa/Tunis' => 'GMT +01:00 - Africa/Tunis', 'Africa/Windhoek' => 'GMT +02:00 - Africa/Windhoek', 'America/Adak' => 'GMT -09:00 - America/Adak', 'America/Anchorage' => 'GMT -08:00 - America/Anchorage', 'America/Anguilla' => 'GMT -04:00 - America/Anguilla', 'America/Antigua' => 'GMT -04:00 - America/Antigua', 'America/Araguaina' => 'GMT -03:00 - America/Araguaina', 'America/Argentina/Buenos_Aires' => 'GMT -03:00 - America/Argentina/Buenos_Aires', 'America/Argentina/Catamarca' => 'GMT -03:00 - America/Argentina/Catamarca', 'America/Argentina/Cordoba' => 'GMT -03:00 - America/Argentina/Cordoba', 'America/Argentina/Jujuy' => 'GMT -03:00 - America/Argentina/Jujuy', 'America/Argentina/La_Rioja' => 'GMT -03:00 - America/Argentina/La_Rioja', 'America/Argentina/Mendoza' => 'GMT -03:00 - America/Argentina/Mendoza', 'America/Argentina/Rio_Gallegos' => 'GMT -03:00 - America/Argentina/Rio_Gallegos', 'America/Argentina/Salta' => 'GMT -03:00 - America/Argentina/Salta', 'America/Argentina/San_Juan' => 'GMT -03:00 - America/Argentina/San_Juan', 'America/Argentina/San_Luis' => 'GMT -03:00 - America/Argentina/San_Luis', 'America/Argentina/Tucuman' => 'GMT -03:00 - America/Argentina/Tucuman', 'America/Argentina/Ushuaia' => 'GMT -03:00 - America/Argentina/Ushuaia', 'America/Aruba' => 'GMT -04:00 - America/Aruba', 'America/Asuncion' => 'GMT -04:00 - America/Asuncion', 'America/Atikokan' => 'GMT -05:00 - America/Atikokan', 'America/Bahia' => 'GMT -03:00 - America/Bahia', 'America/Bahia_Banderas' => 'GMT -05:00 - America/Bahia_Banderas', 'America/Barbados' => 'GMT -04:00 - America/Barbados', 'America/Belem' => 'GMT -03:00 - America/Belem', 'America/Belize' => 'GMT -06:00 - America/Belize', 'America/Blanc-Sablon' => 'GMT -04:00 - America/Blanc-Sablon', 'America/Boa_Vista' => 'GMT -04:00 - America/Boa_Vista', 'America/Bogota' => 'GMT -05:00 - America/Bogota', 'America/Boise' => 'GMT -06:00 - America/Boise', 'America/Cambridge_Bay' => 'GMT -06:00 - America/Cambridge_Bay', 'America/Campo_Grande' => 'GMT -04:00 - America/Campo_Grande', 'America/Cancun' => 'GMT -05:00 - America/Cancun', 'America/Caracas' => 'GMT -04:00 - America/Caracas', 'America/Cayenne' => 'GMT -03:00 - America/Cayenne', 'America/Cayman' => 'GMT -05:00 - America/Cayman', 'America/Chicago' => 'GMT -05:00 - America/Chicago', 'America/Chihuahua' => 'GMT -06:00 - America/Chihuahua', 'America/Costa_Rica' => 'GMT -06:00 - America/Costa_Rica', 'America/Creston' => 'GMT -07:00 - America/Creston', 'America/Cuiaba' => 'GMT -04:00 - America/Cuiaba', 'America/Curacao' => 'GMT -04:00 - America/Curacao', 'America/Danmarkshavn' => 'GMT +00:00 - America/Danmarkshavn', 'America/Dawson' => 'GMT -07:00 - America/Dawson', 'America/Dawson_Creek' => 'GMT -07:00 - America/Dawson_Creek', 'America/Denver' => 'GMT -06:00 - America/Denver', 'America/Detroit' => 'GMT -04:00 - America/Detroit', 'America/Dominica' => 'GMT -04:00 - America/Dominica', 'America/Edmonton' => 'GMT -06:00 - America/Edmonton', 'America/Eirunepe' => 'GMT -05:00 - America/Eirunepe', 'America/El_Salvador' => 'GMT -06:00 - America/El_Salvador', 'America/Fort_Nelson' => 'GMT -07:00 - America/Fort_Nelson', 'America/Fortaleza' => 'GMT -03:00 - America/Fortaleza', 'America/Glace_Bay' => 'GMT -03:00 - America/Glace_Bay', 'America/Godthab' => 'GMT -02:00 - America/Godthab', 'America/Goose_Bay' => 'GMT -03:00 - America/Goose_Bay', 'America/Grand_Turk' => 'GMT -04:00 - America/Grand_Turk', 'America/Grenada' => 'GMT -04:00 - America/Grenada', 'America/Guadeloupe' => 'GMT -04:00 - America/Guadeloupe', 'America/Guatemala' => 'GMT -06:00 - America/Guatemala', 'America/Guayaquil' => 'GMT -05:00 - America/Guayaquil', 'America/Guyana' => 'GMT -04:00 - America/Guyana', 'America/Halifax' => 'GMT -03:00 - America/Halifax', 'America/Havana' => 'GMT -04:00 - America/Havana', 'America/Hermosillo' => 'GMT -07:00 - America/Hermosillo', 'America/Indiana/Indianapolis' => 'GMT -04:00 - America/Indiana/Indianapolis', 'America/Indiana/Knox' => 'GMT -05:00 - America/Indiana/Knox', 'America/Indiana/Marengo' => 'GMT -04:00 - America/Indiana/Marengo', 'America/Indiana/Petersburg' => 'GMT -04:00 - America/Indiana/Petersburg', 'America/Indiana/Tell_City' => 'GMT -05:00 - America/Indiana/Tell_City', 'America/Indiana/Vevay' => 'GMT -04:00 - America/Indiana/Vevay', 'America/Indiana/Vincennes' => 'GMT -04:00 - America/Indiana/Vincennes', 'America/Indiana/Winamac' => 'GMT -04:00 - America/Indiana/Winamac', 'America/Inuvik' => 'GMT -06:00 - America/Inuvik', 'America/Iqaluit' => 'GMT -04:00 - America/Iqaluit', 'America/Jamaica' => 'GMT -05:00 - America/Jamaica', 'America/Juneau' => 'GMT -08:00 - America/Juneau', 'America/Kentucky/Louisville' => 'GMT -04:00 - America/Kentucky/Louisville', 'America/Kentucky/Monticello' => 'GMT -04:00 - America/Kentucky/Monticello', 'America/Kralendijk' => 'GMT -04:00 - America/Kralendijk', 'America/La_Paz' => 'GMT -04:00 - America/La_Paz', 'America/Lima' => 'GMT -05:00 - America/Lima', 'America/Los_Angeles' => 'GMT -07:00 - America/Los_Angeles', 'America/Lower_Princes' => 'GMT -04:00 - America/Lower_Princes', 'America/Maceio' => 'GMT -03:00 - America/Maceio', 'America/Managua' => 'GMT -06:00 - America/Managua', 'America/Manaus' => 'GMT -04:00 - America/Manaus', 'America/Marigot' => 'GMT -04:00 - America/Marigot', 'America/Martinique' => 'GMT -04:00 - America/Martinique', 'America/Matamoros' => 'GMT -05:00 - America/Matamoros', 'America/Mazatlan' => 'GMT -06:00 - America/Mazatlan', 'America/Menominee' => 'GMT -05:00 - America/Menominee', 'America/Merida' => 'GMT -05:00 - America/Merida', 'America/Metlakatla' => 'GMT -08:00 - America/Metlakatla', 'America/Mexico_City' => 'GMT -05:00 - America/Mexico_City', 'America/Miquelon' => 'GMT -02:00 - America/Miquelon', 'America/Moncton' => 'GMT -03:00 - America/Moncton', 'America/Monterrey' => 'GMT -05:00 - America/Monterrey', 'America/Montevideo' => 'GMT -03:00 - America/Montevideo', 'America/Montserrat' => 'GMT -04:00 - America/Montserrat', 'America/Nassau' => 'GMT -04:00 - America/Nassau', 'America/New_York' => 'GMT -04:00 - America/New_York', 'America/Nipigon' => 'GMT -04:00 - America/Nipigon', 'America/Nome' => 'GMT -08:00 - America/Nome', 'America/Noronha' => 'GMT -02:00 - America/Noronha', 'America/North_Dakota/Beulah' => 'GMT -05:00 - America/North_Dakota/Beulah', 'America/North_Dakota/Center' => 'GMT -05:00 - America/North_Dakota/Center', 'America/North_Dakota/New_Salem' => 'GMT -05:00 - America/North_Dakota/New_Salem', 'America/Ojinaga' => 'GMT -06:00 - America/Ojinaga', 'America/Panama' => 'GMT -05:00 - America/Panama', 'America/Pangnirtung' => 'GMT -04:00 - America/Pangnirtung', 'America/Paramaribo' => 'GMT -03:00 - America/Paramaribo', 'America/Phoenix' => 'GMT -07:00 - America/Phoenix', 'America/Port-au-Prince' => 'GMT -04:00 - America/Port-au-Prince', 'America/Port_of_Spain' => 'GMT -04:00 - America/Port_of_Spain', 'America/Porto_Velho' => 'GMT -04:00 - America/Porto_Velho', 'America/Puerto_Rico' => 'GMT -04:00 - America/Puerto_Rico', 'America/Punta_Arenas' => 'GMT -03:00 - America/Punta_Arenas', 'America/Rainy_River' => 'GMT -05:00 - America/Rainy_River', 'America/Rankin_Inlet' => 'GMT -05:00 - America/Rankin_Inlet', 'America/Recife' => 'GMT -03:00 - America/Recife', 'America/Regina' => 'GMT -06:00 - America/Regina', 'America/Resolute' => 'GMT -05:00 - America/Resolute', 'America/Rio_Branco' => 'GMT -05:00 - America/Rio_Branco', 'America/Santarem' => 'GMT -03:00 - America/Santarem', 'America/Santiago' => 'GMT -03:00 - America/Santiago', 'America/Santo_Domingo' => 'GMT -04:00 - America/Santo_Domingo', 'America/Sao_Paulo' => 'GMT -03:00 - America/Sao_Paulo', 'America/Scoresbysund' => 'GMT +00:00 - America/Scoresbysund', 'America/Sitka' => 'GMT -08:00 - America/Sitka', 'America/St_Barthelemy' => 'GMT -04:00 - America/St_Barthelemy', 'America/St_Johns' => 'GMT -02:30 - America/St_Johns', 'America/St_Kitts' => 'GMT -04:00 - America/St_Kitts', 'America/St_Lucia' => 'GMT -04:00 - America/St_Lucia', 'America/St_Thomas' => 'GMT -04:00 - America/St_Thomas', 'America/St_Vincent' => 'GMT -04:00 - America/St_Vincent', 'America/Swift_Current' => 'GMT -06:00 - America/Swift_Current', 'America/Tegucigalpa' => 'GMT -06:00 - America/Tegucigalpa', 'America/Thule' => 'GMT -03:00 - America/Thule', 'America/Thunder_Bay' => 'GMT -04:00 - America/Thunder_Bay', 'America/Tijuana' => 'GMT -07:00 - America/Tijuana', 'America/Toronto' => 'GMT -04:00 - America/Toronto', 'America/Tortola' => 'GMT -04:00 - America/Tortola', 'America/Vancouver' => 'GMT -07:00 - America/Vancouver', 'America/Whitehorse' => 'GMT -07:00 - America/Whitehorse', 'America/Winnipeg' => 'GMT -05:00 - America/Winnipeg', 'America/Yakutat' => 'GMT -08:00 - America/Yakutat', 'America/Yellowknife' => 'GMT -06:00 - America/Yellowknife', 'Antarctica/Casey' => 'GMT +08:00 - Antarctica/Casey', 'Antarctica/Davis' => 'GMT +07:00 - Antarctica/Davis', 'Antarctica/DumontDUrville' => 'GMT +10:00 - Antarctica/DumontDUrville', 'Antarctica/Macquarie' => 'GMT +11:00 - Antarctica/Macquarie', 'Antarctica/Mawson' => 'GMT +05:00 - Antarctica/Mawson', 'Antarctica/McMurdo' => 'GMT +12:00 - Antarctica/McMurdo', 'Antarctica/Palmer' => 'GMT -03:00 - Antarctica/Palmer', 'Antarctica/Rothera' => 'GMT -03:00 - Antarctica/Rothera', 'Antarctica/Syowa' => 'GMT +03:00 - Antarctica/Syowa', 'Antarctica/Troll' => 'GMT +02:00 - Antarctica/Troll', 'Antarctica/Vostok' => 'GMT +06:00 - Antarctica/Vostok', 'Arctic/Longyearbyen' => 'GMT +02:00 - Arctic/Longyearbyen', 'Asia/Aden' => 'GMT +03:00 - Asia/Aden', 'Asia/Almaty' => 'GMT +06:00 - Asia/Almaty', 'Asia/Amman' => 'GMT +03:00 - Asia/Amman', 'Asia/Anadyr' => 'GMT +12:00 - Asia/Anadyr', 'Asia/Aqtau' => 'GMT +05:00 - Asia/Aqtau', 'Asia/Aqtobe' => 'GMT +05:00 - Asia/Aqtobe', 'Asia/Ashgabat' => 'GMT +05:00 - Asia/Ashgabat', 'Asia/Atyrau' => 'GMT +05:00 - Asia/Atyrau', 'Asia/Baghdad' => 'GMT +03:00 - Asia/Baghdad', 'Asia/Bahrain' => 'GMT +03:00 - Asia/Bahrain', 'Asia/Baku' => 'GMT +04:00 - Asia/Baku', 'Asia/Bangkok' => 'GMT +07:00 - Asia/Bangkok', 'Asia/Barnaul' => 'GMT +07:00 - Asia/Barnaul', 'Asia/Beirut' => 'GMT +03:00 - Asia/Beirut', 'Asia/Bishkek' => 'GMT +06:00 - Asia/Bishkek', 'Asia/Brunei' => 'GMT +08:00 - Asia/Brunei', 'Asia/Chita' => 'GMT +09:00 - Asia/Chita', 'Asia/Choibalsan' => 'GMT +08:00 - Asia/Choibalsan', 'Asia/Colombo' => 'GMT +05:30 - Asia/Colombo', 'Asia/Damascus' => 'GMT +03:00 - Asia/Damascus', 'Asia/Dhaka' => 'GMT +06:00 - Asia/Dhaka', 'Asia/Dili' => 'GMT +09:00 - Asia/Dili', 'Asia/Dubai' => 'GMT +04:00 - Asia/Dubai', 'Asia/Dushanbe' => 'GMT +05:00 - Asia/Dushanbe', 'Asia/Famagusta' => 'GMT +03:00 - Asia/Famagusta', 'Asia/Gaza' => 'GMT +03:00 - Asia/Gaza', 'Asia/Hebron' => 'GMT +03:00 - Asia/Hebron', 'Asia/Ho_Chi_Minh' => 'GMT +07:00 - Asia/Ho_Chi_Minh', 'Asia/Hong_Kong' => 'GMT +08:00 - Asia/Hong_Kong', 'Asia/Hovd' => 'GMT +07:00 - Asia/Hovd', 'Asia/Irkutsk' => 'GMT +08:00 - Asia/Irkutsk', 'Asia/Jakarta' => 'GMT +07:00 - Asia/Jakarta', 'Asia/Jayapura' => 'GMT +09:00 - Asia/Jayapura', 'Asia/Jerusalem' => 'GMT +03:00 - Asia/Jerusalem', 'Asia/Kabul' => 'GMT +04:30 - Asia/Kabul', 'Asia/Kamchatka' => 'GMT +12:00 - Asia/Kamchatka', 'Asia/Karachi' => 'GMT +05:00 - Asia/Karachi', 'Asia/Kathmandu' => 'GMT +05:45 - Asia/Kathmandu', 'Asia/Khandyga' => 'GMT +09:00 - Asia/Khandyga', 'Asia/Kolkata' => 'GMT +05:30 - Asia/Kolkata', 'Asia/Krasnoyarsk' => 'GMT +07:00 - Asia/Krasnoyarsk', 'Asia/Kuala_Lumpur' => 'GMT +08:00 - Asia/Kuala_Lumpur', 'Asia/Kuching' => 'GMT +08:00 - Asia/Kuching', 'Asia/Kuwait' => 'GMT +03:00 - Asia/Kuwait', 'Asia/Macau' => 'GMT +08:00 - Asia/Macau', 'Asia/Magadan' => 'GMT +11:00 - Asia/Magadan', 'Asia/Makassar' => 'GMT +08:00 - Asia/Makassar', 'Asia/Manila' => 'GMT +08:00 - Asia/Manila', 'Asia/Muscat' => 'GMT +04:00 - Asia/Muscat', 'Asia/Nicosia' => 'GMT +03:00 - Asia/Nicosia', 'Asia/Novokuznetsk' => 'GMT +07:00 - Asia/Novokuznetsk', 'Asia/Novosibirsk' => 'GMT +07:00 - Asia/Novosibirsk', 'Asia/Omsk' => 'GMT +06:00 - Asia/Omsk', 'Asia/Oral' => 'GMT +05:00 - Asia/Oral', 'Asia/Phnom_Penh' => 'GMT +07:00 - Asia/Phnom_Penh', 'Asia/Pontianak' => 'GMT +07:00 - Asia/Pontianak', 'Asia/Pyongyang' => 'GMT +09:00 - Asia/Pyongyang', 'Asia/Qatar' => 'GMT +03:00 - Asia/Qatar', 'Asia/Qyzylorda' => 'GMT +06:00 - Asia/Qyzylorda', 'Asia/Riyadh' => 'GMT +03:00 - Asia/Riyadh', 'Asia/Sakhalin' => 'GMT +11:00 - Asia/Sakhalin', 'Asia/Samarkand' => 'GMT +05:00 - Asia/Samarkand', 'Asia/Seoul' => 'GMT +09:00 - Asia/Seoul', 'Asia/Shanghai' => 'GMT +08:00 - Asia/Shanghai', 'Asia/Singapore' => 'GMT +08:00 - Asia/Singapore', 'Asia/Srednekolymsk' => 'GMT +11:00 - Asia/Srednekolymsk', 'Asia/Taipei' => 'GMT +08:00 - Asia/Taipei', 'Asia/Tashkent' => 'GMT +05:00 - Asia/Tashkent', 'Asia/Tbilisi' => 'GMT +04:00 - Asia/Tbilisi', 'Asia/Tehran' => 'GMT +04:30 - Asia/Tehran', 'Asia/Thimphu' => 'GMT +06:00 - Asia/Thimphu', 'Asia/Tokyo' => 'GMT +09:00 - Asia/Tokyo', 'Asia/Tomsk' => 'GMT +07:00 - Asia/Tomsk', 'Asia/Ulaanbaatar' => 'GMT +08:00 - Asia/Ulaanbaatar', 'Asia/Urumqi' => 'GMT +06:00 - Asia/Urumqi', 'Asia/Ust-Nera' => 'GMT +10:00 - Asia/Ust-Nera', 'Asia/Vientiane' => 'GMT +07:00 - Asia/Vientiane', 'Asia/Vladivostok' => 'GMT +10:00 - Asia/Vladivostok', 'Asia/Yakutsk' => 'GMT +09:00 - Asia/Yakutsk', 'Asia/Yangon' => 'GMT +06:30 - Asia/Yangon', 'Asia/Yekaterinburg' => 'GMT +05:00 - Asia/Yekaterinburg', 'Asia/Yerevan' => 'GMT +04:00 - Asia/Yerevan', 'Atlantic/Azores' => 'GMT +00:00 - Atlantic/Azores', 'Atlantic/Bermuda' => 'GMT -03:00 - Atlantic/Bermuda', 'Atlantic/Canary' => 'GMT +01:00 - Atlantic/Canary', 'Atlantic/Cape_Verde' => 'GMT -01:00 - Atlantic/Cape_Verde', 'Atlantic/Faroe' => 'GMT +01:00 - Atlantic/Faroe', 'Atlantic/Madeira' => 'GMT +01:00 - Atlantic/Madeira', 'Atlantic/Reykjavik' => 'GMT +00:00 - Atlantic/Reykjavik', 'Atlantic/South_Georgia' => 'GMT -02:00 - Atlantic/South_Georgia', 'Atlantic/St_Helena' => 'GMT +00:00 - Atlantic/St_Helena', 'Atlantic/Stanley' => 'GMT -03:00 - Atlantic/Stanley', 'Australia/Adelaide' => 'GMT +09:30 - Australia/Adelaide', 'Australia/Brisbane' => 'GMT +10:00 - Australia/Brisbane', 'Australia/Broken_Hill' => 'GMT +09:30 - Australia/Broken_Hill', 'Australia/Currie' => 'GMT +10:00 - Australia/Currie', 'Australia/Darwin' => 'GMT +09:30 - Australia/Darwin', 'Australia/Eucla' => 'GMT +08:45 - Australia/Eucla', 'Australia/Hobart' => 'GMT +10:00 - Australia/Hobart', 'Australia/Lindeman' => 'GMT +10:00 - Australia/Lindeman', 'Australia/Lord_Howe' => 'GMT +10:30 - Australia/Lord_Howe', 'Australia/Melbourne' => 'GMT +10:00 - Australia/Melbourne', 'Australia/Perth' => 'GMT +08:00 - Australia/Perth', 'Australia/Sydney' => 'GMT +10:00 - Australia/Sydney', 'Europe/Amsterdam' => 'GMT +02:00 - Europe/Amsterdam', 'Europe/Andorra' => 'GMT +02:00 - Europe/Andorra', 'Europe/Astrakhan' => 'GMT +04:00 - Europe/Astrakhan', 'Europe/Athens' => 'GMT +03:00 - Europe/Athens', 'Europe/Belgrade' => 'GMT +02:00 - Europe/Belgrade', 'Europe/Berlin' => 'GMT +02:00 - Europe/Berlin', 'Europe/Bratislava' => 'GMT +02:00 - Europe/Bratislava', 'Europe/Brussels' => 'GMT +02:00 - Europe/Brussels', 'Europe/Bucharest' => 'GMT +03:00 - Europe/Bucharest', 'Europe/Budapest' => 'GMT +02:00 - Europe/Budapest', 'Europe/Busingen' => 'GMT +02:00 - Europe/Busingen', 'Europe/Chisinau' => 'GMT +03:00 - Europe/Chisinau', 'Europe/Copenhagen' => 'GMT +02:00 - Europe/Copenhagen', 'Europe/Dublin' => 'GMT +01:00 - Europe/Dublin', 'Europe/Gibraltar' => 'GMT +02:00 - Europe/Gibraltar', 'Europe/Guernsey' => 'GMT +01:00 - Europe/Guernsey', 'Europe/Helsinki' => 'GMT +03:00 - Europe/Helsinki', 'Europe/Isle_of_Man' => 'GMT +01:00 - Europe/Isle_of_Man', 'Europe/Istanbul' => 'GMT +03:00 - Europe/Istanbul', 'Europe/Jersey' => 'GMT +01:00 - Europe/Jersey', 'Europe/Kaliningrad' => 'GMT +02:00 - Europe/Kaliningrad', 'Europe/Kiev' => 'GMT +03:00 - Europe/Kiev', 'Europe/Kirov' => 'GMT +03:00 - Europe/Kirov', 'Europe/Lisbon' => 'GMT +01:00 - Europe/Lisbon', 'Europe/Ljubljana' => 'GMT +02:00 - Europe/Ljubljana', 'Europe/London' => 'GMT +01:00 - Europe/London', 'Europe/Luxembourg' => 'GMT +02:00 - Europe/Luxembourg', 'Europe/Madrid' => 'GMT +02:00 - Europe/Madrid', 'Europe/Malta' => 'GMT +02:00 - Europe/Malta', 'Europe/Mariehamn' => 'GMT +03:00 - Europe/Mariehamn', 'Europe/Minsk' => 'GMT +03:00 - Europe/Minsk', 'Europe/Monaco' => 'GMT +02:00 - Europe/Monaco', 'Europe/Moscow' => 'GMT +03:00 - Europe/Moscow', 'Europe/Oslo' => 'GMT +02:00 - Europe/Oslo', 'Europe/Paris' => 'GMT +02:00 - Europe/Paris', 'Europe/Podgorica' => 'GMT +02:00 - Europe/Podgorica', 'Europe/Prague' => 'GMT +02:00 - Europe/Prague', 'Europe/Riga' => 'GMT +03:00 - Europe/Riga', 'Europe/Rome' => 'GMT +02:00 - Europe/Rome', 'Europe/Samara' => 'GMT +04:00 - Europe/Samara', 'Europe/San_Marino' => 'GMT +02:00 - Europe/San_Marino', 'Europe/Sarajevo' => 'GMT +02:00 - Europe/Sarajevo', 'Europe/Saratov' => 'GMT +04:00 - Europe/Saratov', 'Europe/Simferopol' => 'GMT +03:00 - Europe/Simferopol', 'Europe/Skopje' => 'GMT +02:00 - Europe/Skopje', 'Europe/Sofia' => 'GMT +03:00 - Europe/Sofia', 'Europe/Stockholm' => 'GMT +02:00 - Europe/Stockholm', 'Europe/Tallinn' => 'GMT +03:00 - Europe/Tallinn', 'Europe/Tirane' => 'GMT +02:00 - Europe/Tirane', 'Europe/Ulyanovsk' => 'GMT +04:00 - Europe/Ulyanovsk', 'Europe/Uzhgorod' => 'GMT +03:00 - Europe/Uzhgorod', 'Europe/Vaduz' => 'GMT +02:00 - Europe/Vaduz', 'Europe/Vatican' => 'GMT +02:00 - Europe/Vatican', 'Europe/Vienna' => 'GMT +02:00 - Europe/Vienna', 'Europe/Vilnius' => 'GMT +03:00 - Europe/Vilnius', 'Europe/Volgograd' => 'GMT +03:00 - Europe/Volgograd', 'Europe/Warsaw' => 'GMT +02:00 - Europe/Warsaw', 'Europe/Zagreb' => 'GMT +02:00 - Europe/Zagreb', 'Europe/Zaporozhye' => 'GMT +03:00 - Europe/Zaporozhye', 'Europe/Zurich' => 'GMT +02:00 - Europe/Zurich', 'Indian/Antananarivo' => 'GMT +03:00 - Indian/Antananarivo', 'Indian/Chagos' => 'GMT +06:00 - Indian/Chagos', 'Indian/Christmas' => 'GMT +07:00 - Indian/Christmas', 'Indian/Cocos' => 'GMT +06:30 - Indian/Cocos', 'Indian/Comoro' => 'GMT +03:00 - Indian/Comoro', 'Indian/Kerguelen' => 'GMT +05:00 - Indian/Kerguelen', 'Indian/Mahe' => 'GMT +04:00 - Indian/Mahe', 'Indian/Maldives' => 'GMT +05:00 - Indian/Maldives', 'Indian/Mauritius' => 'GMT +04:00 - Indian/Mauritius', 'Indian/Mayotte' => 'GMT +03:00 - Indian/Mayotte', 'Indian/Reunion' => 'GMT +04:00 - Indian/Reunion', 'Pacific/Apia' => 'GMT +13:00 - Pacific/Apia', 'Pacific/Auckland' => 'GMT +12:00 - Pacific/Auckland', 'Pacific/Bougainville' => 'GMT +11:00 - Pacific/Bougainville', 'Pacific/Chatham' => 'GMT +12:45 - Pacific/Chatham', 'Pacific/Chuuk' => 'GMT +10:00 - Pacific/Chuuk', 'Pacific/Easter' => 'GMT -05:00 - Pacific/Easter', 'Pacific/Efate' => 'GMT +11:00 - Pacific/Efate', 'Pacific/Enderbury' => 'GMT +13:00 - Pacific/Enderbury', 'Pacific/Fakaofo' => 'GMT +13:00 - Pacific/Fakaofo', 'Pacific/Fiji' => 'GMT +12:00 - Pacific/Fiji', 'Pacific/Funafuti' => 'GMT +12:00 - Pacific/Funafuti', 'Pacific/Galapagos' => 'GMT -06:00 - Pacific/Galapagos', 'Pacific/Gambier' => 'GMT -09:00 - Pacific/Gambier', 'Pacific/Guadalcanal' => 'GMT +11:00 - Pacific/Guadalcanal', 'Pacific/Guam' => 'GMT +10:00 - Pacific/Guam', 'Pacific/Honolulu' => 'GMT -10:00 - Pacific/Honolulu', 'Pacific/Kiritimati' => 'GMT +14:00 - Pacific/Kiritimati', 'Pacific/Kosrae' => 'GMT +11:00 - Pacific/Kosrae', 'Pacific/Kwajalein' => 'GMT +12:00 - Pacific/Kwajalein', 'Pacific/Majuro' => 'GMT +12:00 - Pacific/Majuro', 'Pacific/Marquesas' => 'GMT -09:30 - Pacific/Marquesas', 'Pacific/Midway' => 'GMT -11:00 - Pacific/Midway', 'Pacific/Nauru' => 'GMT +12:00 - Pacific/Nauru', 'Pacific/Niue' => 'GMT -11:00 - Pacific/Niue', 'Pacific/Norfolk' => 'GMT +11:00 - Pacific/Norfolk', 'Pacific/Noumea' => 'GMT +11:00 - Pacific/Noumea', 'Pacific/Pago_Pago' => 'GMT -11:00 - Pacific/Pago_Pago', 'Pacific/Palau' => 'GMT +09:00 - Pacific/Palau', 'Pacific/Pitcairn' => 'GMT -08:00 - Pacific/Pitcairn', 'Pacific/Pohnpei' => 'GMT +11:00 - Pacific/Pohnpei', 'Pacific/Port_Moresby' => 'GMT +10:00 - Pacific/Port_Moresby', 'Pacific/Rarotonga' => 'GMT -10:00 - Pacific/Rarotonga', 'Pacific/Saipan' => 'GMT +10:00 - Pacific/Saipan', 'Pacific/Tahiti' => 'GMT -10:00 - Pacific/Tahiti', 'Pacific/Tarawa' => 'GMT +12:00 - Pacific/Tarawa', 'Pacific/Tongatapu' => 'GMT +13:00 - Pacific/Tongatapu', 'Pacific/Wake' => 'GMT +12:00 - Pacific/Wake', 'Pacific/Wallis' => 'GMT +12:00 - Pacific/Wallis', 'UTC' => 'GMT +00:00 - UTC');
        return $zone;
    }

}

if (!function_exists('allDays')) {

    function allDays() {
        $days = array(1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday');
        return $days;
    }

}

if (!function_exists('getBookingDuration')) {

    function getBookingDuration($hours, $min, $break) {
        $service_duration = '';

        $dur_hr = $hours;
        $dur_min1 = $min;
        $dur_min_2 = $break;
        $dur_min = $dur_min1 + $dur_min_2;
        if ($dur_hr > 0) {
            $service_duration .= $dur_hr . 'h';
        }
        if ($dur_hr > 0 && $dur_min > 0) {
            $service_duration .= ':';
        }
        if ($dur_min > 0) {
            $service_duration .= $dur_min . 'm';
        }
        return $service_duration;
    }

}
//------payment_message---------------
if (!function_exists('payment_message')) {

    function payment_message() {

        $CI = & get_instance();
        $user_id = $CI->session->userdata['admin']['id'];

        $where = array('uid' => $user_id,
            'access_token !=' => '',
            'stripe_publishable_key !=' => '',
            'stripe_publishable_key!=' => '',
            'stripe_user_id !=' => '');
        $query = $CI->db->get_where('stripe_details', $where, 0, 500);
        $msgCount = $query->num_rows();
        $class = "";

        if ($msgCount < 1) {
            $message = "Please integrate <a href='../Payment/account.php' class='atagstyle'>payment method</a> in order to go live.";
        } else {
            $class = "display:none;";
            $message = "";
        }

        echo '<div class="row alert Rest_Message_result messageSection" style="text-align: center; ' . $class . '">
     ' . $message . ' <span style="float: right;"> <i class="fa fa-close closed"></i> </span>
</div>';
    }

}
?>


