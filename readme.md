# Simple demonstration

This repo is meant as a simple demonstration for 
ticket [#315](https://github.com/gaul/s3proxy/issues/315) in gaul/s3proxy.

## Usage:

* `./start` to start the containers and install the dependencies
* `./stop` to stop the containers

## Test:

Open `http://localhost/`

This is what happens:

* it connects to the S3 container
* it downloads a file from the S3 container into the PHP container and displays the contents
* it generates a pre-signed URL for the same file

## Ticket 315

Right now the pre-signed URL cannot be opened in the browser because the host is set to `http://s3`.
It would be very helpful to have an override option to get `http://localhost:9090` instead.