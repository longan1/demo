# MTK-CORPORATE-SITE
-This project is for sending emails

## Setup and Usage

To get started with the Dockerized applications, follow these steps:

### Prerequisites

- Docker
- Git

### Cloning the Repository

Clone this repository using Git:

```bash
git clone https://vand.backlog.com/git/MTK_TENANT_SITE_DEV_PJ/MTK-CORPORATE-SITE.git
```
### Build project
Run docker compose

```bash 
  docker compose up 
```
Exec to container
```bash 
  docker compose exec app bash 
```
Install composer
```bash 
  composer install 
```
Migrate database
```bash 
  php artisan migrate 
```
Change .env
```bash 
    MAIL_MAILER=
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=
    MAIL_FROM_NAME=""
    MAIL_SUBJECT=''
    CONTACT_MAIL_FROM=""
    CONTACT_MAIL_TO=""
```
