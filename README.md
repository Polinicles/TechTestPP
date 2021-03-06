### ElevatorSim

## Quick guide

### Requirements

* docker https://www.docker.com/
* docker-compose https://docs.docker.com/compose/
* kubectl https://kubernetes.io/docs/tasks/tools/install-kubectl/
* minikube https://kubernetes.io/docs/tasks/tools/install-minikube/

### Get started

Clone the project: 

```sh
$ git clone git@github.com:Polinicles/ElevatorSim.git
$ cd ElevatorSim
```

## Docker

Start the project

```sh
$ docker-compose up -d
```

Connect to the bash of the PHP container

```sh
$ docker-compose exec php bash
```

## App

### Fixtures

In order to provide some fake data there are some fixtures for the sequences and elevators

```sh
$ bin/console doctrine:fixtures:load --append
```

### Commands

#### Generate Calls from defined Sequences

```sh
$ bin/console app:call:generate
```

The sequences and elevators number are defined in the ```AppFixtures.php```

#### Generate report of the calls

```sh
$ bin/console app:call:process
```

There's a report file generated called ```report.txt```

### Tests

Run Unit tests
```sh
$ /vendor/bin/phpunit --testsuite=unit-tests --stop-on-failure
```

## Kubernetes

The environment is read to deploy but it needs to define an image hub like GCR

```sh
gcr.io/{gce-project}/{name-of-image}
```

Once defined, it has to tag and push the image to the hub

## Connect to the MySQL DDBB
```sh
HOST=127.0.0.1
user=root
password=root
db=db
```

## Improvements

- Use InMemory Repository type instead of MySQL
- Create MakeFile
- Code coverage for all classes
- Manage calls that can't be answered when there're not enough elevators
- Hability to define starting number of elevators or sequences
- Exceptions Handling
- Throwing domain events
- Refresh DB everytime the Docker container is created to avoid duplicated data
