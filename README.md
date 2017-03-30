# Docker Example

## Setup

### 1. Install Docker + Virtualbox

#### macOS

Docker:
* docker-compose - reads `docker-compose.yml` and manages containers.
* docker-machine - runs the containers

```
brew install docker-compose docker-machine
```

Virtualbox - runs a VM within which containers are run:
```
brew tap caskroom/cask
brew install brew-cask
brew cask install virtualbox
```

### 2. Create a boot2docker VM

If this is your first time setting up a docker, you will need create a boot2docker VM as the docker host. This is a lightweight Linux VM that runs on Virtualbox to host the containers.

Create a docker machine via virtualbox:
```
docker-machine create -d virtualbox default
```

Start the machine:
```
docker-machine start default
```

Set docker environment variables (remember this as you may need to use it again):
```
eval "$(docker-machine env default)"
```

### 3. Turn it on

docker-compose reads from `docker-compose.yml` and manages the containers for you. To start everything up, simply:

```
docker-compose up -d
```

Leave off the `-d` option to run it in the foreground.

### 4. Open it up

This will open the site in your default browser:

```
open "http://$(docker-machine ip default):8080"
```

### 5. Troubleshoot it

You can get a bash shell into your container. First, you need to get the container ID.

```
$ docker ps
CONTAINER ID        IMAGE               COMMAND                  CREATED             STATUS              PORTS                  NAMES
3d5368e3dbb3        dockerexample_web   "/bin/bash /start.sh"    23 minutes ago      Up 20 minutes       0.0.0.0:8080->80/tcp   dockerexample_web_1
a235069ec1c1        mysql:5.7           "docker-entrypoint..."   23 minutes ago      Up 20 minutes       3306/tcp               dockerexample_mysql_1
```

Use the CONTAINER ID to get a bash shell:
```
$ docker exec -it 3d5368e3dbb3 bash
```
