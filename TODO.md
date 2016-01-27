- Finish Database class
- Create session class.
    - After session class is made change language class to setup a Curator language session
    variable. Then get rid of the loadLanguageClass method and change the database language load
    to simply load the required file using the session variable.
    
- Session security level. Add options for session.hash_bits_per_character, session.hash_function, session.entropy_length

- Change database connection fail catch to log the error.

- Protect folders /files with htaccess
