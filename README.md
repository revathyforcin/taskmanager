Modules
1. Website
2. Admin Panel
3. API Integration

1. Website
    * Simple layout with products as dynamic content
    * Contact form is just static

2. Admin
    * Only 'admin' can login now
    * If you are importing the DB which I am included in the root directory use below credentials for  login, else you can create using tinker, api, seeder, etc with the role 'admin'
        username/email : test@gmail.com
        password : 123456

    * Admin offers complete CRUD operations for Users, Tasks and Products.

3. API Integration
    * APIs are provided for User registration, login, Product list, add and edit
    * Once a user registered they will get a token use it as a Authorization token
    * Here is the header required for 'Product APIs'
        Accept : application/json
        Authorization : Bearer <auth-token from user registration>
    * Here are the API URLs and params 
        NB: Remember to replace with your URL. Here I am using laravel valet otheerwise it will be http://localhost:8000/...

        1. User Registration
            https://task-manager.test/api/register
            POST

            form-data:
            name
            email
            password
            c_password
            role(admin or staff)
        2. User Login
            https://task-manager.test/api/login
            POST
            
            form-data:
            email
            password
        3. Get All Products
            https://task-manager.test/api/products
            GET

            use headers
            Accept : application/json
            Authorization : Bearer <auth-token from user registration>
        4. Add Product
            https://task-manager.test/api/products
            POST
            
            form-data:
            name
            detail
            price
            image (file type)

            use headers
            Accept : application/json
            Authorization : Bearer <auth-token from user registration>
        5. Update Product
            https://task-manager.test/api/products/{id}
            PUT
            
            form-data:
            optional so use any

            use headers
            Accept : application/json
            Authorization : Bearer <auth-token from user registration>
        6. Delete Product
            https://task-manager.test/api/products/{id}
            DELETE

            use headers
            Accept : application/json
            Authorization : Bearer <auth-token from user registration>
