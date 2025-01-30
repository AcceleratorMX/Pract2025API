# API Documentation

This project provides an API to manage users.

## Requirements
To run this project, you need to have Symfony 7 or higher installed.

## Setup

1. **Clone this repository;**
2. **Start the Symfony server: To start the server locally, run the following command:**
```
symfony server:start
```
The server will be running at http://localhost:8000.

**To stop the Symfony server, you can run:**
```
symfony server:stop
```
or **_CTRL+C_**.
## API Endpoints
- **GET /api/users** - Get all users
- **GET /api/users/{id}** - Get a user by ID
- **POST /api/users** - Add a new user
- **PATCH /api/users/{id}** - Update a user by ID
- **DELETE /api/users/{id}** - Delete a user by ID

## Documentation
You can find the full API documentation [here](https://documenter.getpostman.com/view/27467247/2sAYX2LiVJ#8da61d4a-ed39-4760-a6b0-d56a97c67bb1).