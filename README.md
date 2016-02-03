# Curator
Project Curator is a PHP discovery and learning project. The Curator application itself will be a authentication and user management system. The mission of this project is to improve understanding of PHP as well as coding practices. This project will include the following guidelines:

- PHP 7.0+
- Versioning (GIT)
- Bootstrap 3.3.6 (Bootstap 4.0 when released)
- MySQL & MSSQL compatible
- PDO
- Selectable levels of encryption
- Use of namespaces
- Highly efficient and organized code
- Use of PHP 'Best Practices' techniques
- Multi-Language support

####Start Date
January 16, 2016

####Author
James Druhan

####Features

##Sessions

- Admin configurable session encryption (hash_function).
- Smart HTTPS detection.
- IPV4 & IPV6 validation.
- Admin configurable setting for validating user using IP.
..-Session IP is encypted for added hijack protection.
..-Smart IP detection! On invalid IP due to TOR/Proxy services Curator will still generate a unique key for IP validation.
- Admin configurable setting for validating user agent.
..-User agent is encrypted for added hijack protection.
..-Admin configurable setting for time out duration.
..-Admin configurable settings for Session ID regeneration (time and chance).

##Error Logging
- Smart detailed error logging to file.

##Language
- Complete multi-language support - even error logging!