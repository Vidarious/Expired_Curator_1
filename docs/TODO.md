- Create session class.
    - After session class is made change language class to setup a Curator language session
    variable. Then get rid of the loadLanguageClass method and change the database language load
    to simply load the required file using the session variable.
- Secure Tip: Regenerate session ID during authentication and changing of sensitive data.
- Create page tracker
- Session security level. Add options for session.hash_bits_per_character, session.hash_function, session.entropy_length

- Session Secure Options
session.hash_bits_per_character (4, 5, 6)
Session encryption algorithm
Frequency of Session ID Regeneration
IP verification
User Agent verification
Random frequency of id regeneration
Timeout freqenency

- Protect folders /files with htaccess

TRAITS: http://www.php.net//manual/en/language.oop5.traits.php
CLOSURES: http://culttt.com/2013/03/25/what-are-php-lambdas-and-closures/
ARRAYS: array_map, array_filter, array_reduce or array_walk