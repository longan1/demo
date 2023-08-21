# Demo Project

-This repository provides  Laravel backend api and Nuxt.js frontend application.
-The frontend will function as a Swagger.
## Setup and Usage

To get started with the Dockerized applications, follow these steps:

### Prerequisites

- Docker
- Git

### Cloning the Repository

Clone this repository using Git:

```bash
git clone https://github.com/longan1/demo.git
```
### Build project

Please authorize if request permission

```bash
 cd ./demo
```
```bash
  ./build.sh
```

After the build is completed, your application will run on 2 ports:
http://localhost:8080 for the backend
http://localhost:8080 for the frontend

### Example usage

![Main](https://i.imgur.com/9VxCm6S.png)

-Demo account : 
+email : example@gmail.com
+password: 123123

![Demo Login](https://i.imgur.com/mqEiROy.png)

-Click Authentication to login
![Demo Barrer Token](https://i.imgur.com/sO2ruC5.png)


-Add your key - value for another api 
-For example: Key:store_name , Value: The demo store (If you don't know the required field names, just click the "Try It" button, and it will prompt you for the necessary fields if have)