# led-matrix-controller
Web based controller for led panels. This code is designed for Raspberry Pi using HUB75 led panels. You can buy the panels cheap from China, or get them off eBay or adafruit or a multitude of other places.

Clone the repository into your home folder (/home/pi, probably) and then you can cd in and run setup.sh. The setup script will install apache2 and move the required files into the web directory and change a few permissions for apache. The only way this can work, as far as I'm aware, is by adding www-data to sudoers, this is VERY unsafe and as such this code should only be used on a device you have locked down and that doesn't provide any other services. The reason www-data needs to be able to run sudo is because the rpi gpio pins can only be accessed with sudo.

Again, let me be clear, the way this works is very, very insecure and should not be used unless you have your pi locked down and not serving any other purpose. It should also absolutely not be on a public facing network.
