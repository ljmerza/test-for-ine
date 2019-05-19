## Installation

Clone the repo:

```bash
cd ~
git clone git@github.com:ljmerza/test-for-ine.git
```

Use docker to run `composer install` to install required modules and make sure the file permissions are correct.

```bash
cd ~/test-for-ine/php/
sudo docker run --rm -v $(pwd):/app composer install
sudo chown -R $USER:$USER ~/test-for-ine/php/
```

Run the php docker container and pass arguments to test interesection

```bash
cd ~/test-for-ine/php/
docker run --rm -v $(pwd):/app -w /app php:cli php index.php -l 2,3,4,5 -m 4,3,5,6
```

The above example passes two lines to check intersection. See table below for other arguments:

| Argument | Shape   | Value       |
|----------|---------|-------------|
| l        | line1   | x1,y1,x2,y2  |
| m        | line2   | x1,y1,x2,y2 |
| c        | circle1 | x,y,r       |
| d        | circle2 | x,y,r       |
| p        | point   | x,y         |


## Testing
To run php unit testing:

```bash
cd ~/test-for-ine/php/
docker run --rm -v $(pwd):/app -w /app php:cli php ./vendor/bin/phpunit tests/
```

## Node app

To run the node app go into the nodejs folder and build the docker file

```bash
cd ~/test-for-ine/nodejs/
docker build -t ine-test .
```

Run the docker image and pass agruments using the table above:

```bash
docker run ine-test node index -l 2,3,4,5 -m 4,3,5,6
```


## Notes

