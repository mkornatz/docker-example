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

