# -*- mode: ruby -*-
# vi: set ft=ruby :


# VARIABLES

BOX_IMAGE = "debian/bookworm64"
PROVIDER = "virtualbox"
NUM_CPUS = 2
MEMORIA_RAM = 2048
NOM_MAQUINA = "daw2-dacomo-sm8a1pr3"
HOSTNAME = "daw2-dacomo-sm8a1pr3.fjeclot.net"
CARPETA_MAQ_FIS1 = "./projectes"
CARPETA_MAQ_VIR1 = "/home/vagrant/projectes"



# CONFIGURACIÓ DE LA MÀQUINA

Vagrant.configure("2") do |config|
	
	# BOX
	config.vm.box = BOX_IMAGE
  
	# CONFIGURACIÓ ESPECÍFICA DEL PROVIDER
	config.vm.provider PROVIDER do |provider|
		provider.name = NOM_MAQUINA
		provider.memory = MEMORIA_RAM
		provider.cpus = NUM_CPUS
		provider.customize ['modifyvm', :id, '--clipboard', 'bidirectional']
	end

	# CONFIGURACIÓ GENERAL
	config.vm.hostname = HOSTNAME	
	config.vm.synced_folder CARPETA_MAQ_FIS1,CARPETA_MAQ_VIR1
	config.vm.network "public_network"	

	# PROGRAMARI A INSTAL·LAR I ORDRES A EXECUTAR DURANT LA CREACIÓ DE LA MÀQUINA (PROVISION)
	config.vm.provision "shell", inline: <<-SHELL
		#
		# Actualització de la llista de programari. Instal·lació del programari general
		#
		sudo apt-get -y update
		sudo apt-get -y install net-tools whois aptitude git zip unzip
		#
		# Ordres d'instal·lació de Docker. Permís a l'usuari vagrant per utiitzar Docker
		#
		sudo apt-get -y install apt-transport-https ca-certificates curl gnupg2 software-properties-common
		curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -
		sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable"
		sudo apt-get update -y
		sudo sudo apt-get -y install docker-ce docker-ce-cli containerd.io docker-compose
		sudo chown -R vagrant:vagrant /home/vagrant/aplicacions
		sudo gpasswd -a vagrant docker		
	SHELL
  
end
