# WorldsBorder

###### Simple plugin allowing you to define a different border for each world on your server.

## Features

| Feature                                           | WorldsBorder    | WorldLimits  |
|---------------------------------------------------|-----------------|--------------|
| `Prevent head movements from executing code`      | ✔               | ❌           |
| `Multiple worlds border support`                  | ✔               | ❌           | 
| `Kick possibility`                                | ✔               | ❌           | 
| `Teleport possibility`                            | ✔               | ✔           |

## Config
```yaml
#   __          __        _     _     ____                _
#   \ \        / /       | |   | |   |  _ \              | |
#    \ \  /\  / /__  _ __| | __| |___| |_) | ___  _ __ __| | ___ _ __
#     \ \/  \/ / _ \| '__| |/ _` / __|  _ < / _ \| '__/ _` |/ _ \ '__|
#      \  /\  / (_) | |  | | (_| \__ \ |_) | (_) | | | (_| |  __/ |
#       \/  \/ \___/|_|  |_|\__,_|___/____/ \___/|_|  \__,_|\___|_|
#
#
# worlds:
#    world name:
#     x: coordinates
#     z: coordinates
#     message: "Message" or null
#     kick: true|false
#     teleport: true|false
#     teleportPosition: "x:y:z:world"

worlds:
  world:
    x: 1000
    z: 1000
    message: null
    teleport: false
    teleportPosition: "0:0:0:world"
    kick: false
    kickMessage: ""
  worlds2:
    x: 500
    z: 500
    message: "You have reached the world border !"
    teleport: false
    teleportPosition: "0:0:0:world"
    kick: false
    kickMessage: ""
```
