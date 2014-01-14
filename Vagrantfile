# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise64"
  config.vm.provision :shell, :path => "bootstrap.sh"
  config.vm.network :forwarded_port, guest: 80, host: 8080

  config.vm.synced_folder "public", "/var/www", :owner=> 'www-data', :group=>'www-data', :mount_options => ['dmode=775', 'fmode=775']

  config.vm.provider "virtualbox" do |v|
    v.memory = 512
  end
end
