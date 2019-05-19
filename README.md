## Installation

Clone the repo:

```bash
cd ~
git clone git@github.com:ljmerza/test-for-ine.git
```

Use docker to run `composer install` to install required modules and make sure the file permissions are correct:

```bash
cd ~/test-for-ine/php/
sudo docker run --rm -v $(pwd):/app composer install
sudo chown -R $USER:$USER ~/test-for-ine/php/
```

Run the php docker container and pass arguments to test intersection:

```bash
cd ~/test-for-ine/php/
sudo docker run --rm -v $(pwd):/app -w /app php:cli php index.php -l 2,3,4,5 -m 4,3,5,6
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
sudo docker run --rm -v $(pwd):/app -w /app php:cli php ./vendor/bin/phpunit tests/
```

## Node app

To run the node app go into the nodejs folder and build the docker file:

```bash
cd ~/test-for-ine/nodejs/
sudo docker build -t ine-test .
```

Run the docker image and pass agruments using the table above:

```bash
sudo docker run ine-test node index -l 2,3,4,5 -m 4,3,5,6
```


## Notes

I spent some time researching different PHP CLI parsers and settled for `commando`. I initially wanted a way to pass in multiple values for an argument so there would only be one `line` argument for example but didn't find a clean way to do this with this module. Instead of using `-l` and `-m` for the two lines, ideally I'd like to be able to pass them both in one flag: `-l 0,0,2,2 3,3,5,5`. There were only three senarios given in the document so only those three were covered. A simple else clause if none of the three conditions are met that printed out a help string would be helpful for this application. For the docker setup, I've never used composer in docker and read conflicting views about including `composer` or not in the docker container. In the end, I settled for a more simple approach of using docker to install the modules directly and running the PHP app directly through the PHP docker image. For the node app, I did not include arguments checking and tests as the node app wasn't included in the document but as a side note in the original phone interview. One last note as to the definition of intersecting on circles. I only checked for circles that actually intersected and returned `false` if a circle was fully within another circle and marked as such in the code comments.