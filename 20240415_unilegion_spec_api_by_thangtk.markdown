

# DIGI-TEXX Gateway API Documentation
**Project name:** ONE DIGISOFT PLATFORM<br>
**Taken by:** Truong Kim Thang - tkthang@digi-texx.vn<br>
**Version:** v1.0.1

## 1. Contents
- [DIGI-TEXX Gateway API Documentation](#digi-texx-gateway-api-documentation)
  - [1. Contents](#1-contents)
  - [2. Revision History](#2-revision-history)
  - [3. Introduction](#3-introduction)
  - [4. Base URL](#4-base-url)
  - [5. Error Handling](#5-error-handling)
  - [6. Token Endpoint](#6-token-endpoint)
    - [6.1. Get access token endpoint](#61-get-access-token-endpoint)
      - [Request Path Parameters](#request-path-parameters)
      - [Request Parameters](#request-parameters)
      - [Success Response](#success-response)
    - [6.2. Refresh access token endpoint](#62-refresh-access-token-endpoint)
      - [Request Path Parameters](#request-path-parameters-1)
      - [Request Parameters](#request-parameters-1)
      - [Success Response](#success-response-1)
  - [7. Resource Endpoint](#7-resource-endpoint)
    - [7.1. Import endpoint](#71-import-endpoint)
      - [Request Path Parameters](#request-path-parameters-2)
      - [Request Parameters](#request-parameters-2)
      - [Request Body Example](#request-body-example)
      - [Response](#response)
    - [7.2. Rework endpoint](#72-rework-endpoint)
      - [Request Path Parameters](#request-path-parameters-3)
      - [Request Parameters](#request-parameters-3)
      - [Request Body Example](#request-body-example-1)
      - [Response](#response-1)
    - [7.3. Get Result Endpoint](#73-get-result-endpoint)
      - [Request Path Parameters](#request-path-parameters-4)
      - [Request Parameters](#request-parameters-4)
      - [Request Body Example](#request-body-example-2)
      - [Response](#response-2)
  - [8. Support](#8-support)
  
  
## 2. Revision History
| **Version**      | **Description**                                    | **Date Modified** | **Author**       |
| ---------------- | -------------------------------------------------- | ----------------- | ---------------- |
| v1.0.0           | Release version 1.0.0                              | 29-Mar-2024       | Truong Kim Thang |


## 3. Introduction
- The API Gateway serves as a centralized entry point for accessing various microservices within our system. It provides a unified interface for clients to interact with importing and exporting services through the API.

- Authentication is required using oAuth 2.0.
## 4. Base URL
The base URL for all API endpoints: `https://uat-login.digi-texx.vn`

All URL in this file is used for demonstration purpose only, you will need to request DIGI-TEXX provide working URL.

## 5. Error Handling
The API may return the following error codes:

- `400 Bad Request`: Invalid request parameters.
- `401 Unauthorized`: Missing or invalid API key.
- `404 Not Found`: Resource not found.
- `500 Internal Server Error`: Unexpected server error.
 
## 6. Token Endpoint
### 6.1. Get access token endpoint
Create a HTTP request with credentials to receive access token, this access token is required to access another API

**URL** : `/auth/realms/demo-connection-1/protocol/openid-connect/token`

**Method** : `POST`

#### Request Path Parameters
| Name                 | Description                                        |
| -------------------  | -------------------------------------------------- |
| demo-connection-1    | The realm identifier                               |

#### Request Parameters

| Name          | Description                                             |
| ------------- | ------------------------------------------------------- |
| grant_type    | The grant type parameter must be set to "password" |
| client_id     | The client identifier                                   |
| client_secret | The client_secret                                       |
| username	    | The user’s username                                     |
| password	    | The user’s password                                     |

**Sample as CURL** :

```curl
curl --location --request POST 'https://uat-login.digi-texx.vn/auth/realms/demo-connection-1/protocol/openid-connect/token' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'client_id=demo-connection-1' \
--data-urlencode 'username=demo-connection-1' \
--data-urlencode 'password=R1pIsF2u5aR4' \
--data-urlencode 'grant_type=password' \
--data-urlencode 'client_secret=adcdbc25-f8cb-4e8a-b513-04287b34d90a'

```

#### Success Response

**Code** : `200 OK`

**Response examples** :

```json
{
"access_token": "eyJhbGciOiKyJzI7djzWoNWgTblxkJj2J95KwEqvdBjHVzZT74nATGe63xzcg...",
"expires_in": 300,
"refresh_expires_in": 1800,
"refresh_token": "eyJhbGciOiJIUzI1NiIsInR5cC3LXByb2ZpbHGk_NR7Ktl751JGcGYxy44y30...",
"token_type": "bearer",
"not-before-policy": 0,
"session_state": "f967e592-5b8d-489d-9552-dc584c4e02e2",
"scope": "profile email"
}
```

| Name               | Description                                                                            |
| ------------------ | -------------------------------------------------------------------------------------- |
| access_token       | The access token used to authenticate requests to protected resources.                 |
| token_type         | The type of token (e.g., "Bearer").                                                    |
| expires_in         | The lifetime in seconds of the access token.                                           |
| refresh_token      | Optional. A refresh token to obtain a new access token when the current one expires.   |
| refresh_expires_in | The lifetime in seconds of the refresh_token                   |

---

### 6.2. Refresh access token endpoint

Create a HTTP request with the refresh token which was provided to receive new access token, this access token is required to access another API

**URL** : `/auth/realms/demo-connection-1/protocol/openid-connect/token`

**Method** : `POST`

#### Request Path Parameters
| Name                 | Description                                        |
| -------------------  | -------------------------------------------------- |
| demo-connection-1    | The realm identifier                               |

#### Request Parameters

| Name          | Description                                             |
| ------------- | ------------------------------------------------------- |
| grant_type    | The grant type parameter must be set to "refresh_token" |
| client_id     | The client identifier                                   |
| client_secret | The client_secret                                       |
| refresh_token | The provided refresh token                              |

**Sample as CURL** :

```curl
curl -i -X POST \
 -H "Content-Type:application/x-www-form-urlencoded" \
 -d "client_id=demo-connection-1" \
 -d "grant_type=refresh_token" \
 -d "client_secret=adcdbc25-f8cb-4e8a-b513-04287b34d90a" \
 -d "refresh_token=eyJhbGciOiJIUzI1NiIsInR5cCIgOiA..."
'https://uat-login.digi-texx.vn/auth/realms/demo-connection-1/protocol/openid-connect/token

```

#### Success Response

**Code** : `200 OK`

**Response examples** : (same login url)

```json
{
"access_token": "eyJhbGciOiKyJzI7djzWoNWgTblxkJj2J95KwEqvdBjHVzZT74nATGe63xzcg...",
"expires_in": 300,
"refresh_expires_in": 1800,
"refresh_token": "eyJhbGciOiJIUzI1NiIsInR5cC3LXByb2ZpbHGk_NR7Ktl751JGcGYxy44y30...",
"token_type": "bearer",
"not-before-policy": 0,
"session_state": "f967e592-5b8d-489d-9552-dc584c4e02e2",
"scope": "profile email"
}
```
---
## 7. Resource Endpoint
### 7.1. Import endpoint
The import endpoint allows client to upload data into the one digisoft platform. This endpoint serves as the entry point for initiating the import process.

**URL** : `/api/realms/demo-connection-1/import`

**Method** : `POST`

**Authentication required** : Yes 
> Users must be authenticated and authorized to access the import endpoint. Authentication credentials (e.g., OAuth token) should be included in the request headers for authentication.

**Request Header** :
> Content-Type : application/json  
> Authorization: Bearer Token (get access token from **Request access token endpoint** )

#### Request Path Parameters
| Name                 | Description                                        |
| -------------------  | -------------------------------------------------- |
| demo-connection-1    | The realm identifier                               |

#### Request Parameters

> Files (Base64): A list of files to be imported, where each file is provided as a base64-encoded string.  

> File Formats: (Optional) Specify the format of each file content if it cannot be inferred from the file extension or content type.  

> Data ID: (Optional) The identifier or target location for the imported data. This can be used to specify where the imported data should be stored or associated within the system.  

> Import Options: (Optional) Additional options or parameters for configuring the import process, such as meta data the process  

#### Request Body Example

```json
{
    "files": [
        {
            "base64": "SGVsbG8gV29ybGQhCg==",
            "name": "image01.jpg", // file name - *required
            "format": "jpg"
        },
        {
            "base64": "Q29uZ3JhdHVsYXRlIQo=",
            "name": "image02.jpg", // file name - *required
            "format": "jpg"
        }
    ],
    "import_options": {
        "data": {
            "field": "field_value"
        },
    },
    "data_id": "data123"
}
```
**Sample as CURL** :

```curl
curl -i -X POST \
   -H "Content-Type:application/json" \
   -H "Authorization:Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiA..." \
   -d \
'{
    "files": [
        {
            "base64": "SGVsbG8gV29ybGQhCg==",
            "name": "image01.jpg", // file name - *required
            "format": "jpg"
        },
        {
            "base64": "Q29uZ3JhdHVsYXRlIQo=",
            "name": "image02.jpg", // file name - *required
            "format": "jpg"
        }
    ],
    "import_options": {
        "data": {
            "field": "field_value"
        },
    },
    "data_id": "data123"
}' \
'https://uat-api.digi-texx.vn/api/realms/demo-connection-1/import'
```

#### Response
> 200 OK: The request was successful, and the import task has been initiated. The response body contains information about the import task, including a request ID.  

Example:

```json 
{
    "request_id": "import123",
    "status": "pending",
    "description": "Import task has been initiated. Please check the status endpoint for updates and get results"
}
```

> 400 Bad Request: The request is malformed or missing required parameters. The response body contains an error message explaining the issue.  

Example:

```json 
{
    "error": "Bad Request",
    "description": "Missing 'files' parameter"
}
```

> 401 Unauthorized: The request lacks valid authentication credentials or the authentication credentials provided are invalid. The client should authenticate and retry the request with valid credentials.

Example:

```json 
{
    "error": "Unauthorized",
    "description": "Authentication credentials are missing or invalid"
}
```

> 404 Not Found: The requested endpoint does not exist.   
 
> 500 Internal Server Error: The server encountered an unexpected condition that prevented it from fulfilling the request. An error message should be logged for investigation.    

Example:

```json 
{
    "error": "Internal Server Error",
    "description": "An unexpected error occurred while processing the import request"
}
```

### 7.2. Rework endpoint
The import endpoint allows client to upload data into the one digisoft platform. This endpoint serves as the entry point for initiating the import process.

**URL** : `/api/realms/demo-connection-1/rework`

**Method** : `POST`

**Authentication required** : Yes 
> Users must be authenticated and authorized to access the import endpoint. Authentication credentials (e.g., OAuth token) should be included in the request headers for authentication.

**Request Header** :
> Content-Type : application/json  
> Authorization: Bearer Token (get access token from **Request access token endpoint** )

#### Request Path Parameters
| Name                 | Description                                        |
| -------------------  | -------------------------------------------------- |
| demo-connection-1    | The realm identifier                               |

#### Request Parameters

> Documents: A list of documents to be imported, where each file is provided as a json format.  

> Field_rework: (Optional) A list of field to be rework.  

#### Request Body Example

```json
{
    "documents": [
        {         
            files:[{
                "base64": "SGVsbG8gV29ybGQhCg==",
                "name": "image01.jpg", // file name - *required
                "format": "jpg"
            }],
            "data": {
                "file1": "value1",
                "file2": "value2",
            }//data of document             
        },
        {
            files:[{
                "base64": "Q29uZ3JhdHVsYXRlIQo=",
                "name": "image02.jpg", // file name - *required
                "format": "jpg"
            }],
            "data": {
                "file1": "value1",
                "file2": "value2",
            }//data of document 
        }
    ],
    "field_rework": ["file1",  "file2"]
}
```
**Sample as CURL** :

```curl
curl -i -X POST \
   -H "Content-Type:application/json" \
   -H "Authorization:Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiA..." \
   -d \
'{
    "documents": [
        {
            files:[{
                "base64": "SGVsbG8gV29ybGQhCg==",
                "name": "image01.jpg", // file name - *required
                "format": "jpg"
            }],
            "data": {
                "file1": "value1",
                "file2": "value2",
            }//data of document             
        },
        {
            files:[{
                "base64": "Q29uZ3JhdHVsYXRlIQo=",
                "name": "image02.jpg", // file name - *required
                "format": "jpg"
            }],
            "data": {
                "file1": "value1",
                "file2": "value2",
            }//data of document 
        }
    ],
    "field_rework": ["file1",  "file2"]
}' \
'https://uat-api.digi-texx.vn/api/realms/demo-connection-1/rework'
```


#### Response
> 200 OK: The request was successful, and the import task has been initiated. The response body contains information about the import task, including a request ID.  

Example:

```json 
{
    "request_id": "import123",
    "status": "pending",
    "description": "Rework task has been initiated. Please check the status endpoint for updates and get results"
}
```

> 400 Bad Request: The request is malformed or missing required parameters. The response body contains an error message explaining the issue.  

Example:

```json 
{
    "error": "Bad Request",
    "description": "Missing 'files' parameter"
}
```

> 401 Unauthorized: The request lacks valid authentication credentials or the authentication credentials provided are invalid. The client should authenticate and retry the request with valid credentials.

Example:

```json 
{
    "error": "Unauthorized",
    "description": "Authentication credentials are missing or invalid"
}
```

> 404 Not Found: The requested endpoint does not exist.   
 
> 500 Internal Server Error: The server encountered an unexpected condition that prevented it from fulfilling the request. An error message should be logged for investigation.    

Example:

```json 
{
    "error": "Internal Server Error",
    "description": "An unexpected error occurred while processing the import request"
}
```

### 7.3. Get Result Endpoint
The get result endpoint allows users to retrieve the result of a previously initiated import task using its unique request ID or Data ID. 
**This is an option when client need retrieve the result or client can provide Open API for recive the result.** 

**URL** : `api/realms/demo-connection-1/import/result` OR `api/realms/demo-connection-1/rework/result`

**Method** : `POST`

**Authentication required** : Yes 
> Users must be authenticated and authorized to access the import endpoint. Authentication credentials (e.g., OAuth token) should be included in the request headers for authentication.

**Request Header** :
> Content-Type : application/json  
> Authorization: Bearer Token (get access token from **Request access token endpoint** )

#### Request Path Parameters
| Name                 | Description                                        |
| -------------------  | -------------------------------------------------- |
| demo-connection-1    | The realm identifier                               |

#### Request Parameters
> ID: The unique identifier (request ID) of the import task for which the result is being requested, Or the unique identifier (Data ID) of the import task for which the body data is being requested.

#### Request Body Example

```json
{
  "id":"import123", // request_id or data_id
}
```

**Sample as CURL** :

```curl
curl -i -X POST \
   -H "Content-Type:application/json" \
   -H "Authorization:Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiA..." \
   -d \
'{
  "id":"import123", // request_id or data_id
}' \
'https://uat-api.digi-texx.vn/demo-connection/api/import/result'
```

#### Response
> 200 OK: The request was successful, and the response body contains the result of the import task, including any relevant data or status information.

> Result will be defined by the specification of the project or {} if task is processing
Example:

> Completed
```json 
{
    "id": "import123", // request_id or data_id
    "status": "completed",
    "result": {
      "field": "field_value"
    } // will be defined by the specification of the project
}
```

> Processing
```json 
{
    "id": "import123", // request_id or data_id
    "status": "Processing",
    "result": {}
}
```

> Not found
```json 
{
    "id": "import123", // request_id or data_id
    "status": "Not Found",
    "result": {}
}
```

> 400 Bad Request: The request is malformed or missing required parameters. The response body contains an error message explaining the issue.

Example:

```json 
{
    "error": "Bad Request",
    "description": "Missing 'id' parameter" // id not found in the system
}
```

> 401 Unauthorized: The request lacks valid authentication credentials or the authentication credentials provided are invalid. The client should authenticate and retry the request with valid credentials.

Example:

```json 
{
    "error": "Unauthorized",
    "description": "Authentication credentials are missing or invalid"
}
```
> 404 Not Found: The requested endpoint does not exist.

> 500 Internal Server Error: The server encountered an unexpected condition that prevented it from fulfilling the request. An error message should be logged for investigation.

Example:

```json 
{
    "error": "Internal Server Error",
    "description": "An unexpected error occurred while processing the get result request"
}
```

## 8. Support
For assistance or inquiries related to using the get result endpoint, please contact ONE DIGISOFT TEAM - x@digi-texx.vn.

