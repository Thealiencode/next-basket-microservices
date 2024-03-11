Project Title
Next Basket Microservice ASSESSMENT

Table of Contents
Overview
Getting Started
Prerequisites
Docker Setup
Usage
Running Tests
Contributing
License
Overview
Brief project overview and purpose.

Getting Started
Nextbasket Internal Microservice assessment
This spins up two symfony microservices [user-sevice and notification-service] and they communicate using RabbitMQ

Prerequisites
Docker

Docker Setup
Clone the repository:

bash
Navigate to the project directory:

bash
Copy code
cd your-repo
Build the Docker containers:
This command is build and start the containers

bash
Copy code
docker-compose up

Access the User Microservice application at http://localhost:8000.
Access the NOtification Microservice application at http://localhost:8081.



Running Tests
Inside the user docker container run 
bash
copy code 
./vendor/bin/phpunit
