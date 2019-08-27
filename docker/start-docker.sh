#!/usr/bin/env bash
DOCKER_MACHINE="default"

if docker-machine status $DOCKER_MACHINE | grep "Running" &> /dev/null;
  then
    eval "$(docker-machine env $DOCKER_MACHINE)"
    echo "Machine $DOCKER_MACHINE is already running."
  else
    if ! [[ $(docker-machine status $DOCKER_MACHINE | grep "Running") ]] && ! [[ $(docker-machine status $DOCKER_MACHINE | grep "Stopped") ]];
    then
        echo "Create $DOCKER_MACHINE ..."
        ./create-machine.sh
    else
        docker-machine start $DOCKER_MACHINE && eval "$(docker-machine env $DOCKER_MACHINE)"
        eval $(docker-machine env $DOCKER_MACHINE)
        if [ "$(docker-machine active)" != $DOCKER_MACHINE ]; then
          echo "Activation failed";
          exit 1;
        fi
        echo "Machine $DOCKER_MACHINE has been started."
    fi
fi
./update-hosts.sh
