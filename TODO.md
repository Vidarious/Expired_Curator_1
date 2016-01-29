- review array_map, array_filter, array_reduce or array_walk
- Can I use closures? http://culttt.com/2013/03/25/what-are-php-lambdas-and-closures/
- http://stackoverflow.com/questions/21373478/n-vs-php-eol-vs-br
- Use Traits http://www.php.net//manual/en/language.oop5.traits.php
- Create session class.
    - After session class is made change language class to setup a Curator language session
    variable. Then get rid of the loadLanguageClass method and change the database language load
    to simply load the required file using the session variable.
    
- Session security level. Add options for session.hash_bits_per_character, session.hash_function, session.entropy_length

- Change database connection fail catch to log the error.

- Protect folders /files with htaccess
