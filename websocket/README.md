## Chat Room

#### Dependencies

* [phpredis](https://github.com/phpredis/phpredis)
* [swoole](http://www.swoole.com/)

#### How to run it?

```ruby
# 1. 安装redis-server
sudo apt-get install redis-server
# 2. 安装上面的两个依赖, 官网教程
# 3. 启动服务器
cd websocket
./server.php
# 4. 访问服务, 在两个不同的浏览器
# visit http://localhost:8000/trading-center/account/user-info?user_id=1
# visit http://localhost:8000/trading-center/account/user-info?user_id=3
```
