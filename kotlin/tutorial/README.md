# `Kotlin` を実行する

## command history

vagrant box add bento/ubuntu-18.04 
  -> 3) virtualbox
vagrant init bento/ubuntu-18.04

作業ディレクトリに shareディレクトリ を作成

Vagrantfile の書き換え
  ```
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.synced_folder "./share", "/vagrant/share", type: "virtualbox"
  ```

vagrant up
vagrant plugin install vagrant-vbguest
vagrant vbguest
vagrant reload
vagrant ssh

sudo apt-get install zip

curl -s https://get.sdkman.io | bash
source "/home/vagrant/.sdkman/bin/sdkman-init.sh"

sdk install kotlin
sdk install java

cd share
vim test.kt
  ```
  fun main(args: Array<String>) {
    println("Hello, World!")
  }
  ```

kotlinc ./test.kt -include-runtime -d test.jar
kotlin test.jar
