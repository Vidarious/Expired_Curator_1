- Add message system for form
- Add enable / disable registration
- Create the method that verifies which account fields are required for creation/update and validates data
-   - Method gets list of required form fields - adds to array - compares to array of form fields submitted?

- Account should be a class - Only gets created when login success
- Account Management should be a class that an Account object is passed to
- Create trait for validating account details
- Create method to add user (register)
-   Change register page to no load if logged in.
-   Register page should ask for all the details enabled in settings
- Create trait for determining encryption algorithm
- Create method to authenticate user (login)
- Create method to remember me
- 
- Refer to help file.
- Add max login try setting
- Secure Tip: Regenerate session ID during authentication and changing of sensitive data.
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