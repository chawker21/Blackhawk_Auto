<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 10px;
        }

        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        div {
            margin: 0 20%; /* Top and bottom margins are 0, left and right margins are 20% */
        }
        img {
            width: 100%;
            height: auto;
        }


        h2 {
            color: #444;
            text-align: center;
        }

        p, li {
            font-size: 16px;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 10px 0;
        }

        .code-container {
            background: #121212;
            color: #fff;
            border: 1px solid #ccc;
            padding: 15px;
            margin: 20px auto; /* This will keep the code container centered within the div */
            width: 100%; /* Adjust width as necessary, considering the div's margins */

            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }
        .optional {
           background: #121212;
            color: ;
        }

        pre {
            color: #121212;
            padding: 10px;
            background: #f9f9f9;
            border-left: 3px solid #7c7c7c;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
        }


        button {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .alert-info {
            color: #00529B;
            background-color: #BDE5F8;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .custom-alert {
            border-radius: 5px;
        }


        .custom-alert p {
            margin: 0 0 20px 0;
        }

        #searchBox {
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .imgsmall {
            width: 50%;
            height: auto;
        }


    </style>
    <!-- Include any external CSS or JS here -->
    <title>LAMP Server Setup Instructions</title>
</head>
<body>
<div>
    <header>
        <h1>LAMP Server Setup Instructions</h1>
    </header>
    <p>Welcome to the LAMP Server Setup Guide! A LAMP server is a powerful and widely-used combination of free,
        open-source software. The acronym stands for Linux (operating system), Apache (web server), MySQL (database),
        and PHP (programming language). This stack is highly regarded for its stability, flexibility, and customization
        capabilities. It's an ideal choice for developing and hosting dynamic websites and web applications. In this
        guide, we will walk through the steps to install and configure a LAMP server, ensuring you have a solid
        foundation for your web development projects.</p>
    <h2>Lamp</h2>
    <!--<input type="text" id="searchBox" onkeyup="searchFunction()" placeholder="Search for commands...">-->
    <ul>
        <li><p>First thing is to update and upgrade the Linux installation...</p>
            <div class="code-container">

                <pre id="codeBlock1">sudo apt-get update && sudo apt-get dist-upgrade</pre>
                <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock1')">Copy</button>
            </br>
            <p>After entering the update command it will ask for a password, this is the password you set when you installed Ubuntu. After updating you will be given an option to add a new user if you are installing this for another user.</p>
            <img class="imgsmall" src="GraphicalDocument_Images/Ubuntu_Open_Start_4.jpg" alt="Image showing password prompt in the Ubuntu Terminal">
                <p>It will then look for updates and let you know how much file size it will take to install them and verify that you want to continue</p>

                <img class="imgsmall" src="GraphicalDocument_Images/Ubuntu_Open_Start_5.jpg" alt="Image showing update installation confirmation in the Ubuntu Terminal">
                <p>Simply type [Y] and [enter] to install the security and upgrade updates.</p>
            </div>



            <p> - optionally, Using the command <i>adduser username</i> adds a new user...</p>

            <hr>
            <div class="code-container">
                <p>adduser is utility that adds a new user to the Ubuntu system, This is beneficial to security for assigning the least amount of priviliges for the user which among other things limits Risk of compromised accounts to that single user.</p>
                <pre id="codeBlock2">sudo adduser newusername</pre>
                <p>Be sure to replace "newusername" with your desired username</p>
                <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock2')">Copy</button>
                <br>
                <p>This is where the name preceeding the @ symbol comes from</p>
                <img class="imgsmall" src="GraphicalDocument_Images/Ubuntu_Open_Start_8.jpg" alt="Image showing user name in the Ubuntu Terminal">

            </div>

            <div class=" code-info alert alert-info border border-dark" style="font-weight:bold"><i
                    style="font-weight:normal;">Set password prompts:</i><br>
                Enter new UNIX password:<br>
                Retype new UNIX password:<br>
                passwd: password updated successfully<br></div>
            <p> The interface then prompts for user information, default is ok</p>
            <div class=" code-info alert alert-info border border-dark" style="font-weight:bold"><i
                    style="font-weight:normal;">User information prompts:</i><br>
                Changing the user information for username<br>
                Enter the new value, or press ENTER for the default<br>
                Full Name []:<br>
                Room Number []:<br>
                Work Phone []:<br>
                Home Phone []:<br>
                Other []:<br>
                Is the information correct? [Y/n]<br></div>
            <p> the useradd command will then prompt you for a password and confirmation.</p>
                </br>

            <div class="code-container optional">
                <h2>*Optional*</h2>
                <p>The preceding command - adduser - is a user-friendly way for beginners because it will guide you through the process of adding a password, useradd is a command that you can use if you want to add the password automatically, You can do this with an additional command:</p>
                </p>
                <pre id="codeBlock3">sudo useradd -m -s /bin/bash newusername</pre>
                <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock3')">Copy</button>

                <pre id="codeBlock4">sudo passwd newusername</pre>
                <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock4')">Copy</button>
                <p>Be sure to replace "newusername" with your desired username</p>
                <br>
                <p>the -m flag creates a home directory for the user, the -s flag sets the default shell for the user, in this case bash. </p>

                <p>these flags are typically set by default using the adduser, which may be another benefit unless you need to customize these settings.</p>
            </div>
            <p>To get started with installing and configuring the LAMP Server on the Raspberry Pi We
                install Apache, MySQL, PHP, PHPmyadmin and a few additional files for PHP. Ive found
                this can be done in
                one step for the most part. The following takes a few minutes.</p>
            <p>First Create a new Source List:</p>
            <div class="code-container">
                <h2>Setting up Raspberry Pi OS Bullseye</h2>
                <p>First, create a new source list to get the latest compatible packages for Raspberry Pi OS Bullseye:</p>

                <p><strong>Create a new Source List:</strong></p>
                <pre><code>sudo nano /etc/apt/sources.list.d/raspi.list</code></pre>
                <p>In that file, add the following line to use the Bullseye repository:</p>
                <pre><code>deb http://archive.raspberrypi.org/debian/ bullseye main</code></pre>
                <p>After pasting the source list, use [Ctrl] + [X] to exit, then press [Y] and [Enter] when prompted to save.</p>

                <p><strong>Update the Package Lists:</strong></p>
                <pre><code>sudo apt-get update</code></pre>

                <p>If you encounter issues with package authentication, you might need to add the Raspberry Pi archive signing key:</p>
                <pre><code>sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 82B129927FA3303E</code></pre>

                <p>Once the repository is added and the package lists are updated, you can proceed with installing or upgrading packages as needed for your Raspberry Pi.</p>
            </div>
            <br>
            <div class="code-container">

                <h2>Setting up Ubuntu on WSL</h2>
                <p>This guide will help you set up and update Ubuntu running on the Windows Subsystem for Linux (WSL).</p>

                <p><strong>Update and Upgrade Ubuntu Packages:</strong></p>
                <p>To ensure that your Ubuntu installation is up-to-date with the latest packages, run the following commands:</p>

                <pre><code>sudo apt-get update</code></pre>
                <pre><code>sudo apt-get upgrade</code></pre>

                <p>This will update the list of available packages and install any new versions of installed packages.</p>

                <p><strong>Additional Configuration (If Required):</strong></p>
                <p>If you need to add additional repositories or third-party sources, you can edit the sources list:</p>

                <pre><code>sudo nano /etc/apt/sources.list</code></pre>

                <p>Be cautious when adding new repositories to ensure they are compatible with Ubuntu and trusted.</p>

                <p>After editing the sources list, remember to update the package lists again:</p>
                <pre><code>sudo apt-get update</code></pre>

                <p><strong>Installing Specific Packages:</strong></p>
                <p>If you need to install specific packages, you can use the apt-get install command. For example, to install Python:</p>

                <pre><code>sudo apt-get install python3</code></pre>

                <p><strong>Notes for WSL Users:</strong></p>
                <ul>
                    <li>WSL does not require a separate configuration for repositories as it uses standard Ubuntu repositories.</li>
                    <li>Ensure that your WSL instance is regularly updated for security and software updates.</li>
                    <li>WSL-specific issues can often be resolved through Windows updates or by checking the WSL documentation and community forums.</li>
                </ul>
            </div>

            <p>To install PHP 8.1 along with some common modules, use the following command:</p>
            <div class="code-container"><pre id="codeBlock_phpInstall">
                                sudo apt install -y php8.1 php8.1-cli php8.1-fpm php8.1-mysql php8.1-xml php8.1-mbstring php8.1-curl php8.1-gd php8.1-intl php8.1-zip</pre>
                <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock_phpInstall')">Copy
                </button>

</div>

<p>Install PHP 7.3 along with some common modules, use the following command:</p>
<div class="code-container"><pre id="codeBlock9">
                                sudo apt install -y -t buster php7.3-fpm php7.3-curl php7.3-gd php7.3-intl php7.3-mbstring php7.3-mysql php7.3-imap php7.3-opcache php7.3-sqlite3 php7.3-xml php7.3-xmlrpc php7.3-zip php-apcu phpmyadmin -y
                            </pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock9')">Copy</button>

</div>
<p>Create an extra Config File</p>
<div class="code-container"><pre id="codeBlock10">
                                sudo nano /etc/php/7.3/fpm/conf.d/90-pi-custom.ini</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock10')">Copy</button>

</div>
<p>Add this to the new config file</p>
<div class="code-container"><pre id="codeBlock11">
                                cgi.fix_pathinfo=0

                                upload_max_filesize=64m
                                post_max_size=64m
                                max_execution_time=600</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock11')">Copy</button>

</div>
<p> finally reload php</p>
<div class="code-container"><pre id="codeBlock12">
                                sudo service php7.3-fpm reload</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock12')">Copy</button>

</div>
<p>- enable rewrite, this is part of the .htaccess configuration that is needed to
    rewrite URLs into a more code based query.</p>

<div class="code-container"><pre id="codeBlock13">
                                sudo a2enmod rewrite</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock13')">Copy</button>

</div>

<p>Next is apache configuration, this involves granting permissions to users, allowing
    apache to look for index.php in the directory, and setting up Virtual hosts that
    allow for
    multiple websites seperated by ports.</p>

<div class="code-container"><pre id="codeBlock14">
                                sudo nano /etc/apache2/apache2.conf</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock14')">Copy</button>

</div>
<div class=" code-info alert alert-info border border-dark" style="font-weight:bold">
    &ltDirectory /&gt <br>
    <p style="margin-left:40px;">Options Indexes FollowSymLinks<br>
        AllowOverride All<br>
        Require all granted</p>
    &lt/Directory&gt<br>
    <br>
    &ltDirectory /usr/share&gt<br>
    <p style="margin-left:40px;">AllowOverride All<br>
        Require all granted</p>
    &lt/Directory&gt<br>
    <br>
    &ltDirectory /var/www/public&gt<br>
    <p style="margin-left:40px;">Options Indexes FollowSymLinks<br>
        AllowOverride All<br>
        Require all granted</p>
    &lt/Directory&gt<br>
    <br>
    &ltIfModule dir_module&gt<br>
    <p style="margin-left:40px;"> DirectoryIndex index.php index.html</p>
    &lt/IfModule&gt<br>
    <br>
    &ltFilesMatch "^\.ht"&gt<br>
    <p style="margin-left:40px;">Order allow,deny<br>
        Deny from all<br>
        Satisfy All</p>
    &lt/FilesMatch&gt
</div>

<p>This is where we configure the virtual host, :80 is the regular port that websites
    are accessed on and does not require any special port fowarding or URL
    modification.</p>

<div class=" code-info alert alert-info border border-dark" style="font-weight:bold">
    &ltVirtualHost *:80&gt<br>

    <p style="margin-left:40px;">ServerName <i
            style="color:orange">local.project.com</i><br>
        ServerAdmin <i style="color:orange">admin@project.com</i><br>
        DocumentRoot /var/www/html/<i style="color:orange">project</i>/public<br>

        &ltDirectory "/var/www/html/<i style="color:orange">project</i>"&gt<br>
    <p style="margin-left:40px;">AllowOverride All</p>
    &lt/Directory&gt<br>

    <p style="margin-left:40px;">ErrorLog ${APACHE_LOG_DIR}/error.log<br>
        CustomLog ${APACHE_LOG_DIR}/access.log combined</p>

    &lt/VirtualHost&gt
</div>

<p> the next Virtual host is optional if you plan on using more than one webpage, by
    using a port which can be any port, I prefer to keep it around 81 to 100. Additional
    websites using
    ports are accessed by adding : and the port number you configure here after the
    initial URL.</p>
<div class=" code-info alert alert-info border border-dark" style="font-weight:bold">
    &ltVirtualHost *:<i style="color:orange">89</i>&gt<br>

    <p style="margin-left:40px;">ServerName <i
            style="color:orange">local.project2.com</i><br>
        ServerAdmin <i style="color:orange">admin@project2.com</i><br>
        DocumentRoot /var/www/html/<i style="color:orange">project2</i>/public</p>

    &ltDirectory "/var/www/html/<i style="color:orange">project2</i>"&gt
    <p style="margin-left:40px;"> AllowOverride All</p>
    &lt/Directory&gt<br>

    <p style="margin-left:40px;">ErrorLog ${APACHE_LOG_DIR}/error.log<br>
        CustomLog ${APACHE_LOG_DIR}/access.log combined</p>

    &lt/VirtualHost&gt
</div>
<p>Insert the following at the bottom of the config file for phpmyadmin</p>
<div class="code-container"><pre id="codeBlock15">Include
                                /etc/phpmyadmin/apache.conf</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock15')">Copy</button>

</div>
<p>additionally if you use additional virtual hosts you will need to configure the ports
    file so the server knows to listen on the ports you assign</p>
<div class="code-container"><pre id="codeBlock16">
                                sudo nano /etc/apache2/ports.conf</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock16')">Copy</button>

</div>
<p>insert the following following the section "Listen 80" making sure the port matches
    what you chose in the additional virtual host.</p>
<div class="code-container"><pre id="codeBlock17">Listen <i
            style="color:orange">89</i>
</div>
<p>- restart apache2 after configuriation is complete.</p></pre>
<button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock17')">Copy</button>

<div class="code-container"><pre id="codeBlock18">
                                sudo /etc/init.d/apache2 restart</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock18')">Copy</button>

</div>
<p>- the easiest way I have found to log into phpmyadmin is to simply create a new user.
    Ive had issues with using root
    mainly because mariadb does not use a password and phpmyadmin seems to generate a
    root pw randomly and there is no way to know it,
    the following logs into mysql as root and creates a new user and pw that you can use
    for both mysql and phpmyadmin with same root privelages.
    create new database user to log into phpmyadmin with</p>
<div class="code-container"><pre id="codeBlock19">
                                sudo systemctl stop mariadb</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock19')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock20">
                                sudo mysqld_safe --skip-grant-tables --skip-networking &</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock20')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock20">
                                mysql -u root</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock21')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock22">
                                FLUSH PRIVILEGES;</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock22')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock23">
                                CREATE USER '<i style="color:orange">newuser</i>'@'localhost' IDENTIFIED BY '<i
            style="color:orange">complex_password</i>';</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock23')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock24">
                                GRANT ALL PRIVILEGES ON * . * TO '<i
            style="color:orange">newuser</i>'@'localhost';</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock24')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock25">
                                FLUSH PRIVILEGES;</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock25')">Copy</button>

</div>
<p>exit out of mysql and we can check for success by quickly logging back in with the
    newuser name and password</p>

<div class="code-container"><pre id="codeBlock26">
                                mysql -u<i style="color:orange">newuser</i> -p</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock26')">Copy</button>

</div>
<p>- install composer</p>
<div class="code-container"><pre id="codeBlock27">
                                sudo curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin
                                --filename=composer</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock27')">Copy</button>

</div>
<p>-install laravel</p>
<div class="code-container"><pre id="codeBlock28">
                                composer global require "laravel/installer"</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock28')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock29">
                                echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock29')">Copy</button>

</div>
<p>- this is to add a URL to the local system so you dont have to type the IP address
    and can type a regular URL when accessing your page on the local network.
    Go to the following file in your windows directory.</p>
<div class=" code-info alert alert-info border border-dark" style="font-weight:bold">
    C:\Windows\System32\drivers\etc\hosts
</div>
<p>- next is to Install a webpage at the home directory that will be served by the
    server /var/www/html/<i style="color:orange">project</i> -</p>
<div class="code-container"><pre id="codeBlock30">
                                cd /var/www/html/<i style="color:orange">project</i></pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock30')">Copy</button>

</div>
<p style="color:red;">I am unable to make composer install work on Raspbery Pi zero, I
    have had to zip the vendor folder from the source and transfer/unzip it on the
    Pi.</p>
<p>with the package.json file ready we can do composer install to add the vendor folder
    and install any package dependencies.</p>
<div class="code-container"><pre id="codeBlock31">
                                composer create-project --prefer-dist laravel/laravel blog "5.5.*"</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock31')">Copy</button>

</div>
<p>this will set the key in the .env file required to be unique to the particular
    install of the website</p>
<div class="code-container"><pre id="codeBlock32">
                                php artisan key:generate</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock32')">Copy</button>

</div>
<p>- from the project directory go into .env and check database login</p>
<div class="code-container"><pre id="codeBlock33">
                                sudo nano .env</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock33')">Copy</button>

</div>
<p>- add database to phpmyadmin logging into phpmyadmin in a browser at the
    ipaddress/phpmyadmin</p>
<p>change group ownership of the public folders that need to be accessable to view the
    website</p>
<div class="code-container"><pre id="codeBlock34">
                                sudo chgrp -R www-data /var/www/html/<i style="color:orange">project</i>/storage</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock34')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock35">
                                sudo chgrp -R www-data /var/www/html/<i style="color:orange">project</i>/bootstrap/cache
                            </pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock35')">Copy</button>

</div>
<p>-webpage will not load because logfile is inaccesable do next to fix -</p>
<p>-truncate (empty) /storage/framework/sessions and /storage/framework/views but make
    sure the file directories are present.</p>
<div class="code-container"><pre id="codeBlock36">
                                sudo chmod 755 -R /var/www/html/<i style="color:orange">project</i>/storage</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock36')">Copy</button>

</div>
<p>On raspberry pi 755 is not enough and storage needs 777 permissions</p>
<div class="code-container"><pre id="codeBlock37">
                                php artisan cache:clear</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock37')">Copy</button>

</div>
<div class="code-container"><pre id="codeBlock38">
                                composer dumpautoload</pre>
    <button aria-label="Copy command to clipboard" onclick="copyToClipboard('#codeBlock38')">Copy</button>

</div>
</li>
</ul>

</div>
<footer>
    <p>Created by: Chris Hawker for English 2100 SLCC / Graphical Document</a></p>
    <div id="customAlert" class="custom-alert" style="display: none;">
        <p id="alertMessage"></p>
        <button onclick="closeAlert()">OK</button>
    </div>

    <script>
        function copyToClipboard(element) {
            var text = document.querySelector(element).innerText;
            var elem = document.createElement("textarea");
            document.body.appendChild(elem);
            elem.value = text;
            elem.select();
            document.execCommand("copy");
            document.body.removeChild(elem);

            showAlert("Copied to clipboard");
        }

        function showAlert(message) {
            var alertBox = document.getElementById('customAlert');
            var messageParagraph = document.getElementById('alertMessage');
            messageParagraph.innerText = message;
            alertBox.style.display = 'block';
        }

        function closeAlert() {
            var alertBox = document.getElementById('customAlert');
            alertBox.style.display = 'none';
        }

        function searchFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("searchBox");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("pre")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
