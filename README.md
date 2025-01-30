# API Documentation

This project provides an API to manage users.

## Requirements
To run this project, you need to have Symfony 7 or higher installed.

## Setup

1. **Clone this repository;**
2. **Update ***Composer*** components with a command:**
```
composer update
```
3. **Generate ***SSL-keys*** with a command:**
```
php bin/console lexik:jwt:generate-keypair
```
4. **Start the ***Symfony*** server:**

To start the server locally, run the following command:
```
symfony server:start
```
The server will be running at http://localhost:8000.

To stop the server, you can run:
```
symfony server:stop
```
or ***CTRL+C***.

## Documentation
You can find the **full API** documentation [here](https://documenter.getpostman.com/view/27467247/2sAYX2LiVJ#8da61d4a-ed39-4760-a6b0-d56a97c67bb1).