<?php
return [
    'header' => env('TEXT_HEADER', 'Live F&Q'),
    'description1' => env('TEXT_DESCRIPTION1', 'Hier können Sie Fragen zum Livestream der katholischen Pfarrei Seliger Johannes Prassek formulieren, welche anschließend von den Beteiligten beantwortet werden.'),
    'description2' => env('TEXT_DESCRIPTION2', 'Bitte stellen Sie nur eine Frage gleichzeitig. Wenn Sie mehrere Fragen stellen wollen, schicken Sie bitte zunächst die erste Frage ab und füllen das Formular erneut aus.'),
    'consent' => env('TEXT_CONSENT', 'Ich bin damit einverstanden, dass diese Frage und falls angegeben der Name gespeichert und im Livestream veröffentlicht wird.'),
    'paceholder_name' => env('PLACEHOLDER_NAME', 'Felix Maier'),
    'placeholder_question' => env('PLACEHOLDER_QUESTION', 'Ich möchte gerne wissen...'),
    'imprint' => env('IMPRINT_LINK', 'https://www.google.de'),
    'anonymous' => env('ANONYMOUS_QUESTION', true),
    'chat_id' => env('CHAT_ID'),
    'api_key' => env('API_KEY')
];
