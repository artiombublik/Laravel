# Laravel
Simple Laravel User ADD,UPDATE,DELETE REST API


# [POST] Create User

## {your-website.com}/api/users
--------------------------------------------------------------------------------------------------------
## Query parameters

fname -- string *Required | User First Name

lname -- string *Required | User Last Name

email -- string *Required | User Email

password -- string *Required | User Password

type --  0 | Creates a demo user with Demo Expiration Date | Default
         1 | Creates a Live user

last_4_digits -- if the type you send is 1 then you must send his Credit Card Last 4 Digits.


## Responses
all responses are in json format

SUCCESS -> 200:   status -- String 'success'
                  message -- String 'user has been created successfuly'
                 
ERROR -> 400:     status -- String 'error'
                  message -- an array of errors

         
         






# [PUT] Update User

## {your-website.com}/api/users/{id} - {id} means user id you want to update
--------------------------------------------------------------------------------------------------------
## Query parameters

fname -- string | User First Name

lname -- string | User Last Name

email -- string | User Email

password -- string | User Password

type --  0 | Creates a demo user with Demo Expiration Date | Default
         1 | Creates a Live user

last_4_digits -- if the type you send is 1 then you must send his Credit Card Last 4 Digits.


## Responses
all responses are in json format

SUCCESS -> 200:   status -- String 'success'
                  message -- String 'User updated'
                 
ERROR -> 400:     status -- String 'error'
                  message -- String that contains the error
                  
                  
                  
                  
                  
                  
# [DELETE] Delete User

## {your-website.com}/api/users/{id} - {id} means user id you want to update
--------------------------------------------------------------------------------------------------------
## Query parameters

id -- string | User ID


## Responses
all responses are in json format

SUCCESS -> 200:   status -- String 'success'
                  message -- String 'User deleted'
                 
ERROR -> 400:     status -- String 'error'
                  message -- String that contains the error
                  
                  
                  
