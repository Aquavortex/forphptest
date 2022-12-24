<?php

define('LANDING_DIR', '');

$apiKey = 'fyGOYrHksFJjyyZduJaV20Cwkoxcrw8E7bt5DQ4sSggBA4p';          // Ключ доступа к API
$offer_id = 3752;         // для каждого оффера свой айди, надо уточнять его в админке или у суппортов
$stream_hid = 'kNgTmxkO';     // id потока
$landKey = '6694646b297ccefed16a8ae8a99069a8';

$default_main_site = 'http://api.cpa.tl';
//$default_main_site = 'http://api.tradeblg.ru';
$apiSendLeadUrl = 'http://api.cpa.tl/api/lead/send_archive';
//$apiSendLeadUrl = 'http://api.tradeblg.ru/api/lead/send_archive';
$apiGetLeadUrl = 'http://api.cpa.tl/api/lead/feed';
//$apiGetLeadUrl = 'http://api.tradeblg.ru/api/lead/feed';

$dataOffers = '{"24015":{"id":24015,"name":"\u0410\u0440\u043c\u0435\u0439\u0441\u043a\u0438\u0435 \u043d\u0430\u0440\u0443\u0447\u043d\u044b\u0435 \u0447\u0430\u0441\u044b AMST","country":{"code":"KZ","name":"\u041a\u0430\u0437\u0430\u0445\u0441\u0442\u0430\u043d"},"price":"13790","price2":"27580","currency":{"code":"KZT","name":"\u0442\u04a3\u0433"}},"27130":{"id":27130,"name":"\u0410\u0440\u043c\u0435\u0439\u0441\u043a\u0438\u0435 \u043d\u0430\u0440\u0443\u0447\u043d\u044b\u0435 \u0447\u0430\u0441\u044b Amst","country":{"code":"RU","name":"\u0420\u043e\u0441\u0441\u0438\u044f"},"price":"1990","price2":"3880","currency":{"code":"RUB","name":"\u0440\u0443\u0431"}},"34230":{"id":34230,"name":"\u0410\u0440\u043c\u0435\u0439\u0441\u043a\u0438\u0435 \u043d\u0430\u0440\u0443\u0447\u043d\u044b\u0435 \u0447\u0430\u0441\u044b Amst","country":{"code":"UZ","name":"\u0423\u0437\u0431\u0435\u043a\u0438\u0441\u0442\u0430\u043d"},"price":"329000","price2":"658000","currency":{"code":"UZS","name":"\u0441\u0443\u043c"}}}';
$dataOffer = '{"id":24015,"name":"\u0410\u0440\u043c\u0435\u0439\u0441\u043a\u0438\u0435 \u043d\u0430\u0440\u0443\u0447\u043d\u044b\u0435 \u0447\u0430\u0441\u044b AMST","country":{"code":"KZ","name":"\u041a\u0430\u0437\u0430\u0445\u0441\u0442\u0430\u043d"},"price":"13790","price2":"27580","currency":{"code":"KZT","name":"\u0442\u04a3\u0433"}}';
$is_geo_detect = '';
$productName = 'Армейские наручные часы AMST';
$invoice = 'index.php';
$push_link = '';
$language = 'ru';
$companyInfo = array('address' => '350062, КРАСНОДАРСКИЙ КРАЙ, КРАСНОДАР Г., ИМ. АТАРБЕКОВА УЛ., Д. 1/1, ЛИТЕР А, ПОМЕЩ. 23', 'detail' => 'ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ "К-ТРЕЙД" ОГРН: 1182375022169 ИНН: 2311255615 КПП: 231101001 e-mail: K-trade@mail.ru skype: KTrade');
$companyInfoEN = array('address' => '16 George street, London, UK. skype: Galaxy-trade, email: Galaxy-trade2000@gmail.com', 'detail' => 'Galaxy Trade LTD');
$fb_verification = '';
$showcase_url = '';

$_debug = False; // установите True для вывода дополнительной информации для отладки и поиска ошибок
$pixels = [
    'fb_pixel', 'fb_verify', 'google_pixel', 'google_adw_pixel', 'tiktok_pixel', 'topmail_pixel', 'vk_pixel', 'yandex_metrika', 'mail_pixel'
];

if(!$apiKey){
    echo 'Ключ доступа к API не определен. Получите в личном кабинете или обратитесь в службу поддержки';
    die;
}

if(!$offer_id){
    echo 'ID оффера не определен';
    die;
}

/**
 * Конверсионные элементы для лендинга.
 *
 * Для подключения конверсионного элемента его необходимо внести в массив $plugins. Где ключ - название конверсионного
 * элемента, а значение массив с необходимыми параметрами, если параметры не нужны - пустой массив.
 *
 * Пример:
 * $plugins = [
 *      'online_visitors_top' => [],
 *      'delivery' => [],
 *      'promocode' => ['promocode' => 'super'],
 *      'popup' => ['timeout' => 15],
 * ];
 *
 * Для активации элемента раскомментируйте строку в массиве $plugins, который объявлен ниже.
 * Параметры установлены по умолчанию.
 */

$plugins = [
#    'corona_delivery_top' => [],
#    'corona_delivery_eng_top' => [],
#    'online_visitors_top' => [],
#    'quick_order' => [],
#    'promocode' => ['promocode' => 'sale'],
#    'online_visitors' => [],
#    'made_order' => [],
#    'delivery' => [],
#    'freeze_price' => [],
#    'recall' => ['timeout' => 10],
#    'popup' => ['timeout' => 20],
#    'sale_11_ru_top' => [],
#    'black_friday_ru_top' => [],
#    'black_friday_eng_top' => [],
#    'christmas_sale_ru_top' => [],
#    'christmas_sale_eng_top' => [],
];

/**
 * Из элементов 'corona_delivery_top', 'corona_delivery_eng_top', 'online_visitors_top' одновременно можно
 * выбрать только один. То же самое с элементами 'quick_order', 'promocode'.
 *
 * Элементы у которых доступны все языки, язык зависит от значения переменной $language.
 *
 *
 * Описание конверсионных элементов:
 *
 * 'corona_delivery_top' - Бесконтактное вручение (в условиях вируса).
 * Сверху лендинга отображается информация о бесконтактной доставке. Все языки.
 *
 * 'corona_delivery_eng_top' - Бесконтактное вручение (в условиях вируса).
 * Сверху лендинга отображается информация о бесконтактной доставке на английском. Только английский язык.
 *
 * 'online_visitors_top' - Плашка в шапке "посетители онлайн".
 * Сверху лендинга отображаются показатели продаж и посетителей за день. Все языки.
 *
 * 'quick_order' - Форма быстрого заказа. Закрепленная внизу экрана строка для быстрого заказа. Все языки.
 *
 * 'promocode' - Промо-код. Форма для ввода промокода для получения скидки. Все языки.
 * Необходимо указать значение промокода. Пример: 'promocode' => ['promocode' => 'super']
 *
 * 'online_visitors' - Поплавок "просматривают сейчас сайт".
 * Окошко сбоку с показателями, сколько посетителей сейчас на сайте. Все языки.
 *
 * 'made_order' - Поплавок сделавших заказ справа. Всплывающее каждые 30 секунд окошко о клиентах, оформивших заказ.
 * Только русский язык.
 *
 * 'delivery' - Информация о доставке. Всплывающая плашка с информацией о доставке по ГЕО клиента. Все языки.
 *
 * 'freeze_price' - Мы заморозили цену. Закрепленное справа окошко с "замороженным" курсом доллара. Только русский язык.
 *
 * 'recall' - Кнопка "Перезвоните мне". Через заданное время внизу лендинга появляется кнопка "Перезвонить". Все языки.
 * Необходимо указать время в секундах. Пример: 'recall' => ['timeout' => 10]
 *
 * 'popup' - Попап после открытия ленда в секундах. Через заданное время появляется попап с формой заказа. Все языки.
 * Необходимо указат время в секундах. Пример: 'popup' => ['timeout' => 20]
 *
 * 'sale_11_ru_top' - Вверху лендинга появляется баннер 'Всемирный День Шопинга'. Только русский язык.
 *
 * 'black_friday_ru_top' - Вверху лендинга появляется баннер 'Черная пятница'. Русский язык.
 *
 * 'black_friday_eng_top' - Вверху лендинга появляется баннер 'Black friday'. Английский язык.
 *
 * 'christmas_sale_ru_top' - Вверху лендинга появляется баннер 'Новогодняя распродажа'. Русский язык.
 *
 * 'christmas_sale_eng_top' - Вверху лендинга появляется баннер 'Christmas sale'. Английский язык.
 *
 */
